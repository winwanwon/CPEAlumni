<?php
class Index_model extends CI_Model {

        public function __construct()
        {
          $this->load->database();
        }

				public function login(){
          $password = "";
          $this->db->where('username', $this->input->post('username'));
          $this->db->from('student');
          $query = $this->db->get();

          foreach($query->result_array() AS $row) {
              $password = $row['password'];
              $name = $row["fname"]." ".$row["lname"];
          }

          if (sha1($this->input->post('password')) == $password){
            return $name;
          }
          else {
            return FALSE;
          }
				}
}
