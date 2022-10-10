<?php

namespace Model;

class Day extends ActiveRecord
{
	protected static $table = 'days';
	protected static $dbColumns = [
		'id',
		'name',
	];

	public $id;
	public $name;
}
