<?php
  class Register_model extends CI_Model
  {
    function insert($data)
    {
      $this->db->insert('codeigniter_register', $data);
      return $this->db->insert_id();
    }

    function verify_email($verification_key,$id){
  //   	$data = array(
	 //        'is_email_verified' => "yes"
		// );
		// $this->db->update('codeigniter_register', $data, "id = $id AND verification_key = $verification_key");
		$this->db->set('is_email_verified', 'yes');
		$this->db->where('id', $id);
		$this->db->where('verification_key',$verification_key);
		$this->db->update('codeigniter_register');
    }
  }
?>
