<?php

class Login_admin extends CI_Controller{
	public function __construct()
    {
        parent::__construct();
    }

    public function login(){
    	$this->load->view('login/loginadmin');
    }

	public function aksi_login()
    {
    	//$this->simple_login->cek_login();
        //echo $this->input->post('login');
    	$post = $this->input->post(null, TRUE);
    	if (isset($_POST['login'])) {
    		$this->load->model('Login_admin_M');
    		$query = $this->Login_admin_M->Login($post);
    		if ($query->num_rows() > 0) {
    			$row = $query->row();
    			$params = array(
    				'username' => $row->username
    			);
    			$this->session->set_userdata($params);
                redirect('admin/das_admin');
                redirect('admin/template/header');
                redirect('admin/template/sidebar');
    		}else{
    			echo "<script>window.location='".base_url('utama/login_admin')."'</script>";
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