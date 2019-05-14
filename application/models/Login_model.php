<?php
	class Login_model extends CI_Model
	{
		function can_login($email, $password)
		{
			$this->db->where('email', $email);
			$query = $this->db->get('codeigniter_register');
			if($query->num_rows() > 0)
			{
		   		foreach($query->result() as $row)
		   		{
			    	// $store_password = $this->encryption->decrypt($row->password);
			    	//if($password == $store_password)
			    	if($this->bcrypt->check_password($password,$row->password))
			    	{
			    		$array=array(
			    			'id'=>$row->id,
			    			'level'=>$row->level,
			    			'nama'=>$row->name);
			      		$this->session->set_userdata($array);
			     	}
				    else
				    {
				    	return 'Wrong Password';
				    }
		   		}    
		   	}
		   	else
		   	{
		   		return 'Wrong Email';
		   	}
		}

   	}
?>