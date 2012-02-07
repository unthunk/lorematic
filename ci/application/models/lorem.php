<?php

class Lorema extends CI_Model {
	var $CI;
	public $high;
	public $low;
	
	function __construct() {
		parent::__construct();
		$this->get_range();
	}
	
	private function get_range() {
		// get min and max record ids
		$sql = "SELECT MIN(  `id` ) AS low, 
					MAX(  `id` ) AS high
					FROM  `phrases`";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0)
		{
		   $row = $query->row();
		$this->high = $row->high	;
			$this->low = $row->low;
		}
		else {
			return false;
		}
	}
	
	private function get_sentence() {
		$i=0;
		$x = rand(3,15);
		$ids = array();
		$phrases = array();
		$sentence = "";
		
		// get random record ids
		while($i < $x){
			$ids[] = rand($this->low, $this->high);
			$i++;
		}
		
		// get phrases
		$sql = "SELECT `phrase` FROM `phrases`
				WHERE `id` IN (".implode(',',$ids).")";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0)	{
			foreach ($query->result() as $row) {
				$phrases[] = $row->phrase;
			}
		}
		
		$sentence = ucfirst(implode(' ', $phrases) . ".");
		return $sentence;
	}
	
	private function get_paragraph($html=false) {
		$i=0;
		$x = rand(3,15);
		$sentences = array();
		$paragraph = "";
		
		// get sentences
		while($i < $x){
			$sentences[] = $this->get_sentence();
			$i++;
		}
		
		$html ? $paragraph = "<p>".implode(" ", $sentences)."</p>" : $paragraph = implode(" ", $sentences);
		return $paragraph;
	}
	
	public function get_lorem($count=1,$html=false) {
		$i=0;
		$paragraphs = array();
		$lipsum = "";
		
		// get paragraphs
		while($i < $count) {
			$paragraphs[] = $this->get_paragraph($html);
			$i++;
		}
		
		$lipsum = implode("\n\n", $paragraphs);
		return $lipsum;
	}
}