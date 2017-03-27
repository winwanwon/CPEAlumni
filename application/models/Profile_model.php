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
      'email' => $this->input->post('email')
    );

    return $this->db->insert('student', $data);
  }

public function getUser(){
    $query = $this->db->get_where('student', array('username' => post('username')));
    return $query->result();
}

public function updateUser(){
    $data = array(
      'nickname' => $this->input->post('nickname'),
      'address' => $this->input->post('address'),
      'province' => $this->input->post('province'),
      'country' => $this->input->post('country'),
      'facebook' => sha1($this->input->post('facebook')),
      'linkedin' => $this->input->post('linkedin')
    );

    $this->db->where('username', post('username'));
    return $this->db->update('student', $data);
}

}
