<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Anggota extends CI_Controller {
// tampilan halaman
		public function __construct() {
				parent::__construct();
				$this->load->model('Data_anggota');
		}

		public function das_anggota()
		{
			$username = $this-> session->userdata('username');
			// $username = $this-> session->userdata('username');
			// echo "username".$username;
			$data= array('id_anggota' => $username);
			$data['riwayat']=$this->Data_anggota->tampil("vpeminjaman",$data)->result();
			$this->load->view('anggota/das_anggota',$data);
			$this->load->view('anggota/template2/header');
			$this->load->view('anggota/template2/sidebar');
		}
		public function data_diri()
		{
			$username = $this-> session->userdata('username');
			$dataedit = array('id_anggota'=>$username);
			// echo "Data edit".$dataedit;
			$data['anggota']=$this->Data_admin->view("tbanggota",$dataedit)->result();
			$data['kelas']=$this->Data_admin->tampil('tbkelas');

			$this->load->view('anggota/data_diri',$data);
			$this->load->view('anggota/template2/header');
			$this->load->view('anggota/template2/sidebar');
		}	
	    public function search(){
			$tabel = $this->input->post('tabel');
			$keyword = $this->input->post('keyword');
			// echo "keyword 2 ".$keyword;

			if ($tabel==='vpeminjaman') {
				$data['riwayat']=$this->Data_anggota->search($tabel,$keyword);
				$this->load->view('anggota/das_anggota',$data);
			}
			$this->load->view('anggota/template2/header');
			$this->load->view('anggota/template2/sidebar');

		}	


		public function edit_anggota()
		{
			$jeniskelamin = $this->input->post('jeniskelamin');
			$jenisanggota = $this->input->post('jenisanggota');
			if($jeniskelamin ==='Perempuan') {
				$JK='P';
			}else{
				$JK='L';
			};

			if ($jenisanggota==='Guru') {
				$kls = '-';
			}
			else {
				$kls = $kelas;
			}

			$dataedit = array(			
				'Nama' =>$this->input->post('nama'),
				'Alamat' =>$this->input->post('alamat'),
				'JK' =>$JK,
				'jenis_anggota' => $jenisanggota,
				'kd_kelas' =>$kls
			);
			$id = array(
				'id_anggota'=>$this->input->post('id')
			);
			$this->Data_admin->update("tbanggota",$dataedit,$id);
			$this-> session ->set_flashdata('message','<div class="alert alert-success" role="alert">
  			Data berhasil berhasil diupdate!</div>');
			redirect('anggota/data_diri');
		}

		public function ganti_password(){
			$username = $this-> session->userdata('username');
			$pass_now = $this->input->post('pass_now');
			$pass_baru = $this->input->post('pass_baru');



			if ($pass_now==""||$pass_baru=="") {
				$this-> session ->set_flashdata('message','<div class="alert alert-danger" role="alert">
		  		Ganti password gagal, password ada yang kosong!</div>');
				redirect('Anggota/data_diri');
			}else{
				$uppercase = preg_match('@[A-Z]@',$pass_baru);
	       		$number = preg_match('@[0-9]@',$pass_baru);

				

				$data = array(
					'password'=>$pass_now,
					'username'=>$username
				);

				$cek=$this->Data_admin->cek_password('tbakunanggota',$data);
				
				if ($cek) {
					if(strlen($pass_baru)<6||!$uppercase||!$number){
						$this-> session ->set_flashdata('message','<div class="alert alert-danger" role="alert">Password baru minimal 6 karakter, mengandung huruf kapital dan angka!</div>');
						redirect('Anggota/data_diri');
					}else{
						$dataedit = array(			
							'password' =>$pass_baru
						);
						$id = array(
							'username'=>$username
						);
						$ganti = $this->Data_admin->update("tbakunanggota",$dataedit,$id);
						$this-> session ->set_flashdata('message','<div class="alert alert-success" role="alert">
			  			Password Berhasil Diganti!</div>');
						redirect('Anggota/data_diri');
					}
				}else{
					$this-> session ->set_flashdata('message','<div class="alert alert-danger" role="alert">
		  			Password saat ini salah!</div>');
		  			redirect('Anggota/data_diri');
				}
			}

		}

	}
?>