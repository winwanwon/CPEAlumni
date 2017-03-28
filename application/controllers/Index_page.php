<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_page extends CI_Controller {

	/**
	* Index Page for this controller.
	*
	* Maps to the following URL
	* 		http://example.com/index.php/welcome
	*	- or -
	* 		http://example.com/index.php/welcome/index
	*	- or -
	* Since this controller is set as the default controller in
	* config/routes.php, it's displayed at http://example.com/
	*
	* So any other public methods not prefixed with an underscore will
	* map to /index.php/welcome/<method_name>
	* @see https://codeigniter.com/user_guide/general/urls.html
	*/

	public function __construct()
	{
		parent::__construct();
		$this->load->model('profile_model');
		$this->load->helper('url_helper');
		$this->load->helper('html');
	}

	public function index()
	{
		$data["current_page"] = $this->uri->segment(1); 
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->view('header');
		$this->load->view('navbar', $data);
		$this->load->view('index_page');
	}

	public function register(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		//	Format คือ
		// 	set_rules('name ของ input', 'ชื่อฟีลด์ไว้แจ้งตอนเออเร่อ', 'required');
		$this->form_validation->set_rules('prefix', 'Name prefix', 'required');
		$this->form_validation->set_rules('firstname', 'First name', 'required');
		$this->form_validation->set_rules('lastname', 'Last name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('profile');
		}
		else
		{
			$this->profile_model->createUser();
			$this->load->view('profile');
		}

	}
}
