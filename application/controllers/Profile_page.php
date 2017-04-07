<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_page extends CI_Controller {

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
		$this->load->model('index_model');
		$this->load->helper('url_helper');
		$this->load->helper('html');
	}
	public function index()
	{
		$this->load->library('session');
		$data["name"] = $this->session->firstname." ".$this->session->lastname;
		$data["current_page"] = $this->uri->segment(1);
		$this->load->view('header');
		$this->load->view('navbar', $data);
		$this->load->view('profile');
		$this->load->view('footer');
	}

	public function edit($slug = ''){
		$this->load->library('session');
		$data["name"] = $this->session->firstname." ".$this->session->lastname;
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
		if ( ! $this->upload->do_upload('profile_image'))
		{
			// without upload
			if ($this->input->server('REQUEST_METHOD') == 'POST') {
				$this->profile_model->moreContent($username);
			}
		}
		else
		{
			// with upload
			$file_data = $this->upload->data();
			if ($this->input->server('REQUEST_METHOD') == 'POST') {
				$this->profile_model->moreContent($username, $file_data["file_name"]);
			}
		}
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$data['status'] = "อัพเดตข้อมูลเรียบร้อยแล้ว";
		} else {
			$data['status'] = "";
		}

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$interests = $this->input->post('interests');
			$interests_list = explode(",", $interests);
			foreach($interests_list as $interest){
				$this->profile_model->setInterest($this->session->username, $interest);
			}
		}

		$data['content'] = $this->profile_model->showContent($this->session->username);

		//get interest
		$arr = $this->profile_model->getInterest($this->session->username);
		$interests_result = array();
		foreach($arr as $row){
			array_push($interests_result, $row["interest"]);
		}
		$data['interests'] = implode(",",$interests_result);


		$this->load->view('header');
		$this->load->view('navbar', $data);
		$this->load->view('profile_form', $data);
		$this->load->view('footer');
	}

	public function work($slug = ''){
		$this->load->library('session');
		$data["name"] = $this->session->firstname." ".$this->session->lastname;
		// ข้อมูลส่วนตัว ชื่อ ที่อยู่
		$data["current_page"] = $this->uri->segment(1);
		if($slug == "new"){
			$data["new_regis"] = true;
		} else {
			$data["new_regis"] = false;
		}
		$this->load->view('header');
		$this->load->view('navbar', $data);
		$this->load->view('work_form', $data);
		$this->load->view('footer');
	}

	public function setting(){
		// รหัสผ่าน อีเมล privacy ฯลฯ

	}
}
