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
		$data["name"] = $this->session->firstname." ".$this->session->lastname;

		$this->load->view('header');
		$this->load->view('navbar', $data);
		$this->load->view('setting_form', $data);
		$this->load->view('footer');
	}

}
