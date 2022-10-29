<?php

namespace Model;

class Gift extends ActiveRecord
{
	protected static $table = 'gifts';
	protected static $dbColumns = [
		'id',
		'name',
	];

	public function __construct($args = [])
	{
		$this->id = $args['id'] ?? null;
		$this->name = $args['name'] ?? '';
	}
}
