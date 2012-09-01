<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index(){
		$this->data['content'] = $this->pages->get_page_by_slug('temp-home');

		$this->load->view('template/main_top', $this->data);
		$this->load->view('content_view', $this->data);
		$this->load->view('template/main_bottom', $this->data);
	}
}
?>