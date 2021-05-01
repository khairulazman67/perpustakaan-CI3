<?php  
class Login_anggota_M extends CI_Model{

	public function Login($post){
		$this->db->from('tbakunanggota');
		$this->db->where('username', $post["username"]);
		$this->db->where('password', $post["password"]);
		$query = $this->db->get();
		return $query;

		$user = $this->db->get($this->_table)->row();
		/*if($user){
            // periksa password-nya
            $isPasswordTrue = password_verify($post["password"], $user->password);
            // periksa role-nya
            $isAdmin = $user->role == "admin";

            // jika password benar dan dia admin
            if($isPasswordTrue && $isAdmin){ 
                // login sukses yay!
                $this->session->set_userdata(['user_logged' => $user]);
                return true;
            }
		*/
		
	}
}
?>