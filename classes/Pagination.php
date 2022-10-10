<?php

namespace Classes;

class Pagination
{
	public $current_page;
	public $registers_per_page;
	public $total_registers;

	public function __construct($current_page = 1, $registers_per_page = 10,  $total_registers = 0)
	{
		$this->current_page = (int) $current_page;
		$this->registers_per_page = (int) $registers_per_page;
		$this->total_registers = (int) $total_registers;
	}
}
