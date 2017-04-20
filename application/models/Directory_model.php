<?php
class Directory_model extends CI_Model {

        public function __construct()
        {
          $this->load->database();
        }

        public function getStudentList($filter = NULL){
            $array = array();
            foreach(array_keys ($filter) as $t) {
              if($filter[$t] != '') {
                $array[$t] = $filter[$t];
              };
            }

            $query = $this->db->get_where('student', $array);
            return $query->result_array();
        }

        public function getStudentData($username = NULL){
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
