<?php
class Profile_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }

  public function createUser(){

    $data = array(
      'nameTitle' => $this->input->post('username'),
      'fName' => $this->input->post('firstname'),
      'lName' => $this->input->post('lastname'),
      'username' => $this->input->post('username'),
      'password' => sha1($this->input->post('password')),
      'email' => $this->input->post('email'),
    );


    return $this->db->insert('student', $data);
  }
}
