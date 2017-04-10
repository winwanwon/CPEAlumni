<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work_page extends CI_Controller {

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
		$this->load->model('work_model');
		$this->load->model('profile_model');
		$this->load->model('index_model');
		$this->load->helper('url_helper');
		$this->load->helper('html');
	}
	public function index()
	{

	}

	public function edit($slug = ''){
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data["name"] = $this->session->firstname." ".$this->session->lastname;
		$data["current_page"] = $this->uri->segment(1);

		// GET business_type
		$data["business_type"] = $this->work_model->getBusinessType();

		// GET career
		$data["career_list"] = $this->work_model->getCareer($this->session->username);

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			//	Format คือ
			// 	set_rules('name ของ input', 'ชื่อฟีลด์ไว้แจ้งตอนเออเร่อ', 'required');
			$this->form_validation->set_rules('position', 'Position', 'required');
			$this->form_validation->set_rules('company', 'Company', 'required');
			$this->form_validation->set_rules('industry', 'Industry', 'required');
			$this->form_validation->set_rules('business_type', 'Bussiness Type', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data["status"] = "กรุณากรอกข้อมูลให้ถูกต้องและครบถ้วน";
			} else {
				$this->work_model->setCareer($this->session->username);
				$data["status"] = "เพิ่มข้อมูลเรียบร้อยแล้ว";
			}
		} else {
			$data["status"] = "";
		}

		$this->load->view('header');
		$this->load->view('navbar', $data);
		$this->load->view('work_form', $data);
		$this->load->view('footer');
	}

}
