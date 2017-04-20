<?php
class Work_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }

  public function getCareerType(){
    $this->db->select()->from('career_type');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getCareer($username = NULL){
    $this->db->select("c.*,c_t.*");
    $this->db->from("career c");
    $this->db->join("career_type c_t", "c.careerID = c_t.careerID",'left');
    $this->db->where('c.username',$username);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function setCareer($username = NULL){
    if($username){
      if(!$this->input->post('present')){
        $present = 0;
      } else {
        $present = $this->input->post('present');
      }
      $data = array(
        'username' => $username,
        'careerID' => $this->input->post('career'),
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

  public function toggleCurrent($username = NULL, $id = NULL, $present = NULL){
    if($username && $id){
      $query = $this->db->get_where('career', array('username' => $username, 'id' => $id));
      if($present==0){
        $present=1;
      }
      elseif($present==1){
        $present=0;
      }
      if($query->result_array()){
        $data = array(
          'present' => $present,
        );
        $this->db->where('username', $this->session->username);
        $this->db->where('id', $id);
        $this->db->update('career', $data);
      }
    }
  }


}
