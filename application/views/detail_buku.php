<!doctype html>
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
            <li class="nav-item active">
              <a class="nav-link" href="dashboard">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
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
    <section class="isi p-5">
      <?php foreach($buku as $bk) { ?>
      <hr class="bg-secondary">
      <table style="font-size: 20px; font-family: sans-serif; margin-top: 2%">
        
        <tr >
          <td width="30%">ID Buku</td>
          <td width="2%">:</td>
          <td width="35%"><?=$bk->id_koleksi?></td>
          <td rowspan="8"><img style="width: 200px" src="<?= base_url();?>assets/foto/<?=$bk->foto?>"></td>
        </tr>
        <tr>
          <td>Judul Buku </td>
          <td>:</td>
          <td><?=$bk->nm_buku?></td>
        </tr>
        <tr>
          <td>Penerbit </td>
          <td>:</td>
          <td><?=$bk->nm_penerbit?></td>
        </tr>
        <tr>
          <td>Nama Pengarang </td>
          <td>:</td>
          <td><?=$bk->nm_pengarang?></td>
        </tr>
        <tr>
          <td>Genre</td>
          <td>:</td>
          <td><?=$bk->genre?></td>
        </tr>
        <tr>
          <td>Total Stok</td>
          <td>:</td>
          <td><?=$bk->total_stok?></td>
        </tr>
        <tr>
          <td>Sisa Stok </td>
          <td>:</td>
          <td><?=$bk->sisa_stok?></td>
        </tr> 

        
      </table>

      <?php } ?>
    </section>
























    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>