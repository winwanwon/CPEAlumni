<?php
class Directory_model extends CI_Model {

        public function __construct()
        {
          $this->load->database();
        }

				public function getData(){
	        $query = $this->db->get('interest');
	        return $query->result_array();
				}
}
