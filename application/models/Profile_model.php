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
      $master = $this->input->post('yoe_master');
    }
    if($this->input->post('doctoral') == NULL){
      $doctoral = 0;
    } else {
      $dcotoral = $this->input->post('yoe_doctoral');
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

  public function moreContent($student = NULL, $picture = NULL){

    if($this->input->post('master') == NULL){
      $master = 0;
    } else {
      $master = $this->input->post('yoe_master');
    }
    if($this->input->post('doctoral') == NULL){
      $doctoral = 0;
    } else {
      $dcotoral = $this->input->post('yoe_doctoral');
    }

    if($this->input->post('undergraduate') == NULL){
      $generation = "";
      $programme = "";
    } else {
      $generation = $this->input->post('generation');
      $programme = $this->input->post('program');
    }

    if($picture==""){
      $data = array(
        'fName' => $this->input->post('firstname'),
        'lName' => $this->input->post('lastname'),
        'nickname' => $this->input->post('nickname'),
        'address' => $this->input->post('address'),
        'province' => $this->input->post('province'),
        'country' => $this->input->post('country'),
        'facebook' => $this->input->post('facebook'),
        'linkedin' => $this->input->post('linkedin') ,
        'permission' => $this->input->post('permission') ,
        'phone' => $this->input->post('phone') ,
        'generation' => $generation,
        'programme' => $programme,
        'master' => $master,
        'doctoral' => $doctoral
      );
    } else {
      $data = array(
        'fName' => $this->input->post('firstname'),
        'lName' => $this->input->post('lastname'),
        'nickname' => $this->input->post('nickname'),
        'address' => $this->input->post('address'),
        'province' => $this->input->post('province'),
        'country' => $this->input->post('country'),
        'facebook' => $this->input->post('facebook'),
        'linkedin' => $this->input->post('linkedin') ,
        'picture' => $picture,
        'permission' => $this->input->post('permission') ,
        'phone' => $this->input->post('phone') ,
        'generation' => $generation,
        'programme' => $programme,
        'master' => $master,
        'doctoral' => $doctoral
      );
    }

    $this->db->where('username', $student);
    $this->db->update('student', $data);
    //return $this->db->insert('student', $data);
  }

  public function getInterest($username = NULL){
    $this->db->select('interest')->where('username',$username)->from('interest');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function setInterest($username = NULL, $interest = NULL){
    if($username && $interest){
      $query = $this->db->get_where('interest', array('username' => $username, 'interest' => $interest));
      if(!$query->result_array()){
        $data = array(
          'username' => $username,
          'interest' => $interest
        );
        $this->db->insert('interest', $data);
      }
    }
  }
}
