<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit_Profile extends CI_Controller {
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
		
		if (!$this->data['logged_in']){
			header('location: /login/');
			die();
		}

		$this->data['page_title']	= 'Edit Your Profile';
	}

	public function index(){
		$this->load->model('Users');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email', 'E-mail Address', 'trim|required|valid_email|max_length[100]');//|is_unique[users.email]');
		$this->form_validation->set_rules('number', 'Number', 'trim|alpha_numeric|max_length[5]');//|is_unique[users.number]');
		$this->form_validation->set_rules('skate_name', 'Skate Name', 'trim|xss_clean|max_length[100]');//|is_unique[users.skate_name]');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean|max_length[100]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean|max_length[100]');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean|max_length[200]');
		$this->form_validation->set_rules('address2', 'Address 2', 'trim|xss_clean|max_length[200]');
		$this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean|max_length[100]');
		$this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean|max_length[2]');
		$this->form_validation->set_rules('zip', 'ZIP Code', 'trim|required|numeric|xss_clean|max_length[5]');
		$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|xss_clean|max_length[15]');
		$this->form_validation->set_rules('insurance', 'Insurance #', 'trim|numeric|max_length[45]');
		$this->form_validation->set_rules('twitter', 'Twitter', 'trim|xss_clean|max_length[45]');
		$this->form_validation->set_rules('facebook', 'Facebook', 'trim|xss_clean|max_length[45]');
		$this->form_validation->set_rules('google_plus', 'Google+', 'trim|xss_clean|max_length[45]');

		$this->data['save_successful'] = false;

		if ($this->form_validation->run()==true && $_POST){
			// Post and redirect to confirmation page
			$post_data = array(
				'email'			=> $_POST['email'],
				'number'		=> $_POST['number'],
				'skate_name'	=> $_POST['skate_name'],
				'first_name'	=> $_POST['first_name'],
				'last_name'		=> $_POST['last_name'],
				'address'		=> $_POST['address'],
				'address2'		=> $_POST['address2'],
				'city'			=> $_POST['city'],
				'state'			=> $_POST['state'],
				'zip'			=> $_POST['zip'],
				'phone'			=> $_POST['phone'],
				'insurance'	    => $_POST['insurance'],
				'twitter'		=> $_POST['twitter'],
				'facebook'		=> $_POST['facebook'],
				'google_plus'	=> $_POST['google_plus']
			);
			$this->Users->update_user($this->data['user']['u_key'], $post_data);
			$this->data['save_successful'] = true;
		}
		
		//Load form and display errors (if any)
		$this->load->view('template/main_top', $this->data);
		$this->load->view('logout_view', $this->data);
		$this->load->view('edit_profile_view', $this->data);
		$this->load->view('template/main_bottom', $this->data);
	}

}
?>