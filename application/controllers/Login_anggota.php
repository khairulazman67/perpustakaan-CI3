<?php

class Login_anggota extends CI_Controller{
	public function __construct()
    {
        parent::__construct();
    }

    public function login(){
    	$this->load->view('login/loginanggota');
    }

	public function aksi_login()
    {
    	//echo $this->input->post('login');
    	$post = $this->input->post(null, TRUE);
    	if (isset($_POST['login'])) {
    		$this->load->model('Login_anggota_M');
    		$query = $this->Login_anggota_M->Login($post);
    		if ($query->num_rows() > 0) {
    			$row = $query->row();
    			$username = array(
    				'username' => $row->username
    			);
                // $username = $row->username;
                // echo "username".$username;
    			$this->session->set_userdata($username);
    			redirect('anggota/das_anggota');
                redirect('anggota/template2/header');
                redirect('anggota/template2/sidebar');
    		}else{
                echo "<script> alert('Login gagal, cek kembali username dan password');</script>";
    			echo "<script>window.location='".base_url('utama/login_anggota')."'</script>";
    		}
    		//echo "proses";
    	}
        //jika form login disubmit
        /*if($this->input->post('login')){
            echo "proses";
        }
        */
        // tampilkan halaman login
       // $this->load->view("login/loginadmin.php");
    }
}