<?php

namespace Model;

class Hour extends ActiveRecord
{
	protected static $table = 'hours';
	protected static $dbColumns = [
		'id',
		'hour',
	];

	public $id;
	public $hour;
}
