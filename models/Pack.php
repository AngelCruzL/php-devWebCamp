<?php

namespace Model;

class Pack extends ActiveRecord
{
	protected static $table = 'packs';
	protected static $dbColumns = [
		'id',
		'name',
	];

	public $id;
	public $name;
}
