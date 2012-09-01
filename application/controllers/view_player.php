<?php

class View_Player extends CI_Controller {
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
		$this->data['page_title']	= 'Player Detail';
	}

	public function index($user){
		if (!isset($user)){
			header('location: /roster/');
			die();
		}
		$this->load->model('Users');
		$name_parts = explode('-', $user);
		$number = $name_parts[count($name_parts) - 1];
		$this->data['user_detail'] = $this->Users->get_user($number);
		unset($this->data['user_detail']->pw);
		$this->data['user_attributes'] = $this->Users->get_user_attributes($this->data['user_detail']->u_key);

		$this->data['page_title'] = draw_number($this->data['user_detail'], true) . ' ' . draw_name($this->data['user_detail']);


		$this->load->view('template/main_top', $this->data);
		if ($this->data['logged_in']){
			$this->load->view('logout_view', $this->data);
		} else {
			$this->data['featured'] = $this->Users->get_featured();
			$this->load->view('login_view', $this->data);
		}
		$this->load->view('view_player_view', $this->data);
		$this->load->view('template/main_bottom', $this->data);
	}
}
?>