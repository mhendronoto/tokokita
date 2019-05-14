<?php
	class Logout_model extends CI_Model
	{
		function user_logout()
		{
			$this->session->sess_destroy();
		}
   	}
?>