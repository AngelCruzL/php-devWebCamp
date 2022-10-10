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

	public function offset()
	{
		return $this->registers_per_page * ($this->current_page - 1);
	}

	public function total_pages()
	{
		return ceil($this->total_registers / $this->registers_per_page);
	}

	public function previous_page()
	{
		$prev_page = $this->current_page - 1;
		return $prev_page > 0 ? $prev_page : false;
	}

	public function next_page()
	{
		$next_page = $this->current_page + 1;
		return $next_page <= $this->total_pages() ? $next_page : false;
	}

	public function go_to_previous_page()
	{
		$html = '';
		if ($this->previous_page()) {
			$html .= '<a href="?page=' . $this->previous_page() . '" class="pagination__link pagination__link--text">&laquo; Anterior</a>';
		}

		return $html;
	}

	public function go_to_next_page()
	{
		$html = '';
		if ($this->next_page()) {
			$html .= '<a href="?page=' . $this->next_page() . '" class="pagination__link pagination__link--text">Siguiente &raquo;</a>';
		}

		return $html;
	}

	public function show_number_of_pages()
	{
		$html = '';
		for ($i = 1; $i <= $this->total_pages(); $i++) {
			if ($i === $this->current_page) {
				$html .= "<span class=\"pagination__link pagination__link--current\">${i}</span>";
			} else {
				$html .= "<a class=\"pagination__link pagination__link--number\" href=\"?page={$i}\">${i}</a>";
			}
		}

		return $html;
	}

	public function pagination()
	{
		$html = '';
		if ($this->total_registers > 1) {
			$html .= '<div class="pagination">';
			$html .= $this->go_to_previous_page();
			$html .= $this->show_number_of_pages();
			$html .= $this->go_to_next_page();
			$html .= '</div>';
		}

		return $html;
	}
}
