<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Tes extends CI_Controller {
		// admin
		public function index()
		{
			// $this->load->model('Data_admin');
			$data['admin']=$this->Data_admin->tampil_admin()->result();
			$this->load->view('admin/data_admin',$data);
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidebar');	
		}
	}
?>