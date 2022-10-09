<?php

namespace Controllers;

use Model\Speaker;
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
		$speaker = new Speaker;

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$speaker->sync($_POST);
			$alerts = $speaker->validateSpeaker();
		}

		$router->render('admin/speakers/create', [
			'pageTitle' => 'Registrar Ponente',
			'speaker' => $speaker,
			'alerts' => $alerts ?? []
		]);
	}
}
