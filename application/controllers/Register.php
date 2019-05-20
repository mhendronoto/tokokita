<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Register extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			if($this->session->userdata('id'))
			{
			redirect('home');
			}
			$this->load->library('form_validation');
			$this->load->library('encryption');
			$this->load->model('register_model');

		}

		function index()
		{
			$data['js'] = $this->load->view('/include/javascript_login.php', NULL, TRUE);
			$data['css'] = $this->load->view('/include/css_login.php', NULL, TRUE);
			$this->load->view('pages/register.php', $data);
		}

		function validation()
		{
			$this->form_validation->set_rules('user_name', 'Name', 'required|trim');
			$this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email|is_unique[codeigniter_register.email]');
			$this->form_validation->set_rules('user_password', 'Password', 'required');
			$this->form_validation->set_rules('conf_user_password','Confirmation Password','required|matches[user_password]');
			if($this->form_validation->run())
			{
				$verification_key = md5(rand());
				$encrypted_password = $this->bcrypt->hash_password($this->input->post('user_password'));

				$data = array
				(
					'name'  => $this->input->post('user_name'),
					'email'  => $this->input->post('user_email'),
					'password' => $encrypted_password,
					'verification_key' => $verification_key
				);
				$id = $this->register_model->insert($data);
				$this->session->set_flashdata('message', 'Register berhasil');
				if($id > 0)
				{
					$subject = "Please verify email for login";
					$message = "Hi ".$this->input->post('user_name')."
This is email verification mail from Codeigniter Login Register system. For complete registration process and login into system. First you want to verify you email by click this ".site_url()."/register/verify_email/".$verification_key."/".$id." link.
Once you click this link your email will be verified and you can login into system.
Thanks
						";
						$config = array(
							'protocol'  => 'smtp',
					    	'smtp_host' => 'ssl://smtp.gmail.com',
					    	'smtp_port' => 465,
					    	'smtp_user'  => 'ourtoko2019@gmail.com', 
					        'smtp_pass'  => '=tokokita2019', 
					     	'mailtype'  => 'html',
					     	'charset' => 'utf-8',
					     	'charset'    => 'iso-8859-1',
					        'wordwrap'   => TRUE
						);
						$this->load->library('email', $config);
						$this->email->set_newline("\r\n");
						$this->email->from('noreply-ourtoko2019@gmail.com','tokokita');
						// $this->email->to($this->input->post('user_email'));
						$this->email->to($this->input->post('user_email'));
						$this->email->subject($subject);
						$this->email->message($message);
						$result = $this->email->send();
						if($result)
						{
							echo "berhasil";
							$this->session->set_flashdata('message', 'Check in your email for email verification mail');
							redirect('register');
						}
						echo $this->email->print_debugger();
				}
			}
			else
			{
				$this->index();
			}
		}

		function verify_email($verification_key,$id){
			$this->register_model->verify_email($verification_key,$id);
			redirect('login');
		}
	}
?>