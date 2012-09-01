<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Content extends CI_Controller {
	private $data = array();

	public function __construct(){
        parent::__construct();

		if ($ck = get_cookie('sdd_session')){
			$this->crsrauth->check_cookie($ck);
		}
		
		$this->data['admin']		= false;
		$this->data['user']			= $this->session->userdata;
		$this->data['logged_in']	= $this->session->userdata('logged_in');
		if (isset($this->data['user']['is_admin'])){
			$this->data['admin'] = (bool)$this->data['user']['is_admin'];
		}
	}

	public function index($slug){
		// Attempt to find matching slug in the pages database table. If it doesn't exist, show 404.
		$this->data['content']	= $this->pages->get_page_by_slug($slug);
		$this->data['slug']		= $slug;
		
		if (count($this->data['content']) > 0){
			$this->load->view('template/main_top', $this->data);
			$this->load->view('content_view', $this->data);
			$this->load->view('template/main_bottom', $this->data);
		} else {
			show_404();
		}
	}
}
?>