<?php

class Roster extends CI_Controller {
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
		$this->data['page_title']	= 'Player Roster';
	}

	public function index(){
		$this->load->model('Users');
		$this->load->model('Pages');

		$this->load->view('template/main_top', $this->data);
		if ($this->data['logged_in']){
			$this->load->view('logout_view', $this->data);
		} else {
			$this->data['featured'] = $this->Users->get_featured();
			$this->load->view('login_view', $this->data);
		}
		//$this->load->view('content_view', $this->data);
		$this->load->view('roster_view', $this->data);
		$this->load->view('template/main_bottom', $this->data);
	}
}
?>