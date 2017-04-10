<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Directory_page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('filter_model');
		$this->load->helper('url_helper');
	}


	public function index()
	{

		$data["current_page"] = $this->uri->segment(1);
		$this->load->library('session');
		$data["industry"] = $this->filter_model->loadIndustry();
		$data["business"] = $this->filter_model->loadBusiness();
		$data["name"] = $this->session->firstname." ".$this->session->lastname;

		$this->load->view('header');
		$this->load->view('navbar', $data);
		$this->load->view('directory', $data);
		$this->load->view('footer');
	}

	public function filter_bus()
	{
		$data["current_page"] = $this->uri->segment(1);

		$data["test"] = $this->filter_model->loadBusiness();
		$data["test2"] = $this->filter_model->getStudent();

		$data["industry"] = $this->filter_model->loadIndustry();
		$data["business"] = $this->filter_model->loadBusiness();

		$this->load->view('header');
		$this->load->view('directory', $data);
		$this->load->view('footer');
	}



}
