<?php

class Login extends CI_Controller {
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
		$this->data['page_title']	= 'Login';
	}

	public function index(){
		$slug 						= get_controller_as_page_slug();
		$this->data['slug']			= $slug;
		$this->data['login_error'] 	= '';		

		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[50]|md5');
		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');

		if ($this->form_validation->run()==true){
			$login_result = $this->sddauth->login($this->input->post('username'), $this->input->post('password'));
			switch ($login_result){
				case 'success':
					if ($this->session->userdata['is_admin']){
						header('location: /');
					} else {
						header('location: /');
					}
					die();
					break;
				case 'norec':
					$this->data['login_error'] = 'Invalid Username.';
					break;
				case 'invalidpass':
					$this->data['login_error'] = 'Invalid Password.';
					break;
				default:
					$this->data['login_error'] = 'ZOMG h@x0rZ!!1!111!!!!!1!';
					break;
			}			
		}

		$this->load->view('template/main_top', $this->data);
		if ($this->data['logged_in']){
			$this->load->view('logout_view', $this->data);
		} else {
			$this->load->view('login_view', $this->data);
		}
		$this->load->view('template/main_bottom', $this->data);
	}
}
?>