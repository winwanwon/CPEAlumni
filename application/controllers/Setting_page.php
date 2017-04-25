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
		$changepass =0 ;

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$old_password = $this->input->post('old_password');
	    $new_password = $this->input->post('new_password');
	    $new_password_conf = $this->input->post('new_password_conf');

			//Password Update
	    if($old_password && $new_password && $new_password_conf){

			if (strlen($this->input->post('new_password'))<8 || strlen($this->input->post('new_password'))>32){
			$data["status"] = "รหัสผ่านต้องมีความยาวระหว่าง 8-32 ตัวอักษร";
			}
			$validated = $this->setting_model->passwordCheck();
					if($validated){
						$success = $this->setting_model->passwordUpdate();
						//ถ้าเปลี่ยนพาสบังคับเปลี่ยน privacy ด้วย
						if($success){
							$success = $this->setting_model->privacyUpdate();
							$data["status"] = "บันทึกรหัสผ่านใหม่เรียบร้อยแล้ว";
							$changepass = 1;
						} else {
							$data["status"] = "รหัสผ่านใหม่ไม่ตรงกัน";
						}
					} else {
						$data["status"] = "รหัสผ่านเก่าไม่ถูกต้อง";
					}
			}

			//Privacy update 
			if($old_password){
				$success = $this->setting_model->privacyUpdate();
				if($success){
					$data["status"] = "บันทึกข้อมูลความเป็นส่วนตัวเรียบร้อยแล้ว";
					if($changepass == 1){
						$data["status"] = "บันทึกรหัสผ่านและข้อมูลความเป็นส่วนตัวเรียบร้อยแล้ว";
					}
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
