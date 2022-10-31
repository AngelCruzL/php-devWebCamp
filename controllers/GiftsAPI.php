<?php

namespace Controllers;

use Model\Gift;
use Model\Register;

class GiftsAPI
{
	public static function index()
	{
		if (!is_authenticated()) {
			echo json_encode([]);
			return;
		}

		$gifts = Gift::all();

		foreach ($gifts as $gift) {
			$gift->total = Register::totalArray([
				'gift_id' => $gift->id,
				'pack_id' => 1,
			]);
		}

		echo json_encode($gifts);
		return;
	}
}
