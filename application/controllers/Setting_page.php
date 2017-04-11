<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('setting_model');
		$this->load->helper('url_helper');
		$this->load->helper('html');
	}
	public function index()
	{
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data["current_page"] = $this->uri->segment(1);
		$data["name"] = $this->session->name;

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			//	Format คือ
			// 	set_rules('name ของ input', 'ชื่อฟีลด์ไว้แจ้งตอนเออเร่อ', 'required');
			/*
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
			*/
		} else {
			$data["status"] = "";
		}

		$this->load->view('header');
		$this->load->view('navbar', $data);
		$this->load->view('setting_form', $data);
		$this->load->view('footer');
	}

}
