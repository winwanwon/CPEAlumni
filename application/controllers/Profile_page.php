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

	public function addcontent()
	{
		$data["error"] = "";
		$data["current_page"] = $this->uri->segment(1);
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->profile_model->showContent();
		$this->profile_model->moreContent();
		//$this->load->view('nextprofile');
	}

}
