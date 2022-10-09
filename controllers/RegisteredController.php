<?php

namespace Controllers;

use MVC\Router;

class RegisteredController
{
	public static function index(Router $router)
	{
		$router->render('admin/registered/index', [
			'pageTitle' => 'Usuarios Registrados'
		]);
	}
}
