<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work_page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('work_model');
		$this->load->model('profile_model');
		$this->load->model('index_model');
		$this->load->helper('url_helper');
		$this->load->helper('html');
	}
	public function index($slug = ''){
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data["name"] = $this->session->name;
		$data["current_page"] = $this->uri->segment(1);

		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			// delete career
			$id=$this->input->post('delbtn');
			$this->work_model->deleteCareer($this->session->username,$id);

			// toggle currently work
			$id=$this->input->post('togglebtnId');
			$present=$this->input->post('togglebtnPresent');
			$this->work_model->toggleCurrent($this->session->username,$id,$present);

			//	Format คือ
			// 	set_rules('name ของ input', 'ชื่อฟีลด์ไว้แจ้งตอนเออเร่อ', 'required');
			$this->form_validation->set_rules('position', 'Position', 'required');
			$this->form_validation->set_rules('company', 'Company', 'required');
			//->form_validation->set_rules('industry', 'Industry', 'required');
			//$this->form_validation->set_rules('business_type', 'Bussiness Type', 'required');
			$this->form_validation->set_rules('career', 'Career', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data["status"] = "กรุณากรอกข้อมูลให้ถูกต้องและครบถ้วน";
			} else {
				$this->work_model->setCareer($this->session->username);
				$data["status"] = "เพิ่มข้อมูลเรียบร้อยแล้ว";
			}
		} else {
			$data["status"] = "";
		}

		// GET career to show in dropdown
		$data["career"] = $this->work_model->getCareerType();

		// show career
		$data["career_show"] = $this->work_model->getCareer($this->session->username);

		

		$this->load->view('header');
		$this->load->view('navbar', $data);
		$this->load->view('work_form', $data);
		$this->load->view('footer');
	}

}
