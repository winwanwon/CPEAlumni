<?php
class Directory_model extends CI_Model {

        public function __construct()
        {
          $this->load->database();
        }

        public function getData($username = NULL){
          $query = $this->db->get('student');
          if($username){
            $this->db->where('username', $username);
          }
	        return $query->result_array();
        }

        // เปลี่ยนชื่อ fn มาจาก getData นะ
				public function getInterest(){
	        $query = $this->db->get('interest');
	        return $query->result_array();
				}
}
