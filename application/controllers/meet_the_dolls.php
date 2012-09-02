<?php

class Meet_the_dolls extends CI_Controller {
	private $data = array();

	public function __construct(){
        parent::__construct();

		if ($ck = get_cookie('sdd_session')){
			$this->sddauth->check_cookie($ck);
		}
		
		$this->data['admin']		= false;
		$this->data['user']			= $this->session->userdata;
		$this->data['logged_in']	= $this->session->userdata('logged_in');
		if (isset($this->data['user']['is_admin'])){
			$this->data['admin'] = (bool)$this->data['user']['is_admin'];
		}
	}

	public function index(){
		$slug 					= get_controller_as_page_slug();
		$this->data['content']	= $this->pages->get_page_by_slug($slug);
		$this->data['slug']		= $slug;

		$this->data['skaters']	= $this->users->get_roster();
		$this->data['staff']	= $this->users->get_staff();

		$this->load->view('template/main_top', $this->data);
		//$this->load->view('content_view', $this->data);
		$this->load->view('meet_the_dolls_view', $this->data);
		$this->load->view('template/main_bottom', $this->data);
	}
}
?>