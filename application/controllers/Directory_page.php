<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Directory_page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('filter_model');
		$this->load->model('directory_model');
		$this->load->helper('url_helper');
	}


	public function index()
	{
		$data["current_page"] = $this->uri->segment(1);
		$this->load->library('session');
		$this->load->helper('form');
		//$data["industry"] = $this->filter_model->loadIndustry();
		$data["business"] = $this->filter_model->loadCareerType();
		$data["name"] = $this->session->name;

		// SEARCH FILTER
		$name = $this->input->post("name");
		$generation = $this->input->post("generation");
		$interests = $this->input->post("interests");
		$career = $this->input->post("career");
		$undergraduate = $this->input->post("undergraduate");
		$master = $this->input->post("master");
		$doctoral = $this->input->post("doctoral");

		//Show Search Data in Form
		$data["name_filter"] = $name;
		$data["generation_filter"] = $generation;
		$data["interests_filter"] = $interests;
		$data["career_filter"] = $career;
		$data["undergraduate_filter"] = $undergraduate;
		$data["master_filter"] = $master;
		$data["doctoral_filter"] = $doctoral;

		$name_split = explode(" ",$name);
		if(isset($name_split[0])){
			$fname = $name_split[0];
		}
		if(isset($name_split[1])){
			$lname = $name_split[1];
		}

		$filter = array();

		if(isset($fname)){
			$filter["fname"] = $fname;
		} 
		if(isset($lname)){
			$filter["lname"] = $lname;
		}
		if(isset($generation)){
			$filter["generation"] = $generation;
		}
		if(isset($interests)){
			$filter["interests"] = $interests;
		}
		if(isset($career)){
			$filter["career"] = $career;
		}
		if(isset($undergraduate)){
			$filter["undergraduate"] = $undergraduate;
		}
		if(isset($master)){
			$filter["master"] = $master;
		}
		if(isset($doctoral)){
			$filter["doctoral"] = $doctoral;
		}
		
		$data["students"] = $this->directory_model->getStudentList($filter);

		$this->load->view('header');
		$this->load->view('navbar', $data);
		$this->load->view('directory', $data);
		$this->load->view('footer');
	}

	public function getuser($username){
		$data["current_page"] = $this->uri->segment(1);
		$this->load->library('session');
		$data["name"] = $this->session->name;
		$data["students"] = $this->directory_model->getStudentData($username);

		header('Content-Type: application/json');
		echo json_encode( $data["students"] );
	}

	public function filter_bus()
	{
		$data["current_page"] = $this->uri->segment(1);

		$data["test"] = $this->filter_model->loadCareerType();
		$data["test2"] = $this->filter_model->getStudent();

		//$data["industry"] = $this->filter_model->loadIndustry();
		$data["business"] = $this->filter_model->loadCareerType();

		$this->load->view('header');
		$this->load->view('directory', $data);
		$this->load->view('footer');
	}



}
