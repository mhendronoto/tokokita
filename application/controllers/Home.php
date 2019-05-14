<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->model('home_model');
			$this->load->model('logout_model');
		}

		public function index(){
			if($this->session->userdata('id')==''){
				$this->session->set_userdata('level',2);
			}
			$home_models['data'] = $this->home_model->get_all_products();

			$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
			$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
			$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
			$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);
			$data['content'] = $this->load->view('pages/content.php', $home_models, TRUE);

			$this->load->view('pages/home.php', $data);
		}

		public function fetch(){
			$output = '';
			$query = '';
			if($this->input->post('query')){
				$query = $this->input->post('query');
			}
			$data = $this->home_model->fetch_data($query);
						
			$output .= '
				<div class="row">
			';
			if($data->num_rows() > 0){
				foreach($data->result() as $row){
					$output .= '
						<div class="card col-lg-3 col-md-3 col-sm-3" style="margin-bottom: 20px;">';
					$output .= '
						<img src="'.base_url().$row->product_path_image.'" width="auto" height="268px" style="padding-bottom:10px">
						<p><b>'.$row->product_name.'</b></p>
						<p>Rp. '.$row->product_price.'</p>
						<a class="btn btn-info" href="'.base_url('index.php/Home/open_detail/').$row->product_id.'">Details</a>
						<a class="btn btn-warning" href="'.base_url('index.php/Home/add_to_shopping_cart_home/').$this->session->userdata('id').'/'.$row->product_id.'/'.'1/'.$row->product_price.'">Add to Cart</a>
					';	
					$output .= '
						</div>
					';
				}
			}
			else{
				$output .= '
					<center><h2>Search not Found</h2></center>
				';
			}
			$output .= '
				</div>
			';
			echo $output;
		}

		public function fetch_filtered($category_id){
			$output = '';
			$query = '';
			$id = $category_id;//$this->input->post('category');
			echo '<script>console.log('.$id.')</script>';
			if($this->input->post('query')){
				$query = $this->input->post('query');
			}
			$data = $this->home_model->fetch_data_filtered($query, $id);
						
			$output .= '
				<div class="row">
			';
			if($data->num_rows() > 0){
				foreach($data->result() as $row){
					$output .= '
						<div class="card col-lg-3 col-md-3 col-sm-3" style="margin-bottom: 20px;">';
					$output .= '
						<img src="'.base_url().$row->product_path_image.'" width="auto" height="268px" style="padding-bottom:10px">
						<p><b>'.$row->product_name.'</b></p>
						<p>'.$row->product_price.'</p>
						<a class="btn btn-info" href="'.base_url('index.php/Home/open_detail/').$row->product_id.'">Details</a>
						<a class="btn btn-warning" href="'.base_url('index.php/Home/add_to_shopping_cart_home/').$this->session->userdata('id').'/'.$row->product_id.'/'.'1/'.$row->product_price.'">Add to Cart</a>
					';	
					$output .= '
						</div>
					';
				}
			}
			else{
				$output .= '
					<center><h2>Search not Found</h2></center>
				';
			}
			$output .= '
				</div>
			';
			echo $output;
		}

		public function open_detail($product_id){
			$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
			$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
			$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
			$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);
			$data['selected_product'] = $this->home_model->get_selected_product($product_id);
			$this->load->view('pages/product_detail.php', $data);
		}

		public function filter_category(){
			$id =  $this->input->post('category');

			$home_models['filter_data'] = $this->home_model->get_filtered_products($id);
			$home_models['data'] = $this->home_model->get_all_products();

			$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
			$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
			$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
			$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);
			$data['content'] = $this->load->view('pages/content.php', $home_models, TRUE);

			$this->load->view('pages/home.php', $data);
			
		}

		public function add_to_shopping_cart_home($id_user,$id_product,$quantity,$total){
			if($this->session->userdata('id')==''){
				redirect('login');
			}
			else{
				// $res = $this->home_model->addToShoppingCart($product_id);
				$res = $this->home_model->addToTransaction($id_user,$id_product,$quantity,$total);
				if($res){
					redirect(base_url('index.php/Home')); //biar pulangnya ke HOME
				}
				else{
					echo 'There is an error';
				}
			}
		}

		public function add_to_shopping_cart_detail($product_id){
			if($this->session->userdata('id')==''){
				redirect('login');
			}
			else{
				$res = $this->home_model->addToShoppingCart($product_id);
				if($res){
					redirect(base_url('index.php/Home/open_detail/').$product_id); //biar pulangnya tetap di DETAIL PRODUK
				}
				else{
					echo 'There is an error';
				}
			}
		}

		public function openAbout(){
			$home_models['data'] = $this->home_model->get_all_products();

			$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
			$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
			$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
			$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);
			$data['content'] = $this->load->view('pages/content.php', $home_models, TRUE);

			$this->load->view('pages/about.php', $data);
		}

		public function openShoppingCart(){
			if($this->session->userdata('id')==''){
				redirect('login');
			}
			$data['sc_product'] = $this->home_model->getProductFromCart();
			$data['daftar_user']=$this->home_model->getAllUser();
			$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
			$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
			$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
			$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);

			$this->load->view('pages/shopping_cart.php', $data);
		}

		public function userLogout(){
			if($this->session->userdata('id')==''){
				redirect('login');
			}
			$this->logout_model->user_logout();
			redirect('home');
		}

		public function openProfile(){
			if($this->session->userdata('id')==''){
				redirect('login');
			}
			$data['profile']=$this->home_model->getProfileUser($this->session->userdata('id'));
			$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
			$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
			$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
			$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);

			$this->load->view('pages/profile.php', $data);
		}

		public function addNewProduct(){
			if($this->session->userdata('id')==''){
				redirect('login');
			}
			$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
			$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
			$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
			$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);

			$this->load->view('pages/insertProduct.php', $data);
		}

		public function validationNewProduct(){
			$this->form_validation->set_rules('name', 'name', 'required');
			$this->form_validation->set_rules('price', 'price', 'required');
			$this->form_validation->set_rules('weight', 'weight', 'required');
			$this->form_validation->set_rules('detail', 'detail', 'required');	
			if($this->form_validation->run())
			{
				$name  = $this->input->post('name');
				$price  = $this->input->post('price');
				$weight = $this->input->post('weight');
				$detail = $this->input->post('detail');
				$id = $this->home_model->addNewProduct($name,$price,$weight,$detail);
				$this->session->set_flashdata('message', 'Product berhasil ditambahkan');
				redirect('home/addNewProduct');
			}
			else{
				$this->session->set_flashdata('message', 'Kolom tidak boleh kosong!');
				redirect('home/addNewProduct');
			}
		}
	}
?>