<?php
class Directory_model extends CI_Model {

        public function __construct()
        {
          $this->load->database();
        }

        public function getStudentList($filter = NULL){
          if(isset($filter)){
            foreach(array_keys ($filter) as $t) {
              if($filter[$t] != '') {
                $array[$t] = $filter[$t];
              };
            }
            $query = $this->db->get_where('student', $array);
          } else {
            $query = $this->db->get('student');
          }
          return $query->result_array();
        }

        public function getStudentData($username){
          $query = $this->db->get_where('student', array('username' => $username));
	        return $query->result_array();
        }

        public function getStudentInterests($username){
          $this->db->select('interest');
          $query = $this->db->get_where('interest', array('username' => $username));
	        return $query->result_array();
        }

        // เปลี่ยนชื่อ fn มาจาก getData นะ
				public function getInterest(){
	        $query = $this->db->get('interest');
	        return $query->result_array();
				}
}
