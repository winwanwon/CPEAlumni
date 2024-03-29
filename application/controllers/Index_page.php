<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('profile_model');
		$this->load->model('index_model');
		$this->load->helper('url_helper');
		$this->load->helper('html');
		$this->load->library('user_agent');
	}

	public function index()
	{
		$this->load->library('session');
		$username = $this->session->username;
		if($username){
			redirect('directory');
		}
		
		$data["error"] = "";
		$data["current_page"] = $this->uri->segment(1);
		$this->load->helper('form');
		$this->load->library('form_validation');

		if($this->agent->is_mobile()){
			redirect('login');
		}

		$this->load->view('header');
		$this->load->view('navbar', $data);
		$this->load->view('index_page', $data);
		$this->load->view('footer');
	}

	public function login(){
		$data["error"] = "";
		$data["current_page"] = $this->uri->segment(1);
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('header');
			$this->load->view('navbar', $data);
			$this->load->view('login', $data);
			$this->load->view('footer');
		}
		else
		{
			$login_success = $this->index_model->login();

			if($login_success == TRUE){
				$userdata = array(
					"username" => $this->input->post("username"),
					"name" => $login_success
				);
				$this->session->set_userdata($userdata);
				if($login_success == "admin"){
					redirect('admin');
				}
				redirect('directory');
			} else {
				$data["error"] = "ชื่อผู้ใช้งาน และ/หรือ รหัสผ่าน ไม่ถูกต้อง";

			}
			$this->load->view('header');
			$this->load->view('navbar', $data);
			$this->load->view('login', $data);
			$this->load->view('footer');
		}
	}

	public function register(){
		$data["error"] = "";
		$data["current_page"] = $this->uri->segment(1);
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		//	Format คือ
		// 	set_rules('name ของ input', 'ชื่อฟีลด์ไว้แจ้งตอนเออเร่อ', 'required');
		$this->form_validation->set_rules('prefix', 'Name prefix', 'required');
		$this->form_validation->set_rules('firstname', 'First name', 'required');
		$this->form_validation->set_rules('lastname', 'Last name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password_confirm', 'Comfirm Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		//$data['username'] = $this->input->post('username');
		//$data['firstname'] = $this->input->post('firstname');
		//$data['lastname'] = $this->input->post('lastname');
		//$data['username'] = $this->input->post('username');
		//$data['email'] = $this->input->post('email');

		if($this->input->post('undergraduate')){
			$this->form_validation->set_rules('generation', 'Generation', 'required');
			$this->form_validation->set_rules('yoe_under', 'Generation', 'required');
		}
		if($this->input->post('master')){
			$this->form_validation->set_rules('yoe_master', 'Year of Enrollment (Master\'s)', 'required');
		}
		if($this->input->post('doctoral')){
			$this->form_validation->set_rules('yoe_doctoral', 'Year of Enrollment (Doctoral\'s)', 'required');
		}

		if ($this->form_validation->run() === FALSE)
		{
			$data["error"] = "กรุณากรอกข้อมูลให้ถูกต้องและครบถ้วน";
		}
		else if ($this->input->post('password') != $this->input->post('password_confirm')){
			$data["error"] = "รหัสผ่านไม่ตรงกัน";
		}
		else if (strlen($this->input->post('password'))<8 || strlen($this->input->post('password'))>32){
			$data["error"] = "รหัสผ่านต้องมีความยาวระหว่าง 8-32 ตัวอักษร";
		}
		else if(!$this->input->post('undergraduate') && !$this->input->post('master') && !$this->input->post('doctoral'))
		{
			$data["error"] = "กรุณากรอกข้อมูลระดับการศึกษา";
		}
		else if ($this->profile_model->showContent($this->input->post('username'))!=NULL) {
			$data["error"] = "username นี้ถูกใช้แล้ว";
		}else {
			$userdata = array(
				"username" => $this->input->post("username"),
				"name" => $this->input->post("firstname")." ".$this->input->post("lastname")
			);
			$this->session->set_userdata($userdata);
			$this->profile_model->createUser();
			redirect('directory');
		}

		$this->load->view('header');
		$this->load->view('navbar', $data);
		$this->load->view('index_page', $data);
		$this->load->view('footer');

	}

	public function logout(){
		$this->load->library('session');
		$this->session->sess_destroy();
		redirect('/');
	}
}
