<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home_model extends CI_Model{

		function fetch_data($query){
			$this->db->select("product_id, product_name, product_price, product_path_image");
			$this->db->from("products");
			if($query != ''){
				$this->db->like('product_name', $query);
				//$this->db->or_like('yglain',$query);
				
			}
			$this->db->order_by('product_name', 'DESC');
			return $this->db->get();
		}

		function fetch_data_filtered($query, $id){
			$this->db->select("product_id, product_name, product_price, product_path_image");
			$this->db->from("products");
			$this->db->where("category_id", $id);
			if($query != ''){
				$this->db->like('product_name', $query);
				//$this->db->or_like('yglain',$query);
				
			}
			$this->db->order_by('product_name', 'DESC');
			return $this->db->get();
		}

		function get_all_products(){
			$query = $this->db->query("SELECT * FROM products");

			return $query->result_array();
		}

		// untuk mengambil data product yang ada buat di tampilin di home
		function get_selected_product($product_id){
			$query = $this->db->query("SELECT * FROM products WHERE product_id=$product_id");
			
			return $query->result_array();
		}

		// untuk seleksi kategori produk biar sesuai dengan yang diinginkan
		function get_filtered_products($id){
			$query = $this->db->query("SELECT * FROM products WHERE category_id=$id");
			
			return $query->result_array();
		}

		function addToShoppingCart($id){
			$query = $this->db->query("INSERT INTO shopping_carts(user_id, product_id,quantity_shopping) VALUES(1,$id,1)");
			if($query == true){
				return true;
			}
			else{
				return false;
			}
		}

		function getProductFromCart(){
			$query = $this->db->query("
				SELECT t.id 'transactionid',t.id_user 'id_user', u.name 'username', p.product_id 'productid',t.transaction_date 'date',t.is_sent,t.is_finish, p.product_name 'productname', t.quantity 'qty', p.product_price*t.quantity 'price'
				FROM transaction t, products p, codeigniter_register u
				WHERE t.id_product = p.product_id AND t.id_user= u.id
			");

			return $query->result_array();
		}

		function addToTransaction($id_user,$id_product,$quantity,$total){
			$query = $this->db->query("INSERT INTO transaction(id_user, id_product,transaction_date,quantity,total_price) VALUES($id_user,$id_product,NOW(),$quantity,$total)");
			if($query == true){
				return true;
			}
			else{
				return false;
			}
		}

		function getAllUser(){
			$query = $this->db->query("
				SELECT id,name
				FROM codeigniter_register
				WHERE level=1;");
			return $query->result_array();
		}

		function addNewProduct($name,$price,$weight,$detail){
			$query = $this->db->query("
				INSERT INTO products(product_name,product_price,product_weight,product_detail,product_stock,product_path_image,category_id)
				VALUES('$name','$price','$weight','$detail',100,'assets/images/coca_cola.jpg',1)");
			if($query == true){
				return true;
			}
			else{
				return false;
			}

		}

		function getProfileUser($id){
			$query = $this->db->query("SELECT id,name,email FROM codeigniter_register WHERE id= $id");
			
			return $query->result_array();
		}

		// function delete(){
		// 	$this->db->WHERE('product_id', $this->input->post('product_id'));
		// 	$this->db->delete('shopping_carts');
		// 	if ($this->db->affected_rows()) {
		// 		echo "Successfully Deleted!";
		// 	}
		// 	else{
		// 		echo "Not Deleted";
		// 	}
		// }
	}
?>