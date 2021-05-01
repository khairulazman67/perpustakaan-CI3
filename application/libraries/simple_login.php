<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');
class Simple_login {
 // SET SUPER GLOBAL
 	var $CI = NULL;
 	public function __construct() {
 		$this->CI =& get_instance();
 	}
 // Fungsi login
 /*public function login($username, $password) {
 $query = $this->CI->db->get_where('users',array('username'=>$username,'password' => $password));
 if($query->num_rows() == 1) {
 $row = $this->CI->db->query('SELECT username FROM tbakunadmin,tbakunanggota where username = "'.$username.'"');
 $admin = $row->row();
 $id = $admin->username;
 $this->CI->session->set_userdata('username', $username);
 $this->CI->session->set_userdata('id_login', uniqid(rand()));
 $this->CI->session->set_userdata('id', $id);
 redirect(base_url('dasbor'));
 }else{
 $this->CI->session->set_flashdata('sukses','Oops... Username/password salah');
 redirect(base_url('utama'));
 }
 return false;
 }
 */
 // Proteksi halaman
 	public function sudah_login_admin() {
 		if($this->CI->session->userdata('username') != '') {
 			//$this->CI->session->set_flashdata('sukses','Anda belum login');
 			echo "<script> alert('Anda sudah login');</script>";
 			echo "<script>window.location='".base_url('admin/das_admin')."'</script>";
 			echo "<script>window.location='".base_url('admin/template/header')."'</script>";
 			echo "<script>window.location='".base_url('admin/template/sidebar')."'</script>";
 			//redirect('admin/das_admin');
            //redirect('admin/template/header');
            //redirect('admin/template/sidebar');
 		}
 	}
 	public function sudah_login_anggota() {
 		if($this->CI->session->userdata('username') != '') {
 			//$this->CI->session->set_flashdata('sukses','Anda belum login');
 			echo "<script> alert('Anda sudah login');</script>";
 			echo "<script>window.location='".base_url('anggota/das_anggota')."'</script>";
 			echo "<script>window.location='".base_url('anggota/template2/header')."'</script>";
 			echo "<script>window.location='".base_url('anggota/template2/sidebar')."'</script>";
 			//redirect('anggota/das_anggota');
            //redirect('anggota/template2/header');
           //redirect('anggota/template2/sidebar');
 		}
 	}
 	public function cek_login() {
 		if($this->CI->session->userdata('username') == '') {
 			//$this->CI->session->set_flashdata('sukses','Anda belum login');
 			echo "<script> alert('Anda Belum Login');</script>";
 			echo "<script>window.location='".base_url('utama/dashboard')."'</script>";
 			//redirect('utama');
 		}
 	}
 // Fungsi logout
 	public function logout() {
 		$this->CI->session->unset_userdata('username');
 		echo "<script> alert('Logout berhasil');</script>";
 		echo "<script>window.location='".base_url('utama/dashboard')."'</script>";
 //$this->CI->session->unset_userdata('id_login');
 //$this->CI->session->unset_userdata('id');
 		//$this->CI->session->set_flashdata('sukses','Anda berhasil logout');
 		//redirect(base_url('utama'));
 	}
}