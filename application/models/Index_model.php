<?php
class Index_model extends CI_Model {

        public function __construct()
        {
          $this->load->database();
        }

				public function login(){
          $this->db->where('username', $this->input->post('username'));
          $this->db->select('password');
          $this->db->from('student');
          $query = $this->db->get();

          if ( sha1($this->input->post('password')) == $query["password"]->result_array() ) {
            return true;
          }
          else {
            return false;
          }
				}
}
