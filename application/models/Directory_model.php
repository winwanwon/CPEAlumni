<?php
class Directory_model extends CI_Model {

        public function __construct()
        {
          $this->load->database();
        }

        public function getStudentList($filter = NULL){
          $array = array();
          $array_like = array();
          if(isset($filter)){
            foreach(array_keys ($filter) as $t) {
              if($filter[$t] != '') {
                if($t == "fname" || $t == "lname"){
                  $array_like[$t] = $filter[$t];
                } else if($t == "career"){ 
                  $career = $filter[$t];
                } else if($t == "interests"){
                  $interests = $filter[$t];
                } else {
                  $array[$t] = $filter[$t];
                }
              };
            }
            $this->db->select("*");
            $this->db->from('student');
            $this->db->where($array);
            $this->db->like($array_like);
            if(isset($career)){
              $this->db->join('career', 'student.username = career.username');
              $this->db->where('careerID', $career);
            }
            if(isset($interests)){
              $this->db->join('interest', 'student.username = career.username');
              $this->db->like('interest', $interests);
            }
            $query = $this->db->get();
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

        public function getStudentCareer($username){
          $this->db->select('position, company, present');
          $query = $this->db->get_where('career', array('username' => $username));
	        return $query->result_array();
        }

        // เปลี่ยนชื่อ fn มาจาก getData นะ
				public function getInterest(){
	        $query = $this->db->get('interest');
	        return $query->result_array();
				}

        //show career dropdown list
        public function getCareerType(){
          $this->db->select()->from('career_type');
          $query = $this->db->get();
          return $query->result_array();
        }
}
