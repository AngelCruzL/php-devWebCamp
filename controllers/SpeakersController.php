<?php

namespace Controllers;

use MVC\Router;
use Model\Speaker;
use Intervention\Image\ImageManagerStatic as Image;

class SpeakersController
{
	public static function index(Router $router)
	{
		$speakers = Speaker::all();

		$router->render('admin/speakers/index', [
			'pageTitle' => 'Ponentes / Conferencistas',
			'speakers' => $speakers
		]);
	}

	public static function createSpeaker(Router $router)
	{
		$speaker = new Speaker;

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (!empty($_FILES['image']['tmp_name'])) {
				$IMAGE_DIR = '../public/img/speakers';

				if (!is_dir($IMAGE_DIR)) mkdir($IMAGE_DIR, 0755, true);

				$image_png = Image::make($_FILES['image']['tmp_name'])->fit(800, 800)->encode('png', 80);
				$image_webp = Image::make($_FILES['image']['tmp_name'])->fit(800, 800)->encode('webp', 80);
				$image_name = md5(uniqid(rand(), true));
				$_POST['image'] = $image_name;
			}

			$_POST['social_networks'] = json_encode($_POST['social_networks'], JSON_UNESCAPED_SLASHES);
			$speaker->sync($_POST);
			$alerts = $speaker->validateSpeaker();

			if (empty($alerts)) {
				$image_png->save($IMAGE_DIR . '/' . $image_name . '.png');
				$image_webp->save($IMAGE_DIR . '/' . $image_name . '.webp');
				$result = $speaker->save();

				if ($result) header('Location: /admin/ponentes');
			}
		}

		$router->render('admin/speakers/create', [
			'pageTitle' => 'Registrar Ponente',
			'speaker' => $speaker,
			'alerts' => $alerts ?? []
		]);
	}

	public static function editSpeaker(Router $router)
	{
		$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
		if (!$id) header('Location: /admin/ponentes');

		$speaker = Speaker::find($id);
		if (!$speaker) header('Location: /admin/ponentes');

		$speaker->currant_image = $speaker->image;

		$router->render('admin/speakers/edit', [
			'pageTitle' => 'Editar Ponente',
			'speaker' => $speaker,
			'alerts' => $alerts ?? []
		]);
	}
}
