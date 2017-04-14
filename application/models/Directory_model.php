<?php
class Directory_model extends CI_Model {

        public function __construct()
        {
          $this->load->database();
        }

        public function getData(){
          
        }

        // เปลี่ยนชื่อ fn มาจาก getData นะ
				public function getInterest(){
	        $query = $this->db->get('interest');
	        return $query->result_array();
				}
}
