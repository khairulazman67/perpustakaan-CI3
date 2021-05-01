<?php
class Logout extends CI_Controller{
	public function aksi_logout() {
		$this->simple_login->logout();
		//redirect(base_url('utama'));
	}
}

?>