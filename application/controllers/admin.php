<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin extends CI_Controller {
// tampilan halaman

		public function das_admin()
		{
			$data['buku']=$this->Data_admin->tampil("vkoleksi");
			
			$this->load->view('admin/das_admin',$data);
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidebar');
		}

		public function data_admin()
		{
			// $this->load->model('Data_admin');
			$username = $this-> session->userdata('username');
			$dataedit = array('idAdmin'=>$username);
			// echo "Data edit".$dataedit;
			$data['admin']=$this->Data_admin->view("tbadmin",$dataedit)->result();
			// $data['admin']=$this->Data_admin->tampil('tbadmin');
			$this->load->view('admin/data_admin',$data);
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidebar');	
		}

		public function data_anggota()
		{
			$data['kelas']=$this->Data_admin->tampil('tbkelas');
			$data['anggota']=$this->Data_admin->tampil('vanggota');
			$this->load->view('admin/data_anggota',$data);
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidebar');	
		}
		public function data_buku()
		{
			$data['koleksi']=$this->Data_admin->tampil('vkoleksi');
			$data['genre']=$this->Data_admin->tampil('tbgenre');
			$data['penerbit']=$this->Data_admin->tampil('tbpenerbit');
			$this->load->view('admin/data_buku',$data);
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidebar');	
		}	
		public function data_peminjaman()
		{

			$data['peminjaman']=$this->Data_admin->tampil('vpeminjaman');
			$this->load->view('admin/data_peminjaman',$data);
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidebar');	
		}
		public function peminjaman()
		{
			$this->load->view('admin/peminjaman');
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidebar');	
		}
		public function pengembalian()
		{
			$this->load->view('admin/pengembalian');
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidebar');	
		}

// data admin

		public function tes()
		{
			// $this->load->view('admin/tes');
			$ID = $this->input->post('idadmin');
		
		}

		public function tambah_admin()
		{
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$jeniskelamin = $this->input->post('jeniskelamin');
			if ($nama =="" or $alamat =="" or $jeniskelamin=="") {
				$this-> session ->set_flashdata('message','<div class="alert alert-danger" role="alert">
  				Periksa kembali, data tidak boleh kosong!</div>');
				redirect('admin/data_admin');
			}
			else{
				if($jeniskelamin ==='Perempuan') {
					$JK="P";
				}else{
					$JK="L";
				}
				#id admin
					$dariDB = $this->Data_admin->cekid('idAdmin', 'id', 'tbadmin');
			        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 2 jumlah angka yang diambil
			        $nourut = substr($dariDB, 3, 2);
			        $idAdminSekarang = $nourut + 1;
			        $char = "ADN";
					$idAdmin = $char . sprintf("%02s",$idAdminSekarang);
				
				$data_admin = array(
					'idAdmin'=>$idAdmin,
					'Nama' =>$nama,
					'Alamat' =>$alamat,
					'JK' =>$JK
				);
				$data_akun = array(
					'username'=>$idAdmin,
					'password'=>$idAdmin,
					'jabatan'=>'Admin',
					'idAdmin'=>$idAdmin
				);	

				$input = $this->Data_admin->input_admin('tbadmin',$data_admin,'tbakunadmin',$data_akun);
				$this-> session ->set_flashdata('message','<div class="alert alert-success" role="alert">
	  			Data admin berhasil ditambahkan!</div>');
				redirect('admin/data_admin');
			}
		}
		public function hapus_admin(){

			$ID = $this->input->post('idadmin');
			$hapus = $this->Data_admin->deleteadmin("tbadmin","tbakunadmin","idAdmin",$ID);
			$this-> session ->set_flashdata('message','<div class="alert alert-success" role="alert">
  			Data admin berhasil dihapus!</div>');
			redirect('admin/data_admin');
			
		}
		public function view_edit_admin()
		{
			$this-> session -> set_userdata('id',$this->input->post('id'));
			$dataedit = array('idAdmin'=>$this->session->userdata('id'));
			$data['admin']=$this->Data_admin->view("tbadmin",$dataedit)->result();
			
			$this->load->view('admin/edit_admin',$data);
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidebar');	
		}

		public function edit_admin()
		{
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$jeniskelamin = $this->input->post('jeniskelamin');
			if ($nama =="" or $alamat =="" or $jeniskelamin=="") {
				$this-> session ->set_flashdata('message','<div class="alert alert-danger" role="alert">
  				Periksa kembali, data tidak boleh kosong!</div>');
				redirect('admin/view_edit_admin');
			}
			else{
				if($jeniskelamin ==='Perempuan') {
					$JK='P';
				}else{
					$JK='L';
				}

				$dataedit = array(			
					'Nama'=>$this->input->post('nama'),
					'Alamat'=>$this->input->post('alamat'),
					'JK'=>$JK
				);
				$id = array(
					'idAdmin'=>$this->input->post('id')
				);
				$this->Data_admin->update("tbadmin",$dataedit,$id);
				$this-> session ->set_flashdata('message','<div class="alert alert-success" role="alert">
	  			Data admin berhasil diedit!</div>');
				redirect('admin/data_admin');
			}
		}

		public function search(){
			$tabel = $this->input->post('tabel');
			$keyword = $this->input->post('keyword');

			if ($tabel==='tbadmin') {
				$data['admin']=$this->Data_admin->search($tabel,$keyword);
				$this->load->view('admin/data_admin',$data);	
			}elseif ($tabel==='vanggota') {
				$data['anggota']=$this->Data_admin->search($tabel,$keyword);
				$this->load->view('admin/data_anggota',$data);
			
			}elseif ($tabel==='vkoleksi') {
				$data['koleksi']=$this->Data_admin->search($tabel,$keyword);
				$this->load->view('admin/data_buku',$data);
			}
			elseif ($tabel==='vpeminjaman') {
				$data['peminjaman']=$this->Data_admin->search($tabel,$keyword);
				$this->load->view('admin/data_peminjaman',$data);
			}
			elseif ($tabel==='vkoleksi2') {
				$data['buku']=$this->Data_admin->search('vkoleksi',$keyword);

				$this->load->view('admin/detail_buku',$data);
			}
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidebar');

		}
		public function ganti_password(){
			$username = $this-> session->userdata('username');
			$pass_now = $this->input->post('pass_now');
			$pass_baru = $this->input->post('pass_baru');



			if ($pass_now==""||$pass_baru=="") {
				$this-> session ->set_flashdata('message','<div class="alert alert-danger" role="alert">
		  		Ganti password gagal, password ada yang kosong!</div>');
				redirect('admin/data_admin');
			}else{
				$uppercase = preg_match('@[A-Z]@',$pass_baru);
	       		$number = preg_match('@[0-9]@',$pass_baru);

				

				$data = array(
					'password'=>$pass_now,
					'username'=>$username
				);

				$cek=$this->Data_admin->cek_password('tbakunadmin',$data);
				
				if ($cek) {
					if(strlen($pass_baru)<6||!$uppercase||!$number){
						$this-> session ->set_flashdata('message','<div class="alert alert-danger" role="alert">Password baru minimal 6 karakter, mengandung huruf kapital dan angka!</div>');
						redirect('admin/data_admin');
					}else{
						$dataedit = array(			
							'password' =>$pass_baru
						);
						$id = array(
							'username'=>$username
						);
						$ganti = $this->Data_admin->update("tbakunadmin",$dataedit,$id);
						$this-> session ->set_flashdata('message','<div class="alert alert-success" role="alert">
			  			Password Berhasil Diganti!</div>');
						redirect('admin/data_admin');
					}
				}else{
					$this-> session ->set_flashdata('message','<div class="alert alert-danger" role="alert">
		  			Password saat ini salah!</div>');
		  			redirect('admin/data_admin');
				}
			}

		}

// Data Anggota

		public function tambah_anggota()
		{
			$jeniskelamin = $this->input->post('jeniskelamin');
			$jenisanggota = $this->input->post('jenisanggota');
			$kelas = $this->input->post('kelas');
			if($jeniskelamin ==='Perempuan') {
				$JK="P";
			}else{
				$JK="L";
			}
			#id anggota
				$dariDB = $this->Data_admin->cekid('id_anggota','id','tbanggota');
		        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 2 jumlah angka yang diambil
		        $nourut = substr($dariDB, 3, 2);
		        $idAnggotaSekarang = $nourut + 1;
		        $char = "AGT";
				$idAnggota = $char . sprintf("%02s",$idAnggotaSekarang);

			if ($jenisanggota==='Guru') {
				$kls = '-';
				echo "<script> alert('Hallo aku guru');</script>";
			}
			else {
				$kls = $kelas;
			}

			$data_anggota = array(
				'id_anggota'=>$idAnggota,
				'Nama' =>$this->input->post('nama'),
				'Alamat' =>$this->input->post('alamat'),
				'JK' =>$JK,
				'jenis_anggota' => $jenisanggota,
				'kd_kelas' =>$kls
			);

			$data_akun = array(
				'username'=>$idAnggota,
				'password'=>$idAnggota,
				'id_anggota'=>$idAnggota
			);	

			$input = $this->Data_admin->input_anggota('tbanggota',$data_anggota,'tbakunanggota',$data_akun);
			$this-> session ->set_flashdata('message','<div class="alert alert-success" role="alert">
  			Data anggota berhasil ditambahkan!</div>');
			redirect('admin/data_anggota');
			
		}
		public function hapus_anggota(){
			$ID = $this->input->post('idadmin');
			$hapus = $this->Data_admin->deleteanggota("tbanggota","tbakunanggota","id_anggota",$ID);
			$this-> session ->set_flashdata('message','<div class="alert alert-success" role="alert">
  			Data anggota berhasil dihapus!</div>');
			redirect('admin/data_anggota');
			

		}
		public function view_edit_anggota()
		{
			$dataedit = array('id_anggota'=>$this->input->post('id'));
			$data['anggota']=$this->Data_admin->view("tbanggota",$dataedit)->result();
			$data['kelas']=$this->Data_admin->tampil('tbkelas');
			$this->load->view('admin/edit_anggota',$data);
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidebar');	
		}
		public function edit_anggota()
		{
			$jeniskelamin = $this->input->post('jeniskelamin');
			$jenisanggota = $this->input->post('jenisanggota');
			$kelas = $this->input->post('kelas');
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
			redirect('admin/data_anggota');
		}

// data buku
		public function tambah_buku()
		{
			#id buku
				$dariDB = $this->Data_admin->cekid('id_koleksi','id','tbkoleksi');
		        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 2 jumlah angka yang diambil
		        $nourut = substr($dariDB, 1, 4);
		        $idBukuSekarang = $nourut + 1;
		        $char = "K";
				$idBuku = $char . sprintf("%04s",$idBukuSekarang);
			
				$foto 	= @$_FILES['foto'];
				if ($foto=''){} 
				else{
					$config['upload_path']		= './assets/foto';
					$config['allowed_types']	= 'jpg|png|jpeg';
					$config['max_size']			= 500;
					$config['file_name']		= 'foto-'.date('ymd').'-'.substr(md5(rand()),0,10);
					
					$this->load->library('upload',$config);
					if(!$this->upload->do_upload('foto')){
						// $this->upload->display_error();
						$this-> session ->set_flashdata('message','<div class="alert alert-danger" role="alert">Batas max ukuran foto 500kb!</div>');
						redirect('admin/data_buku');
						echo "Upload Gagal";die();
					}else{
						$foto = $this->upload->data('file_name');
					}
				}
			$data_buku = array(
				'id_koleksi'=>$idBuku,
				'nm_buku' =>$this->input->post('nama'),
				'id_penerbit' =>$this->input->post('penerbit'),
				'nm_pengarang' =>$this->input->post('pengarang'),
				'thn_terbit' => $this->input->post('tahun'),
				'id_genre' => $this->input->post('genre'),
				'jenis_koleksi' => 'Buku Offline',
				'total_stok' => $this->input->post('stok'),
				'sisa_stok' => $this->input->post('stok'),
				'foto' => $foto
			);


			$input = $this->Data_admin->input('tbkoleksi',$data_buku);
			$this-> session ->set_flashdata('message','<div class="alert alert-success" role="alert">
  			Data buku berhasil ditambahkan!</div>');
			redirect('admin/data_buku');

		}
		public function hapus_buku(){
			$ID = $this->input->post('idbuku');
			$hapus = $this->Data_admin->deletebuku("tbkoleksi","id_koleksi",$ID);
			$this-> session ->set_flashdata('message','<div class="alert alert-success" role="alert">
  			Data buku berhasil dihapus!</div>');
			redirect('admin/data_buku');
		}		

		public function view_edit_buku()
		{
			$dataedit = array('id_anggota'=>$this->input->post('id'));
			$data['anggota']=$this->Data_admin->view("tbanggota",$dataedit)->result();
			$data['kelas']=$this->Data_admin->tampil('vkoleksi');
			$this->load->view('admin/edit_anggota',$data);
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidebar');	
		}
		public function edit_buku()
		{
			$foto 	= @$_FILES['foto'];
			if ($foto=''){} 
			else{
				$config['upload_path']		= './assets/foto';
				$config['allowed_types']	= 'jpg|png|jpeg';
				$config['max_size']			= 500;
				$config['file_name']		= 'foto-'.date('ymd').'-'.substr(md5(rand()),0,10);
				
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('foto')){
					echo "Upload Gagal";die();
				}else{
					$foto = $this->upload->data('file_name');
				}
			}
			$data_buku = array(
				'nm_buku' =>$this->input->post('judul'),
				'id_penerbit' =>$this->input->post('penerbit'),
				'nm_pengarang' =>$this->input->post('pengarang'),
				'thn_terbit' => $this->input->post('tahun'),
				'id_genre' => $this->input->post('genre'),
				'jenis_koleksi' => $this->input->post('jeniskoleksi'),
				'total_stok' => $this->input->post('totalstok'),
				'sisa_stok' => $this->input->post('sisastok'),
				'foto' => $foto
			);
			$id = array(
				'id_koleksi'=>$this->input->post('id')
			);
			$this->Data_admin->update("tbkoleksi",$data_buku,$id);
			$this-> session ->set_flashdata('message','<div class="alert alert-success" role="alert">
  			Data buku berhasil diedit!</div>');
			redirect('admin/data_buku');
		}
		public function view_detail_buku()
		{
			$dataedit = array('id_koleksi'=>$this->input->post('id'));
			$data['buku']=$this->Data_admin->view("vkoleksi",$dataedit)->result();

			$this->load->view('admin/detail_buku',$data);
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidebar');	
		}
// peminjaman
		public function detail_peminjaman()
		{
			$idbuku = $this->input->post('id_buku');
			$idanggota = $this->input->post('id_anggota');
			if ($idbuku=="" || $idanggota=="") {
				$this-> session ->set_flashdata('message','<div class="alert alert-danger" role="alert">
	  				Id buku dan Id anggota tidak boleh kosong!</div>');
				$this->load->view('admin/peminjaman');
				$this->load->view('admin/template/header');
				$this->load->view('admin/template/sidebar');
			}else{
				$anggotadb = $this->Data_admin->cekdata("tbanggota","id_anggota",$idanggota);
				if ($anggotadb){
					$databuku = $this->Data_admin->cekdata("tbkoleksi","id_koleksi",$idbuku);	
					if ($databuku) {	

// mengecek apakah buku pernah dipinjam atau belum
						$cekbukupeminjaman = $this->Data_admin->cekpinjambuku("vbelummengembalikan","id_anggota",$idanggota,'id_koleksi',$idbuku);	

						if ($cekbukupeminjaman) {
							$this-> session ->set_flashdata('message','<div class="alert alert-danger" role="alert">User belum mengembalikan buku ini!</div>');
							$this->load->view('admin/peminjaman');
							$this->load->view('admin/template/header');
							$this->load->view('admin/template/sidebar');
						}elseif($cekbukupeminjaman=	1){
							$data['buku']=$this->Data_admin->view("vkoleksi",$databuku)->result();
							
							$this-> session ->set_flashdata('idbuku',$idbuku);
							$this-> session ->set_flashdata('idanggota',$idanggota);

							$this->load->view('admin/detail_peminjaman',$data);
							$this->load->view('admin/template/header');
							$this->load->view('admin/template/sidebar');	
						}
					}else{
						$this-> session ->set_flashdata('message','<div class="alert alert-danger" role="alert">
		  				Buku tidak tersedia!</div>');
						$this->load->view('admin/peminjaman');
						$this->load->view('admin/template/header');
						$this->load->view('admin/template/sidebar');
					}
				}
				else{
					$this-> session ->set_flashdata('message','<div class="alert alert-danger" role="alert">
		  				Peminjam belum terdaftar, cek kembali id anggota peminjam!</div>');
					$this->load->view('admin/peminjaman');
					$this->load->view('admin/template/header');
					$this->load->view('admin/template/sidebar');
				}
			}
		}
		public function pinjam_buku(){
			$idbuku = $this-> session ->flashdata('idbuku');
			$idanggota = $this-> session ->flashdata('idanggota');
			
			#id peminjaman
				$dariDB = $this->Data_admin->cekid('id_peminjaman','id','tbpeminjaman');
		        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 2 jumlah angka yang diambil
		        $nourut = substr($dariDB, 1, 9);
		        $idPeminjamanSekarang = $nourut + 1;
		        $char = "P";
				$idPeminjaman = $char . sprintf("%09s",$idPeminjamanSekarang);

			// Waktu
				$tgl_peminjaman = date('Y-m-d');
				$tgl_pengembalian = date('Y-m-d', strtotime('+6 days', strtotime($tgl_peminjaman)));
				$data_peminjaman = array(
					'id_peminjaman'=>$idPeminjaman,
					'id_anggota' =>$idanggota,
					'id_koleksi' =>$idbuku,
					'tgl_peminjaman' =>$tgl_peminjaman,
					'tgl_harusdikembalikan' => $tgl_pengembalian
				);
			// sisa stok 
				$sisastok = $this->Data_admin->ambildata("tbkoleksi","sisa_stok","id_koleksi",$idbuku);	
				if ($sisastok<=0) {
					$this-> session ->set_flashdata('message','<div class="alert alert-danger" role="alert">
		  			Stok buku kosong!</div>');
					$this->load->view('admin/peminjaman');
					$this->load->view('admin/template/header');
					$this->load->view('admin/template/sidebar');

				}else{
					$input = $this->Data_admin->input('tbpeminjaman',$data_peminjaman);
					$stok = $sisastok-1;
					$data = array('sisa_stok'=>$stok);
					$idbuku = array('id_koleksi'=>$idbuku);
					$update = $this->Data_admin->update('tbkoleksi',$data,$idbuku);

					// echo "Sisa stok = ".$sisastok;
					$this-> session ->set_flashdata('message','<div class="alert alert-success" role="alert">
				  				Peminjam buku berhasil dilakukan!</div>');
					$this->load->view('admin/peminjaman');
					$this->load->view('admin/template/header');
					$this->load->view('admin/template/sidebar');
				}
		}

// peminjaman
		public function detail_pengembalian()
		{
			$idpeminjaman = $this->input->post('id_peminjaman');
			// $idpeminjaman =$this-> session ->set_flashdata('idpeminjaman',$post);

			if($idpeminjaman){
				$buku = $this->Data_admin->cekdata('tbpeminjaman','id_peminjaman',$idpeminjaman);
				if ($buku) {

// mengecek apakah buku pernah dipinjam atau belum
						$cekbukupengembalian = $this->Data_admin->ambildata("vpeminjaman","tgl_pengembalian",'id_peminjaman',$idpeminjaman);	

						if ($cekbukupengembalian) {
							$this-> session ->set_flashdata('message','<div class="alert alert-danger" role="alert">Buku ini sudah dikembalikan!</div>');
							$this->load->view('admin/pengembalian');
							$this->load->view('admin/template/header');
							$this->load->view('admin/template/sidebar');

						}elseif($cekbukupeminjaman='null'){
							$this -> session->set_flashdata('idpeminjaman',$idpeminjaman);
							$datadb = array('id_peminjaman'=>$this-> session ->flashdata('idpeminjaman'));
							$data['buku'] = $this->Data_admin->view("vpeminjaman",$datadb)->result();

							$this->load->view('admin/detail_pengembalian',$data);
							$this->load->view('admin/template/header');
							$this->load->view('admin/template/sidebar');	
						}

	
						
				}else{
					$this-> session ->set_flashdata('message','<div class="alert alert-danger" role="alert">
  					Cek kembali id peminjaman</div>');	
					$this->load->view('admin/pengembalian');
					$this->load->view('admin/template/header');
					$this->load->view('admin/template/sidebar');
				}
			}else{
				$this-> session ->set_flashdata('message','<div class="alert alert-danger" role="alert">
  				Isi terlebih dahulu id peminjaman!</div>');	
				$this->load->view('admin/pengembalian');
				$this->load->view('admin/template/header');
				$this->load->view('admin/template/sidebar');

			}
		}
		public function pengembalian_buku(){

			$idpeminjaman = array(
				'id_peminjaman'=>$this-> session -> flashdata('idpeminjaman')
			);

			// sisa stok

				$idbuku = $this->Data_admin->ambildata("tbpeminjaman","id_koleksi","id_peminjaman",$this-> session -> flashdata('idpeminjaman'));

				$sisastok = $this->Data_admin->ambildata("tbkoleksi","sisa_stok","id_koleksi",$idbuku);	
				$stok = $sisastok+1;

				$data = array('tgl_pengembalian'=>date('Y-m-d'));
				$this->Data_admin->update("tbpeminjaman",$data,$idpeminjaman);
						
				$idbuku2 = array(
					'id_koleksi'=>$idbuku
				);
				$datastok = array('sisa_stok'=>$stok);
				$this->Data_admin->update("tbkoleksi",$datastok,$idbuku2);

				$this-> session ->set_flashdata('message','<div class="alert alert-success" role="alert">
					Buku berhasil dikembalikan!</div>');	
				$this->load->view('admin/pengembalian');
				$this->load->view('admin/template/header');
				$this->load->view('admin/template/sidebar');
		}
			
	
	}
?>