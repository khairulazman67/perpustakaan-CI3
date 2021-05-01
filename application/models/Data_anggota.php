<?php    
class Data_anggota extends CI_Model{
// class Data_anggota extends CI_Model{

	public function tampil($tabel,$data){
  		return $this->db->get_where($tabel,$data);
    }
    
    public function search($tabel,$data){
        if ($data=='laki-laki') {
            $key = 'L';
        }elseif ($data=='perempuan') {
            $key = 'P';
        }else{
            $key=$data;
        }
        if ($tabel==='vpeminjaman') {
        	// echo $key;
            $this->db->select('*');
            $this->db->from($tabel);
            $this->db->like('id_anggota','AGT01');
            $this->db->or_like('id_peminjaman',$key);
            $this->db->or_like('Nama',$key);
            $this->db->or_like('nm_buku',$key);
            // $this->db->or_like('tgl_peminjaman',$key);
            $this->db->or_like('tgl_harusdikembalikan',$key);
            $this->db->or_like('foto',$key);
            $this->db->or_like('tgl_pengembalian',$key);
            $this->db->or_like('keterlambatan',$key);
            
            return $this->db->get()->result(); 

        }
        
    }

}
?>