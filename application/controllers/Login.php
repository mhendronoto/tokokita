<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
	  		$this->load->library('form_validation');
	  		$this->load->library('encryption');
	  		$this->load->model('login_model');
		}

		function index()
		{
			if($this->session->userdata('id')==''){
				$data['js'] = $this->load->view('/include/javascript_login.php', NULL, TRUE);
				$data['css'] = $this->load->view('/include/css_login.php', NULL, TRUE);
				$this->load->view('pages/login',$data);
			}
			else{
				redirect('home');
			}
			
		}

		function validation()
		{
	 		$this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email');
	  		$this->form_validation->set_rules('user_password', 'Password', 'required');
	  		if($this->form_validation->run())
	  		{
	   			echo "string";
	   			$result = $this->login_model->can_login($this->input->post('user_email'), $this->input->post('user_password'));
	   			if($result == '')
	   			{
	    			redirect('home');
	   			}
	  			else
	   			{
					$this->session->set_flashdata('message',$result);
					redirect('login');
	   			}
	  		}
	  		else
	  		{
	   			$this->index();
	  		}
	 	}
	}
?>