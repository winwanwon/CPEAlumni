<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('profile_model');
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
		$data["status"] = "";

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$old_password = $this->input->post('old_password');
	    $new_password = $this->input->post('new_password');
	    $new_password_conf = $this->input->post('new_password_conf');

			//Password Update
	    if($old_password && $new_password && $new_password_conf){
	      $validated = $this->setting_model->passwordCheck();
				if($validated){
					$success = $this->setting_model->passwordUpdate();
					//ถ้าเปลี่ยนพาสบังคับเปลี่ยน privacy ด้วย
					if($success){
						$success = $this->setting_model->privacyUpdate();
						$data["status"] = "บันทึกข้อมูลเรียบร้อยแล้ว";
					} else {
						$data["status"] = "รหัสผ่านใหม่ไม่ตรงกัน";
					}
				} else {
					$data["status"] = "รหัสผ่านเก่าไม่ถูกต้อง";
				}
	    } else if ($old_password || $new_password || $new_password_conf){
				$data["status"] = "กรุณากรอกข้อมูลให้ครบถ้วน";
			}

			//Privacy update อันนี้ถ้าไม่ได้กรอกเปลี่ยนพาส
			else if($old_password==""&&$new_password==""&&$new_password_conf==""){
			$success = $this->setting_model->privacyUpdate();
			if($success){
				$data["status"] = "บันทึกข้อมูลเรียบร้อยแล้ว";
			}
		}
		}

		$data["content"] = $this->profile_model->showContent($this->session->username);

		$this->load->view('header');
		$this->load->view('navbar', $data);
		$this->load->view('setting_form', $data);
		$this->load->view('footer');
	}

}
