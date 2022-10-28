<?php

namespace Controllers;

use Model\Pack;
use Model\Register;
use Model\User;
use MVC\Router;

class RegisterController
{
	public static function register(Router $router)
	{
		$router->render('register/create', [
			'pageTitle' => 'Finalizar Registro'
		]);
	}

	public static function freeRegister(Router $router)
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (!is_authenticated()) header('Location: /login');

			$token = substr(md5(uniqid(rand(), true)), 0, 8);

			$data = [
				'pack_id' => 3,
				'user_id' => $_SESSION['userId'],
				'token' => $token,
				'payment_id' => ''
			];

			$register = new Register($data);
			$result = $register->save();

			if ($result) {
				header('Location: /boleto?id=' . urlencode($register->token));
			}
		}
	}

	public static function ticket(Router $router)
	{
		$id = $_GET['id'];
		if (!$id || !strlen($id) === 8) header('Location: /');

		$register = Register::where('token', $id);
		if (!$register) header('Location: /');

		$register->user = User::find($register->user_id);
		$register->pack = Pack::find($register->pack_id);

		$router->render('register/ticket', [
			'pageTitle' => 'Asistencia a DevWebCamp',
			'register' => $register
		]);
	}
}
