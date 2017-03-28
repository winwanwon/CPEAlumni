<?php
class Profile_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }
  public function loadBusiness(){
      $this->db->distinct();
      $query = $this->db->get('business_type');
      return $query->result_array();
  }
  public function loadCareer(){
      $query = $this->db->get('career');
      return $query->result_array();
  }
  public function loadInterest(){
      $query = $this->db->get('interest');
      return $query->result_array();
  }
  public function findPeople($student = NULL){

  }
}
