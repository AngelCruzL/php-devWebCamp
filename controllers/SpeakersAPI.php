<?php

namespace Controllers;

use Model\Speaker;

class SpeakersAPI
{
	public static function index()
	{
		$speakers = Speaker::all();
		echo json_encode($speakers);
	}
}
