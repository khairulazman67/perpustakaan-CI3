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
            <li class="nav-item ">
              <a class="nav-link" href="dashboard">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profil_sekolah">Profil Sekolah<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
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
        <div class="row" >
        <?php foreach($buku as $bk) { ?>                
            <div class="col-md-2 mb-5">
                <div class="card" style="width: 10rem; font-size: 6pt">
                  <img src="<?= base_url();?>assets/foto/<?=$bk->foto?>"style="height: 250px;" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h6 ><?=$bk->nm_buku?></h6>
                    <p class="card-text"><?=$bk->nm_penerbit?></p>
                    <form class="form-inline my-2 my-lg-0 mr-2" method="post" action="<?= base_url('utama/search') ?>" style="width:80% ;font-size: 10pt">
                      <input type="hidden" name="tabel" value="vkoleksi">
                      <input type="hidden" name="keyword" value="<?=$bk->id_koleksi ?>">
                      <button class="btn btn-primary" type="submit">Detail</button>
                    </form>
                  </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </section>

 






















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>