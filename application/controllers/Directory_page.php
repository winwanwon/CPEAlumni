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
		// GET career to show in dropdown
		$data["career"] = $this->directory_model->getCareerType();

			$filter = array();
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
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
			if($undergraduate=="on"){
				$undergraduate = 1;
				$filter["generation >="] = $undergraduate;
			}
		}
		if(isset($master)){
			if($master=="on")
			{
			$master = 1;
			$filter["master >="] = $master;
			}
		}
		if(isset($doctoral)){
			if($doctoral=="on")
			{
			$doctoral = 1;
			$filter["doctoral >="] = $doctoral;
			}
		}
		$filter["privacy !="] = "UL";
		var_dump($filter);

		$data["students"] = $this->directory_model->getStudentList($filter);
		} else {
		$filter["privacy !="] = "UL";
		$data["students"] = $this->directory_model->getStudentList($filter);
		}

		$this->load->view('header');
		$this->load->view('navbar', $data);
		$this->load->view('directory', $data);
		$this->load->view('footer');
	}

	public function getuser($username){
		$data["current_page"] = $this->uri->segment(1);
		$this->load->library('session');
		$data["name"] = $this->session->name;

		$result = $this->directory_model->getStudentData($username);

		$interests = $this->directory_model->getStudentInterests($username);
		$int_arr = array();
		foreach($interests as $interest){
			array_push($int_arr, $interest["interest"]);
		}

		$result[0]["interests"] = $int_arr;

		$data["students"] = $result;

		header('Content-Type: application/json');
		echo json_encode( $data["students"] );
	}

	public function filter_bus()
	{
		$data["current_page"] = $this->uri->segment(1);

		$data["test"] = $this->filter_model->loadCareerType();

		//$data["industry"] = $this->filter_model->loadIndustry();
		$data["business"] = $this->filter_model->loadCareerType();

		$this->load->view('header');
		$this->load->view('directory', $data);
		$this->load->view('footer');
	}
}
