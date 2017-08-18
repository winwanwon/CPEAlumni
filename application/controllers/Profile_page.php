<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('profile_model');
		$this->load->model('index_model');
		$this->load->helper('url_helper');
		$this->load->helper('html');
	}
	public function index($slug = '')
	{
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data["name"] = $this->session->name;
		// ข้อมูลส่วนตัว ชื่อ ที่อยู่
		$data["current_page"] = $this->uri->segment(1);
		if($slug == "new"){
			$data["new_regis"] = true;
		} else {
			$data["new_regis"] = false;
		}
		$username = $this->session->username;



		$config['upload_path']          = '././uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 3000;
		$config['max_width']            = 3000;
		$config['max_height']           = 3000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules('firstname', 'Firstname', 'required');
			$this->form_validation->set_rules('lastname', 'Lastname', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data["status"] = "กรุณากรอกข้อมูลที่จำเป็นให้ครบถ้วน";
			} else if(!$this->input->post('undergraduate') && !$this->input->post('master') && !$this->input->post('doctoral'))
			{
				$data["status"] = "กรุณากรอกข้อมูลระดับการศึกษา";
			} else {

				// Input Validated

				if ( ! $this->upload->do_upload('profile_image'))
				{
					// without upload
					$this->profile_model->moreContent($username);
				}
				else
				{
					// with upload
					$file_data = $this->upload->data();
					$this->profile_model->moreContent($username, $file_data["file_name"]);
				}

				$data['status'] = "อัพเดตข้อมูลเรียบร้อยแล้ว";
				$this->session->name = $this->input->post('firstname')." ".$this->input->post('lastname');
				$data["name"] = $this->session->name;
			}

		} else {
			$data['status'] = "";
		}

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			//get interest (to check diff)
			$arr = $this->profile_model->getInterest($this->session->username);
			$interests_result = array();
			foreach($arr as $row){
				array_push($interests_result, $row["interest"]);
			}

			$interests = $this->input->post('interests');
			$interests_list = explode(",", $interests);
			$interests_deleted = array_diff($interests_result, $interests_list);
			foreach($interests_list as $interest){
				$this->profile_model->setInterest($this->session->username, $interest);
			}
			foreach($interests_deleted as $interest){
				$this->profile_model->deleteInterest($this->session->username, $interest);
			}
		}

		//get interest again (may have changes)
		$arr = $this->profile_model->getInterest($this->session->username);
		$interests_result = array();
		foreach($arr as $row){
			array_push($interests_result, $row["interest"]);
		}
		$data['interests'] = implode(",",$interests_result);

		$data['content'] = $this->profile_model->showContent($this->session->username);




		$this->load->view('header');
		$this->load->view('navbar', $data);
		$this->load->view('profile_form', $data);
		$this->load->view('footer');
	}

	public function setting(){
		// รหัสผ่าน อีเมล privacy ฯลฯ

	}

	public function deleteUser($slug){
		// Delete
		$this->load->library('session');
		$name = $this->session->name;
		if($name=="admin"){
			$this->profile_model->delete($slug);
		}
	}

	public function edit($slug){

		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// ข้อมูลส่วนตัว ชื่อ ที่อยู่
		$data['new_regis'] = false;
		$data["current_page"] = $this->uri->segment(1);
		$data["username"] = $slug;
		$username = $slug;
		$name = $this->session->name;

		$config['upload_path']          = '././uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 3000;
		$config['max_width']            = 3000;
		$config['max_height']           = 3000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules('firstname', 'Firstname', 'required');
			$this->form_validation->set_rules('lastname', 'Lastname', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data["status"] = "กรุณากรอกข้อมูลที่จำเป็นให้ครบถ้วน";
			} else if(!$this->input->post('undergraduate') && !$this->input->post('master') && !$this->input->post('doctoral'))
			{
				$data["status"] = "กรุณากรอกข้อมูลระดับการศึกษา";
			} else {

				// Input Validated

				if ( ! $this->upload->do_upload('profile_image'))
				{
					// without upload
					$this->profile_model->moreContent($username);
				}
				else
				{
					// with upload
					$file_data = $this->upload->data();
					$this->profile_model->moreContent($username, $file_data["file_name"]);
				}

				$data['status'] = "อัพเดตข้อมูลเรียบร้อยแล้ว";
			}

		} else {
			$data['status'] = "";
		}

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			//get interest (to check diff)
			$arr = $this->profile_model->getInterest($username);
			$interests_result = array();
			foreach($arr as $row){
				array_push($interests_result, $row["interest"]);
			}

			$interests = $this->input->post('interests');
			$interests_list = explode(",", $interests);
			$interests_deleted = array_diff($interests_result, $interests_list);
			foreach($interests_list as $interest){
				$this->profile_model->setInterest($username, $interest);
			}
			foreach($interests_deleted as $interest){
				$this->profile_model->deleteInterest($username, $interest);
			}
		}

		//get interest again (may have changes)
		$arr = $this->profile_model->getInterest($username);
		$interests_result = array();
		foreach($arr as $row){
			array_push($interests_result, $row["interest"]);
		}
		$data['interests'] = implode(",",$interests_result);

		$data['content'] = $this->profile_model->showContent($username);

		$this->load->view('header');
		$this->load->view('navbar', $data);
		$this->load->view('admin_edit_profile', $data);
		$this->load->view('footer');
	}
}
