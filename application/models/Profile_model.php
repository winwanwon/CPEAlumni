<?php
class Profile_model extends CI_Model {

public function __construct()
{
   $this->load->database();
}

public function createUser(){

    if($this->input->post('master') == NULL){
      $master = 0;
    } else {
      $master = 1;
    }
    if($this->input->post('doctoral') == NULL){
      $doctoral = 0;
    } else {
      $doctoral = 1;
    }

    if($this->input->post('undergraduate') == NULL){
      $generation = "";
      $programme = "";
    } else {
      $generation = $this->input->post('generation');
      $programme = $this->input->post('program');
    }


    $data = array(
      'nameTitle' => $this->input->post('prefix'),
      'fName' => $this->input->post('firstname'),
      'lName' => $this->input->post('lastname'),
      'username' => $this->input->post('username'),
      'password' => sha1($this->input->post('password')),
      'email' => $this->input->post('email'),
      'generation' => $generation,
      'programme' => $programme,
      'master' => $master,
      'doctoral' => $doctoral
    );

    return $this->db->insert('student', $data);
  }

public function getUser(){
    $query = $this->db->get_where('student', array('username' => sha1($this->input->post('password'))));
    return $query->result();
}

public function updateUser(){
    return $this->db->insert('student', $data);
  }

  public function showContent($student = NULL){
      $query = $this->db->get_where('student',array('username' => $student));
      return $query->result_array();
  }
  public function moreContent($student = NULL){
    $data = array(
      'fName' => $this->input->post('firstname'),
      'lName' => $this->input->post('lastname'),
      'nickname' => $this->input->post('nickname'),
      'address' => $this->input->post('address'),
      'province' => $this->input->post('province'),
      'country' => $this->input->post('country'),
      'facebook' => $this->input->post('facebook'),
      'linkedin' => $this->input->post('linkedin') ,
      'picture' => $this->input->post('picture') ,
      'permission' => $this->input->post('permission') ,
      'phone' => $this->input->post('phone') ,
      'programme' => $this->input->post('programme') ,
      'generation' => $this->input->post('generation') ,
      'master' => $this->input->post('master') ,
      'doctoral' => $this->input->post('doctoral') ,
    );
    $this->db->where('username', $student);
    $this->db->update('student', $data);
   //return $this->db->insert('student', $data);
  }
}
