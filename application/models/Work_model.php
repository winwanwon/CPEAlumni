<?php
class Work_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }

  public function getBusinessType(){
    $this->db->select()->from('business_type');
    $query = $this->db->get();
    return $query->result_array();
  }


  public function getCareer($username = NULL){
    $this->db->select()->where('username',$username)->from('career');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function setCareer($username = NULL){
    if($username){
      if(!$this->input->post('present')){
        $present = 0;
      }
      $data = array(
        'username' => $username,
        'businessID' => $this->input->post('business_type'),
        'position' => $this->input->post('position'),
        'company' => $this->input->post('company'),
        'present' => $present
      );
      $this->db->insert('career', $data);
    }
  }

  public function deleteCareer($username = NULL, $id = NULL){
    if($username && $id){
      $query = $this->db->get_where('career', array('username' => $username, 'id' => $id));
      if($query->result_array()){
        $data = array(
          'username' => $username,
          'id' => $id
        );
        $this->db->delete('career', $data);
      }
    }
  }
}
