<?php

namespace Model;

class Category extends ActiveRecord
{
	protected static $table = 'categories';
	protected static $dbColumns = [
		'id',
		'name',
	];

	public $id;
	public $name;
}
