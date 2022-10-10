<?php

namespace Model;

class Event extends ActiveRecord
{
	protected static $table = 'events';
	protected static $dbColumns = [
		'id',
		'name',
		'description',
		'available_places',
		'category_id',
		'day_id',
		'hour_id',
		'speaker_id'
	];

	public $id;
	public $name;
	public $description;
	public $available_places;
	public $category_id;
	public $day_id;
	public $hour_id;
	public $speaker_id;

	public function __construct($args = [])
	{
		$this->id = $args['id'] ?? null;
		$this->name = $args['name'] ?? '';
		$this->description = $args['description'] ?? '';
		$this->available_places = $args['available_places'] ?? '';
		$this->category_id = $args['category_id'] ?? '';
		$this->day_id = $args['day_id'] ?? '';
		$this->hour_id = $args['hour_id'] ?? '';
		$this->speaker_id = $args['speaker_id'] ?? '';
	}

	public function validateEvent()
	{
		if (empty($this->name)) self::$alerts['error'][] = 'El nombre es obligatorio';
		if (empty($this->description)) self::$alerts['error'][] = 'La descripción es obligatoria';
		if (empty($this->category_id) || !filter_var($this->category_id, FILTER_VALIDATE_INT))
			self::$alerts['error'][] = 'Elige una categoría';
		if (empty($this->day_id) || !filter_var($this->day_id, FILTER_VALIDATE_INT))
			self::$alerts['error'][] = 'Elige el día del evento';
		if (empty($this->hour_id) || !filter_var($this->hour_id, FILTER_VALIDATE_INT))
			self::$alerts['error'][] = 'Elige la hora del evento';
		if (empty($this->speaker_id) || !filter_var($this->speaker_id, FILTER_VALIDATE_INT))
			self::$alerts['error'][] = 'Elige un ponente';
		if (empty($this->available_places) || !filter_var($this->available_places, FILTER_VALIDATE_INT))
			self::$alerts['error'][] = 'El campo de cupos es obligatorio';

		return self::$alerts;
	}
}
