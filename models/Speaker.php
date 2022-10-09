<?php

namespace Model;

class Speaker extends ActiveRecord
{
	protected static $table = 'speakers';
	protected static $dbColumns = [
		'id',
		'first_name',
		'last_name',
		'city',
		'country',
		'image',
		'tags',
		'social_networks'
	];

	public function __construct($args = [])
	{
		$this->id = $args['id'] ?? null;
		$this->first_name = $args['first_name'] ?? '';
		$this->last_name = $args['last_name'] ?? '';
		$this->city = $args['city'] ?? '';
		$this->country = $args['country'] ?? '';
		$this->image = $args['image'] ?? '';
		$this->tags = $args['tags'] ?? '';
		$this->social_networks = $args['social_networks'] ?? '';
	}

	public function validateSpeaker()
	{
		if (empty($this->first_name)) self::$alerts['error'][] = 'El nombre es obligatorio.';
		if (empty($this->last_name)) self::$alerts['error'][] = 'El apellido es obligatorio.';
		if (empty($this->city)) self::$alerts['error'][] = 'La ciudad es obligatoria.';
		if (empty($this->country)) self::$alerts['error'][] = 'El país es obligatorio.';
		if (empty($this->image)) self::$alerts['error'][] = 'La imagen es obligatoria.';
		if (empty($this->tags)) self::$alerts['error'][] = 'El campo de áreas es obligatorio.';

		return self::$alerts;
	}
}
