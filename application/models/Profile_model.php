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
      $doctoral = $this->input->post('yoe_doctoral');
    }

    if($this->input->post('undergraduate') == NULL){
      $generation = "";
      $programme = "";
    } else {
      $generation = $this->input->post('generation');
      $programme = $this->input->post('program');
    }


    $data = array(
      'nameTitle' => html_escape($this->input->post('prefix')),
      'fName' => html_escape($this->input->post('firstname')),
      'lName' => html_escape($this->input->post('lastname')),
      'username' => html_escape($this->input->post('username')),
      'password' => sha1($this->input->post('password')),
      'email' => html_escape($this->input->post('email')),
      'generation' => html_escape($generation),
      'programme' => html_escape($programme),
      'master' => html_escape($master),
      'doctoral' => html_escape($doctoral)
    );

    return $this->db->insert('student', $data);
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

    if($this->input->post('highschool') == NULL){
      $highschool = "";
    } else {
      $highschool = $this->input->post('highschool');
    }

    if($this->input->post('highschool_gpax') == NULL){
      $highschool_gpax = "";
    } else {
      $highschool_gpax = $this->input->post('highschool_gpax');
    }

    if($this->input->post('admission_program') == NULL){
      $admission_program = "";
    } else {
      $admission_program = $this->input->post('admission_program');
    }

    if($picture==""){
      $data = array(
        'fName' => html_escape($this->input->post('firstname')),
        'lName' => html_escape($this->input->post('lastname')),
        'nickname' => html_escape($this->input->post('nickname')),
        'email' => html_escape($this->input->post('email')),
        'address' => html_escape($this->input->post('address')),
        'province' => html_escape($this->input->post('province')),
        'country' => html_escape($this->input->post('country')),
        'facebook' => html_escape($this->input->post('facebook')),
        'linkedin' => html_escape($this->input->post('linkedin')),
        'phone' => html_escape($this->input->post('phone')),
        'generation' => html_escape($generation),
        'programme' => html_escape($programme),
        'master' => html_escape($master),
        'doctoral' => html_escape($doctoral),
        'highSchool' => html_escape($highschool),
        'highSchoolGPAX' => html_escape($highschool_gpax),
        'admissionProgram' => html_escape($admission_program)
      );
    } else {
      $data = array(
        'fName' => html_escape($this->input->post('firstname')),
        'lName' => html_escape($this->input->post('lastname')),
        'nickname' => html_escape($this->input->post('nickname')),
        'email' => html_escape($this->input->post('email')),
        'address' => html_escape($this->input->post('address')),
        'province' => html_escape($this->input->post('province')),
        'country' => html_escape($this->input->post('country')),
        'facebook' => html_escape($this->input->post('facebook')),
        'linkedin' => html_escape($this->input->post('linkedin') ),
        'picture' => html_escape($picture),
        'phone' => html_escape($this->input->post('phone') ),
        'generation' => html_escape($generation),
        'programme' => html_escape($programme),
        'master' => html_escape($master),
        'doctoral' => html_escape($doctoral),
        'highSchool' => html_escape($highschool),
        'highSchoolGPAX' => html_escape($highschool_gpax),
        'admissionProgram' => html_escape($admission_program)
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

  public function deleteInterest($username = NULL, $interest = NULL){
    if($username && $interest){
      $query = $this->db->get_where('interest', array('username' => $username, 'interest' => $interest));
      if($query->result_array()){
        $data = array(
          'username' => $username,
          'interest' => $interest
        );
        $this->db->delete('interest', $data);
      }
    }
  }
}
