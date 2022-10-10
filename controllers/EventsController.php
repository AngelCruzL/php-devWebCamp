<?php

namespace Controllers;

use Model\Category;
use MVC\Router;

class EventsController
{
	public static function index(Router $router)
	{
		$router->render('admin/events/index', [
			'pageTitle' => 'Conferencias y Workshops'
		]);
	}

	public static function createEvent(Router $router)
	{
		$categories = Category::all();

		$router->render('admin/events/create', [
			'pageTitle' => 'Registrar Evento',
			'categories' => $categories,
			'alerts' => $alerts ?? []
		]);
	}
}
