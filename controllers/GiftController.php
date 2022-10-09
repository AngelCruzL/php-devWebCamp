<?php

namespace Controllers;

use MVC\Router;

class GiftController
{
	public static function index(Router $router)
	{
		$router->render('admin/gift/index', [
			'pageTitle' => 'Regalos'
		]);
	}
}
