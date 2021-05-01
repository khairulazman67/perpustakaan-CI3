<?php  
class Login_admin_M extends CI_Model{

	public function Login($post){
		$this->db->from('tbakunadmin');
		$this->db->where('username', $post["username"]);
		$this->db->where('password', $post["password"]);
		$query = $this->db->get();
		return $query;

		$user = $this->db->get($this->_table)->row();
		
	}
}
?>