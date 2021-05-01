<?php
// Proteksi halaman
//$this->simple_login->logout();
//echo base_url('Logout');
$this->session->sess_destroy();
redirect(base_url('utama'));
?>