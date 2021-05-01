<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.css">
    <script type="text/javascript" src="<?php echo base_url()?>assets/bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/fontawesome/css/all.min.css">
    <title>Home</title>
  </head>
  <body style="background-color: #FAFAFA">
    <div class="jumbotron jumbotron-fluid bg-dark text-white py-2 my-1">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <img src="<?php echo base_url()?>assets/img/header.png" width="80%">
          </div>
        </div>
        
      </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
              <a class="nav-link" href="dashboard">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="profil_sekolah">Profil Sekolah<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="koleksi_buku">Koleksi Buku<span class="sr-only">(current)</span></a>
            </li>
          </ul>

          <form class="form-inline my-2 my-lg-0 mr-2" method="post" action="<?= base_url('utama/search') ?>">
            <input type="hidden" name="tabel" value="vkoleksi">
            <input class="form-control mr-sm-2" type="text" name="keyword"  placeholder="Cari Buku">
            <button class="btn btn-warning" type="submit">Search</button>
          </form>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#login">
            Login
          </button>

          <!-- Modal -->
          <div class="modal fade my-5" id="login" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content ">
                <div class="modal-header"></div>
                <div class="modal-body text-center">
                  <div class="row justify-content-center">
                    <div class="col-md-4 ">
                      <h1><i class="fas fa-users-cog"></i></h1>
                      <h1><a href="login_admin"><button class="btn btn-primary" type="submit">Sebagai Admin</button></a></h1>
                    </div>
                    <div class="col-md-5">
                      <h1><i class="fas fa-users"></i></h1>
                      <h1><a href="login_anggota"><button class="btn btn-success" type="submit">Sebagai Anggota</button></a></h1>
                    </div>
                  </div>
                </div>
                <div class="modal-footer"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <br>
  
<div class="row">
  <div class="col-sm-6">
  <div class="card">
    <div class="card-header bg-primary text-white">
   <B>Foto SMAN 1 Lhokseumawe</B>
  </div>
  <div class="card-body">
     <img src="<?php echo base_url(); ?>assets/img/img2.jpg" width="265" height="240">&nbsp
      <img src="<?php echo base_url(); ?>assets/img/img1.jpg" width="265" height="240">
  </div>
</div>
</div>

  <div class="col-sm-6">
    <div class="card">
  <div class="card-header bg-primary text-white">
   <B>Identitas SMAN 1 Lhokseumawe</B>
  </div>
  <div class="card-body">
    <ul>
        <b>Alamat : </b>Jl. Darussalam, Kp. Jawa Lama, Banda Sakti, Kota Lhokseumawe, Aceh<br>
        <b>NPSN   : </b> 10105619<br>
        <b>Status : </b> NEGERI <br>
        <b>Akreditasi : </b> A<br>
        <b>No. SK. Akreditasi   :</b>746/BAN-SM/SK/2019<br>
        <b>Tanggal SK. Akreditasi   :</b>09-09-2019<br>
        <b>Bentuk Pendidikan :</b> SMA<br>
        <b>Status Kepemilikan :</b> Kementerian Pendidikan dan Kebudayaan<br>
        <b>SK Pendirian Sekolah : </b>20/SK/B.III<br>
        <b>Tanggal SK Izin Operasional :</b> 1957-09-01 <br>
        <b>Tanggal SK Pendirian : </b> -<br>
        <b>Luas Tanah Milik :</b> 16.172 meter persegi<br> 
        <b>SK Izin Operasional :</b> 27/SK/B.III </br>
        </ul>
  </div>
</div>
</div>
</br>

<div class="col-sm-6">
  <div class="card">
    <div class="card-header bg-primary text-white">
   <B>MISI SMAN 1 Lhokseumawe</B>
  </div>
  <div class="card-body">
     <ul align="justify">
              1. Meningkatkan Mutu Profesional Guru dan Karyawan.
              </br>2. Meningkatkan kedisiplinan guru, karyawan dan siswa.
              </br>3. Melengkapi dan merehabilitasi sarana / prasarana yang menunjang kegiatan belajar-mengajar.
              </br>4. Melaksanakan pembelajaran dan bimbingan secara efektif sehingga setiap anak berkembang secara optimal menurut potensi yang di miliki.
              </br>5. Menciptakan suasana belajar yang menyenangkan dan kondusif.
              </br>6. Mengupayakan pemenuhan SNP.
              </br>7. Meningkatkan daya serap pelajaran untuk siswa.
              </br>8. Meningkatkan perolehan Nilai UAN rata – rata 0,5 pertahun.
              </br>9. Meningkatkan dan mengembangkan kegiatan ekstra kurikuler dan keagamaan.
              </br>10. Meningkatkan kerjasama dengan masyarakat melalui komite sekolah serta instasi dan lembaga terkait.
              </br>11. Meningkatkan kesejahteraan Guru dan Karyawan.
            </ul> 
  </div>
</div>
</div>

  <div class="col-sm-6">
    <div class="card">
  <div class="card-header bg-primary text-white">
   <B>VISI SMAN 1 Lhokseumawe</B>
  </div>
  <div class="card-body">
     <ul align="justify">
                Mewujudkan Lulusan yang Unggul dalam Kualitas, Tangkas dalam Pengabdian, menguasai Ilmu Pengetahuan dan Teknologi dengan dilandasi  Iman dan Taqwa.</br>
                Indikator Visi:<br>
                </br>1. Meningkatnya Nilai rata – rata UN lulusan dari tahun ketahun.
                </br>2. Berhasilnya siswa – siswa bersaing dalam berbagai perlombaan baik tingkat Kota, Provinsi, Nasional maupun Internasional.
                </br>3. Terpeliharanya kenyamanan dan stabilitas sekolah.
                </br>4. Terselenggaranya kegiatan keagamaan secara kontinyu sesuai rencana.
              </ul> 
  </div>
</div>
</div>
  </body>
</html>
