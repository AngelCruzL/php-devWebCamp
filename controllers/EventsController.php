<?php

namespace Controllers;

use Classes\Pagination;
use Model\Category;
use Model\Day;
use Model\Event;
use Model\Hour;
use Model\Speaker;
use MVC\Router;

class EventsController
{
	public static function index(Router $router)
	{
		if (!is_admin()) header('Location: /login');

		$current_page = filter_var($_GET['page'], FILTER_VALIDATE_INT);
		if (!$current_page || $current_page < 1) header('Location: /admin/eventos?page=1');

		$registers_per_page = 10;
		$total_registers = Event::total();

		$pagination = new Pagination($current_page, $registers_per_page, $total_registers);
		if ($pagination->total_pages() < $current_page) header('Location: /admin/eventos?page=1');

		$events = Event::paginate($registers_per_page, $pagination->offset());

		foreach ($events as $event) {
			$event->category = Category::find($event->category_id);
			$event->day = Day::find($event->day_id);
			$event->hour = Hour::find($event->hour_id);
			$event->speaker = Speaker::find($event->speaker_id);
		}

		$router->render('admin/events/index', [
			'pageTitle' => 'Conferencias y Workshops',
			'events' => $events,
			'pagination' => $pagination->pagination()
		]);
	}

	public static function createEvent(Router $router)
	{
		if (!is_admin()) header('Location: /login');

		$categories = Category::all('ASC');
		$days = Day::all('ASC');
		$hours = Hour::all('ASC');
		$event = new Event;

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$event->sync($_POST);
			$alerts = $event->validateEvent();

			if (empty($alerts)) {
				$result =	$event->save();
				if ($result)	header('Location: /admin/eventos');
			}
		}

		$router->render('admin/events/create', [
			'pageTitle' => 'Registrar Evento',
			'event' => $event,
			'categories' => $categories,
			'days' => $days,
			'hours' => $hours,
			'alerts' => $alerts ?? []
		]);
	}

	public static function editEvent(Router $router)
	{
		if (!is_admin()) header('Location: /login');

		$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
		if (!$id) header('Location: /admin/eventos');

		$categories = Category::all('ASC');
		$days = Day::all('ASC');
		$hours = Hour::all('ASC');

		$event = Event::find($id);
		if (!$event) header('Location: /admin/eventos');

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$event->sync($_POST);
			$alerts = $event->validateEvent();

			if (empty($alerts)) {
				$result =	$event->save();
				if ($result)	header('Location: /admin/eventos');
			}
		}

		$router->render('admin/events/edit', [
			'pageTitle' => 'Editar Evento',
			'event' => $event,
			'categories' => $categories,
			'days' => $days,
			'hours' => $hours,
			'alerts' => $alerts ?? []
		]);
	}

	public static function deleteEvent()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (!is_admin()) header('Location: /login');

			$event = Event::find($_POST['id']);
			if (!isset($event)) header('Location: /admin/eventos');

			$result = $event->delete();
			if ($result) header('Location: /admin/eventos');
		}
	}
}
