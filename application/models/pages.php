<?php
class Pages extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function get_page_by_id($p_key){
		$this->db->from('pages');
		$this->db->where('p_key', $p_key);
		return $this->db->get()->row();
	}

	public function get_page_by_slug($slug){
		$this->db->from('pages');
		$this->db->where('slug', $slug);
		return $this->db->get()->row();
	}
	public function get_page_by_title($title){
		$this->db->from('pages');
		$this->db->where('title', $title);
		return $this->db->get()->row();
	}
}
?>