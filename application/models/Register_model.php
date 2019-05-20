<?php
  class Register_model extends CI_Model
  {
    function insert($data)
    {
      $this->db->insert('codeigniter_register', $data);
      return $this->db->insert_id();
    }

    function verification_email($verification_email,$id){
    	$data = array(
	        'is_email_verified' => "yes"
		);
		$this->db->update('codeigniter_register', $data, "id = $id AND verification_key = $verification_key");
    }
  }
?>
