<?php
class Setting_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }

  public function passwordCheck(){
    $password = "";
    $this->db->where('username', $this->session->username);
    $this->db->from('student');
    $query = $this->db->get();
    foreach($query->result_array() AS $row) {
      $password = $row['password'];
    }
    if (sha1($this->input->post('old_password')) == $password){
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  public function passwordUpdate(){
    $new_password = $this->input->post('new_password');
    $new_password_conf = $this->input->post('new_password_conf');
    if($new_password == $new_password_conf){
      $data = array(
        'password' => sha1($new_password)
      );
      $this->db->where('username', $this->session->username);
      $this->db->update('student', $data);
      return TRUE;
    } else {
      return FALSE;
    }

  }

  public function privacyUpdate(){
    $data = array(
      'privacy' => $this->input->post('privacy')
    );
    $this->db->where('username', $this->session->username);
    $this->db->update('student', $data);
    return TRUE;
  }

}
