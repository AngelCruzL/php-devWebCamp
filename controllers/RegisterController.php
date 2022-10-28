<?php

namespace Controllers;

use MVC\Router;

class RegisterController
{
	public static function register(Router $router)
	{
		$router->render('register/create', [
			'pageTitle' => 'Finalizar Registro'
		]);
	}
}
