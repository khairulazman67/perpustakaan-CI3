<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Utama extends CI_Controller {
		public function dashboard()
		{
			$this->load->view('dashboard');
		}
		public function koleksi_buku()
		{
			$data['buku']=$this->Data_admin->tampil("vkoleksi");
			$this->load->view('koleksi_buku',$data);
		}
		public function login_admin(){
			$this->load->view('login/loginadmin');
			
		}
		public function login_anggota(){
			$this->load->view('login/loginanggota');
		}
		public function profil_sekolah(){
			$this->load->view('profil_sekolah');
		}
		public function search(){
			$tabel = $this->input->post('tabel');
			$keyword = $this->input->post('keyword');

			$data['buku']=$this->Data_admin->search($tabel,$keyword);
			$this->load->view('detail_buku',$data);
		
		}
	}
?>