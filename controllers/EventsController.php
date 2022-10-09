<?php

namespace Controllers;

use MVC\Router;

class EventsController
{
	public static function index(Router $router)
	{
		$router->render('admin/events/index', [
			'pageTitle' => 'Conferencias y Workshops'
		]);
	}
}
