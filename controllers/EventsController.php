<?php

namespace Controllers;

use Model\Category;
use Model\Day;
use Model\Hour;
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
		$categories = Category::all('ASC');
		$days = Day::all('ASC');
		$hours = Hour::all('ASC');

		$router->render('admin/events/create', [
			'pageTitle' => 'Registrar Evento',
			'categories' => $categories,
			'days' => $days,
			'hours' => $hours,
			'alerts' => $alerts ?? []
		]);
	}

	public static function editEvent(Router $router)
	{
	}

	public static function deleteEvent(Router $router)
	{
	}
}
