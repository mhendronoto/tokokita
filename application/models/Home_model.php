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

		function addToShoppingCart($p_id,$quantity,$u_id){
			$query = $this->db->query("INSERT INTO shopping_carts(user_id, product_id,quantity_shopping) VALUES($u_id,$p_id,$quantity)");
			if($query == true){
				return true;
			}
			else{
				return false;
			}
		}
		function delete_shopping_cart_entry($shopping_cart_id) {
			$this->db->delete('shopping_carts', array('shopping_cart_id' => $shopping_cart_id)); 
		}

		function getProductFromCart($user_id){
			$query = $this->db->query("SELECT s1.shopping_cart_id, p1.product_id, p1.product_name, s1.quantity_shopping, p1.product_price FROM shopping_carts as s1, products as p1 WHERE p1.product_id=s1.product_id AND s1.user_id=$user_id");
			// $query = $this->db->query("
			// 	SELECT t.id 'transactionid',t.id_user 'id_user', u.name 'username', p.product_id 'productid',t.transaction_date 'date',t.is_sent,t.is_finish, p.product_name 'productname', t.quantity 'qty', p.product_price*t.quantity 'price'
			// 	FROM transaction t, products p, codeigniter_register u
			// 	WHERE t.id_product = p.product_id AND t.id_user= u.id
			// ");

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

		function addNewProduct($name,$price,$weight,$detail,$imgname){
			$query = $this->db->query("
				INSERT INTO products(product_name,product_price,product_weight,product_detail,product_stock,product_path_image,category_id)
				VALUES('$name','$price','$weight','$detail',100,'$imgname',1)");
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

		function get_all_orders() {
			$query = $this->db->query("SELECT o1.order_id, o1.tracking_number, o2.description, o1.order_date FROM orders as o1, order_status as o2 WHERE o1.order_status_id=o2.order_status_id");
			return $query->result_array();
		}
		function get_orders_by_user_id($id) {
			$query = $this->db->query("SELECT o1.order_id, o1.tracking_number, o2.description, o1.order_date FROM orders as o1, order_status as o2 WHERE o1.order_status_id=o2.order_status_id AND o1.user_id=$id");
			return $query->result_array();
		}
		function get_order_by_order_id($id) {
			$query = $this->db->query("SELECT o1.order_id, o1.tracking_number, o2.description, o1.order_date FROM orders as o1, order_status as o2 WHERE o1.order_status_id=o2.order_status_id AND o1.order_id=$id");
			return $query->row();
		}
		function get_order_details_by_id($id) {
			$query = $this->db->query("SELECT p1.product_id, p1.product_name, o2.quantity_shopping, p1.product_price*o2.quantity_shopping as sum_price FROM orders as o1, order_details as o2, products as p1 WHERE o1.order_id=o2.order_id AND o2.product_id=p1.product_id AND o1.order_id=$id");
			return $query->result_array();
		}
		function new_order($user_id) {
			$query = $this->db->query("SELECT p1.product_id, p1.product_name, o2.quantity_shopping, p1.product_price*o2.quantity_shopping as sum_price FROM orders as o1, order_details as o2, products as p1 WHERE o1.order_id=o2.order_id AND o2.product_id=p1.product_id AND o1.order_id=$id");
			return $query->result_array();
		}
		function update_order($order_id, $tracking_number, $status_id) {
			$values=array(
				'order_id'=>$order_id,
				'tracking_number' => $tracking_number,
				'order_status_id' => $status_id,
			);		
			$this->db->where('order_id',$order_id);
			$this->db->update('orders',$values);
		}
		function delete_order($order_id) {
			$this->db->trans_start();
			$this->db->delete('order_details', array('order_id' => $order_id)); 
			$this->db->delete('orders', array('order_id' => $order_id)); 
			$this->db->trans_complete();
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