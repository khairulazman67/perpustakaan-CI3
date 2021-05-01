<?php  
class Data_admin extends CI_Model{

// tampil
    public function tampil($tabel){
        return $this->db->get($tabel)->result();
    }
// update
    public function update($tabel,$data,$id){
        $this->db->where($id);
        $this->db->update($tabel,$data);
    }
// input
    public function input($tabel,$data){
        $this->db->insert($tabel,$data);
    }

// admin
	public function input_admin($tabel,$data,$tabelakun,$dataakun){
		$this->db->insert($tabel,$data);
		$this->db->insert($tabelakun,$dataakun);
	}
// view tabel dan data tertentu
    public function view($tabel,$data){
        return $this->db->get_where($tabel,$data);
    }
// cek password
    public function cek_password($tabel,$data){
        $this->db->from($tabel);
        $this->db->where($data);
        $query = $this->db->get();
        return $query->row_array();

    }
// cek data di field
    public function cekdata($tabel,$field, $data)
    {
        return $this->db->get_where($tabel,[$field => $data])->row_array();
    }  

// Ambil data satu data
    public function ambildata($tabel,$field,$field2,$data)
    {
        $this->db->select($field);
        $this->db->from($tabel);
        $this->db->where($field2,$data);
        $query = $this->db->get();
        $result= $query->row();

        if (isset($result))
        {
            return $result->$field;//write your column name
        }
        else
        {
            return 1;
        }
    }   

// cek peminjaman buku sebelumnya
    public function cekpinjambuku($tabel,$id_anggota,$id_anggota2,$id_koleksi,$id_koleksi2)
    {
        $this->db->select('*');
        $this->db->from($tabel);
        $this->db->where($id_anggota,$id_anggota2);
        $this->db->where($id_koleksi,$id_koleksi2);

        $query = $this->db->get();
        
        foreach ($query->result() as $row)
        {
            $data =  $row->tgl_pengembalian;
            if ($data) {
                return $data;
            }else{
                return 1;
            }
        }


    }    


    public function deleteadmin($tabel,$tabelakun,$field,$idadmin){
    	$this->db->where($field,$idadmin);
		$this->db->delete($tabelakun);

    	$this->db->where($field,$idadmin);
		$this->db->delete($tabel);


    	// $this->db->delete($tabel,$idadmin);
    }



// Anggota   
    
    public function input_anggota($tabel,$data,$tabelakun,$dataakun){
        $this->db->insert($tabel,$data);
        $this->db->insert($tabelakun,$dataakun);
    }
    
    public function deleteanggota($tabel,$tabelakun,$field,$idadmin){
        $this->db->where($field,$idadmin);
        $this->db->delete($tabelakun);

        $this->db->where($field,$idadmin);
        $this->db->delete($tabel);


        // $this->db->delete($tabel,$idadmin);
    }


// cek id
    public function cekid($field, $as, $tabel)
    {
        $query = $this->db->query("SELECT MAX($field) as $as from $tabel");
        $hasil = $query->row();
        return $hasil->id;
    }

// search
    public function search($tabel,$data){
        if ($data=='laki-laki') {
            $key = 'L';
        }elseif ($data=='perempuan') {
            $key = 'P';
        }else{
            $key=$data;
        }
        if ($tabel==='tbadmin') {        
            $this->db->select('*');
            $this->db->from($tabel);
            $this->db->like('idAdmin',$key);
            $this->db->or_like('Nama',$key);
            $this->db->or_like('Alamat',$key);
            $this->db->or_like('JK',$key);
            return $this->db->get()->result();
        }
        elseif ($tabel==='vanggota') {
            $this->db->select('*');
            $this->db->from($tabel);
            $this->db->like('id_anggota',$key);
            $this->db->or_like('Nama',$key);
            $this->db->or_like('Alamat',$key);
            $this->db->or_like('jenis_anggota',$key);
            $this->db->or_like('nm_kelas',$key);  
            return $this->db->get()->result(); 

        }elseif ($tabel==='vkoleksi') {
            $this->db->select('*');
            $this->db->from($tabel);
            $this->db->like('id_genre',$key);
            $this->db->or_like('id_koleksi',$key);
            $this->db->or_like('nm_buku',$key);
            $this->db->or_like('id_penerbit',$key);
            $this->db->or_like('nm_pengarang',$key);
            $this->db->or_like('thn_terbit',$key);
            $this->db->or_like('genre',$key);
            $this->db->or_like('jenis_koleksi',$key);
            $this->db->or_like('total_stok',$key);
            $this->db->or_like('sisa_stok',$key);  
            return $this->db->get()->result(); 
        }
        elseif ($tabel==='vpeminjaman') {
            $this->db->select('*');
            $this->db->from($tabel);
            $this->db->like('id_peminjaman',$key);
            $this->db->or_like('Nama',$key);
            $this->db->or_like('nm_buku',$key);
            $this->db->or_like('tgl_peminjaman',$key);
            $this->db->or_like('tgl_harusdikembalikan',$key);
            $this->db->or_like('foto',$key);
            $this->db->or_like('tgl_pengembalian',$key);
            $this->db->or_like('keterlambatan',$key);
            return $this->db->get()->result(); 

        }
        
    }
// buku

    
    public function deletebuku($tabel,$field,$id){
        $this->db->where($field,$id);
        $this->db->delete($tabel);

    }

// peminjaman
    public function input_peminjaman($tabel,$data){
        $this->db->insert($tabel,$data);

    }

}

?>