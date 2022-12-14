<?php

namespace Controllers;

use Model\Category;
use Model\Day;
use Model\Event;
use Model\EventRegister;
use Model\Gift;
use Model\Hour;
use Model\Pack;
use Model\Register;
use Model\Speaker;
use Model\User;
use MVC\Router;

class RegisterController
{
	public static function register(Router $router)
	{
		if (!is_authenticated()) {
			header('Location: /');
			return;
		}

		$register = Register::where('user_id', $_SESSION['userId']);
		if (isset($register) && ($register->pack_id === '3' || $register->pack_id === '2')) {
			header('Location: /boleto?id=' . urlencode($register->token));
			return;
		}

		if (isset($register) && $register->pack_id === '1') {
			header('Location: /finalizar-registro/conferencias');
			return;
		}

		$router->render('register/create', [
			'pageTitle' => 'Finalizar Registro'
		]);
	}

	public static function freeRegister()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (!is_authenticated()) {
				header('Location: /login');
				return;
			}

			$register = Register::where('user_id', $_SESSION['userId']);
			if (isset($register) && $register->pack_id === '3') {
				header('Location: /boleto?id=' . urlencode($register->token));
				return;
			}

			$token = substr(md5(uniqid(rand(), true)), 0, 8);

			$data = [
				'pack_id' => 3,
				'user_id' => $_SESSION['userId'],
				'token' => $token,
				'payment_id' => ''
			];

			$register = new Register($data);
			$result = $register->save();

			if ($result) { {
					header('Location: /boleto?id=' . urlencode($register->token));
					return;
				}
			}
		}
	}

	public static function paidRegister()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (!is_authenticated()) {
				header('Location: /login');
				return;
			}

			if (empty($_POST)) {
				echo json_encode([]);
				return;
			}

			$data = $_POST;
			$data['user_id'] = $_SESSION['userId'];
			$data['token'] = substr(md5(uniqid(rand(), true)), 0, 8);

			try {
				$register = new Register($data);
				$result = $register->save();
				echo json_encode($result);
			} catch (\Throwable $th) {
				echo json_encode([
					'result' => 'error',
				]);
			}
		}
	}

	public static function agendaRegister(Router $router)
	{
		if (!is_authenticated()) {
			header('Location: /login');
			return;
		}

		$user_id = $_SESSION['userId'];
		$register = Register::where('user_id', $user_id);

		if (isset($register) && $register->pack_id === '2') {
			header('Location: /boleto?id=' . urlencode($register->token));
			return;
		}

		if ($register->pack_id !== '1') {
			header('Location: /');
			return;
		}

		if ($register->has_conferences === '1' && $register->pack_id === '1') {
			header('Location: /boleto?id=' . urlencode($register->token));
			return;
		}

		$eventsFormatted = self::formatEvents();
		$gifts = Gift::all('ASC');

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (!is_authenticated()) {
				header('Location: /login');
				return;
			}

			$events = explode(',', $_POST['events']);
			if (empty($events)) {
				echo json_encode(['result' => 'error']);
				return;
			}

			$register = Register::where('user_id', $_SESSION['userId']);
			if (!isset($register) || $register->pack_id !== '1') {
				echo json_encode(['result' => 'error']);
				return;
			}

			$events_array = [];
			foreach ($events as $event_id) {
				$event = Event::find($event_id);

				if (!isset($event) || $event->available_places === '0') {
					echo json_encode(['result' => false]);
					return;
				}

				$events_array[] = $event;
			}

			foreach ($events_array as $event) {
				$event->available_places -= 1;
				$event->save();

				$data = [
					'event_id' => (int) $event->id,
					'register_id' => (int) $register->id,
				];

				$event_register = new EventRegister($data);
				$event_register->save();
			}

			$register->sync([
				'gift_id' => $_POST['gift_id'],
				'has_conferences' => 1
			]);
			$result = $register->save();

			if ($result) {
				echo json_encode([
					'result' => $result,
					'token' => $register->token
				]);
			} else {
				echo json_encode(['result' => false]);
			}

			return;
		}

		$router->render('register/agenda', [
			'pageTitle' => 'Elige tus Workshops y Conferencias',
			'events' => $eventsFormatted,
			'gifts' => $gifts
		]);
	}

	public static function ticket(Router $router)
	{
		$id = $_GET['id'];
		if (!$id || !strlen($id) === 8) {
			header('Location: /');
			return;
		}

		$register = Register::where('token', $id);
		if (!$register) {
			header('Location: /');
			return;
		}

		$register->user = User::find($register->user_id);
		$register->pack = Pack::find($register->pack_id);

		$router->render('register/ticket', [
			'pageTitle' => 'Asistencia a DevWebCamp',
			'register' => $register
		]);
	}

	private static function formatEvents(): array
	{
		$events = Event::order('hour_id', 'ASC');
		$eventsFormatted = [];

		foreach ($events as $event) {
			$event->category = Category::find($event->category_id);
			$event->day = Day::find($event->day_id);
			$event->hour = Hour::find($event->hour_id);
			$event->speaker = Speaker::find($event->speaker_id);

			if ($event->day_id === '1' && $event->category_id === '1')
				$eventsFormatted['workshops_day1'][] = $event;

			if ($event->day_id === '2' && $event->category_id === '1')
				$eventsFormatted['workshops_day2'][] = $event;

			if ($event->day_id === '1' && $event->category_id === '2')
				$eventsFormatted['conferences_day1'][] = $event;

			if ($event->day_id === '2' && $event->category_id === '2')
				$eventsFormatted['conferences_day2'][] = $event;
		}

		return $eventsFormatted;
	}
}
