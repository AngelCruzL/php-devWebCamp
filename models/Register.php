<?php

namespace Model;

class Register extends ActiveRecord
{
	protected static $table = 'registers';
	protected static $dbColumns = [
		'id',
		'token',
		'has_conferences',
		'pack_id',
		'user_id',
		'payment_id',
		'gift_id',
	];

	public function __construct($args = [])
	{
		$this->id = $args['id'] ?? null;
		$this->token = $args['token'] ?? '';
		$this->has_conferences = $args['has_conferences'] ?? 0;
		$this->pack_id = $args['pack_id'] ?? '';
		$this->user_id = $args['user_id'] ?? '';
		$this->payment_id = $args['payment_id'] ?? '';
		$this->gift_id = $args['gift_id'] ?? 1;
	}
}
