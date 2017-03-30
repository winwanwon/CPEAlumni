<?php
class Filter_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }
  public function loadIndustry(){
    $this->db->group_by('industry');
    $query = $this->db->get('business_type');
      return $query->result_array();
  }
  public function loadBusiness(){
    $query = $this->db->get('business_type');
      return $query->result_array();
  }
  public function loadCareer(){
      $this->db->group_by('position');
      $query = $this->db->get('career');
      return $query->result_array();
  }
  public function loadInterest(){
      $this->db->group_by('interest');
      $query = $this->db->get('interest');
      return $query->result_array();
  }
  public function getStudent(){
      $temp = array(
        'fname' => 'Yanisa',
        'nickname' => 'Ai',
        'lname' => ''
      );
      $array = array();
      foreach(array_keys ($temp) as $t) {
        if($temp[$t] != '') {
          $array[$t] = $temp[$t];
        };
      }


      $query = $this->db->get_where('student',$array);
      return $query->result_array();
  }

}
