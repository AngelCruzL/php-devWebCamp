<?php

namespace Controllers;

use Model\Register;
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
}
