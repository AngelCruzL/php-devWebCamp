<?php

namespace Controllers;

use MVC\Router;

class SpeakersController
{
	public static function index(Router $router)
	{
		$router->render('admin/speakers/index', [
			'pageTitle' => 'Ponentes / Conferencistas'
		]);
	}

	public static function createSpeaker(Router $router)
	{
		$router->render('admin/speakers/create', [
			'pageTitle' => 'Registrar Ponente'
		]);
	}
}
