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
						<p>Rp. '.$row->product_price.', -</p>
						<a class="btn btn-info" href="'.base_url('index.php/Home/open_detail/').$row->product_id.'">Details</a>
						<a class="btn btn-warning" href="'.base_url('index.php/Home/open_detail/').$row->product_id.'">Add to Cart</a>
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
						<a class="btn btn-warning" href="'.base_url('index.php/Home/open_detail/').$row->product_id.'">Add to Cart</a>
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

		public function add_to_shopping_cart_detail($product_id){
			if($this->session->userdata('id')==''){
				redirect('login');
			}
			else{
				$res = $this->home_model->addToShoppingCart($product_id,$this->input->post('qty'),$this->session->userdata('id'));
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
			$data['sc_product'] = $this->home_model->getProductFromCart($this->session->userdata('id'));
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


		public function updateProfilePass($id){
			// $this->home_model->updateProfileAddress($id,$this->input->post('new_address'));
			// $this->register_model($id,$this->input->post('new_pass'));
			redirect('home');
		}

		public function updateProfileAddress($id){
			$this->home_model->updateProfileAddress($id,$this->input->post('new_address'));
			redirect('home');
			
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

		public function editProduct(){
			if($this->session->userdata('id')==''){
				redirect('login');
			}
			$this->load->view('include/javascript.php');
			$this->load->view('include/css.php');
			$this->load->view('pages/header.php');
			

			$crud= new grocery_CRUD();
			$crud->set_table('products');
			
			$output=$crud->render();
			$data['list'] = $output;

			$this->load->view('pages/editProduct.php',$output);
			$this->load->view('pages/footer.php');
		}

		public function validationNewProduct(){
			$this->form_validation->set_rules('name', 'name', 'required');
			$this->form_validation->set_rules('price', 'price', 'required');
			$this->form_validation->set_rules('weight', 'weight', 'required');
			$this->form_validation->set_rules('detail', 'detail', 'required');	
			if($this->form_validation->run())
			{
			$config = array(
			'upload_path' => "./assets/images",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			// 'max_height' => "768",
			// 'max_width' => "1024"
			);
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('fileGambar')){
				echo $this->upload->display_errors();
			}
			$data = $this->upload->data();
	            $imagename = $data['file_name'];


				$name  = $this->input->post('name');
				$price  = $this->input->post('price');
				$weight = $this->input->post('weight');
				$detail = $this->input->post('detail');
				$category = $this->input->post('category');
				$imgname2 = "assets/images/".$imagename;
				echo $imgname2;
				$id = $this->home_model->addNewProduct($name,$price,$weight,$detail,$imgname2,$category);
				$this->session->set_flashdata('message', 'Product berhasil ditambahkan');
				redirect('home/addNewProduct');
			}
			else{
				$this->session->set_flashdata('message', 'Kolom tidak boleh kosong!');
				redirect('home/addNewProduct');
			}
		}
		public function orderHistory() {
			if($this->session->userdata('id')==''){
				redirect('login');
			}
			$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
			$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
			$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
			$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);
			$data['orders'] = $this->home_model->get_orders_by_user_id($this->session->userdata('id'));
			$this->load->view('pages/order_history.php', $data);
		}
		public function orderDetails($param=null) {
			if($this->session->userdata('id')==''){
				redirect('login');
			}
			$order_id=base64_decode(urldecode($param));
			if($order_id){
				$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
				$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
				$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
				$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);
				$data['order'] = $this->home_model->get_order_by_order_id($order_id);
				$data['order_details']=$this->home_model->get_order_details_by_id($order_id);
				$this->load->view('pages/order_details.php', $data);
			}
			else{
				echo 'There is an error';
			}
		}
		public function manageOrders() {
			if($this->session->userdata('id')==''){
				redirect('login');
			}
			if($this->session->userdata('level')==1){
				echo "Forbidden Access";
				//redirect('Home/index');
			}
			else {
				$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
				$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
				$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
				$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);
				$data['orders'] = $this->home_model->get_all_orders();
				$this->load->view('pages/manage_orders.php', $data);
			}

		}
		public function adminDashboard() {
			if($this->session->userdata('id')==''){
				redirect('login');
			}
			if($this->session->userdata('level')==1){
				echo "Forbidden Access";
				//redirect('Home/index');
			}
			else {
				$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
				$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
				$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
				$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);
				$this->load->view('pages/admin_dashboard.php', $data);
			}
		}
		public function editOrder($param=null) {
			if($this->session->userdata('id')==''){
				redirect('login');
			}
			if($this->session->userdata('level')==1){
				echo "Forbidden Access";
				//redirect('Home/index');
			}
			else {
				$order_id=base64_decode(urldecode($param));
				if($order_id){
					$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
					$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
					$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
					$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);
					$data['order'] = $this->home_model->get_order_by_order_id($order_id);
					$data['order_details']=$this->home_model->get_order_details_by_id($order_id);
					$this->load->view('pages/edit_order.php', $data);
				}
				else{
					echo 'There is an error';
					//redirect('Home/index', 'refresh');
				}
			}

		}
		public function edit_action() {
			if(isset($_POST["submit"])) {
				$this->home_model->update_order($this->input->post('order_id'),$this->input->post('tracking_number'),$this->input->post('order_status'));
				//echo "Entry updated, redirecting...";
			}
			redirect('Home/manageOrders', 'refresh');
		}
		public function delete_action($param=null) {
			if($this->session->userdata('id')==''){
				redirect('login');
			}
			if($this->session->userdata('level')==1){
				echo "Forbidden Access";
				//redirect('Home/index');
			}
			else {
				$order_id=base64_decode(urldecode($param));
				if($order_id){
					$this->home_model->delete_order($order_id);
					redirect('Home/manageOrders', 'refresh');
				}
				else {
					echo 'There is an error';
				}
			}
		}
		public function delete_shopping_cart($param) {
			if($this->session->userdata('id')==''){
				redirect('login');
			}
			else {
				$shopping_cart_id=base64_decode(urldecode($param));
				if($shopping_cart_id){
					$this->home_model->delete_shopping_cart_entry($shopping_cart_id);
					redirect('Home/openShoppingCart', 'refresh');
				}
				else {
					echo 'There is an error';
				}
			}
		}
		public function add_new_order() {
			
			if($this->session->userdata('id')==''){
				redirect('login');
			}
			else {
				$user_id=$this->session->userdata('id');
				$this->home_model->create_new_order($user_id);	
				redirect('Home/orderHistory', 'refresh');			
			}
		}
	}