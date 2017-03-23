<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Directory_page extends CI_Controller {

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
		$this->load->model('directory_model');
		$this->load->helper('url_helper');
	}


	public function index()
	{

		$data['wow'] = $this->directory_model->getData();

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('directory', $data);
	}
}
