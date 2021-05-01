<?php
// Proteksi halaman
$this->simple_login->cek_login();
?>

<!doctype html
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.css">
    <script type="text/javascript" src="<?php echo base_url()?>assets/bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.js"></script>

    <!-- Fontawesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/fontawesome/css/all.min.css">
    
    <!-- file css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/admin.css">
    <title>Dashboard Admin</title>
  </head>
  
    <div class="row no-gutters">
        <div class="col-md-10 p-4" style="margin-left: 16%">
          <h3><i class="fas fa-tachometer-alt mr-2 mt-5"></i>DASHBOARD</h3><hr class="bg-secondary">
            <section class="isi">
                
                <form class="form-inline my-2 my-lg-0 ml-auto pb-3"  method="post" action="<?= base_url('admin/search') ?>" style="padding-left: 70%">
                  <input type="hidden" name="tabel" value="vkoleksi1">

                  <input class="form-control mr-sm-2" type="text" name="keyword"  placeholder="Search">
                  <button class="btn btn-primary" type="submit">Search</button>
                </form>      


                <div class="row" >
                <?php foreach($buku as $bk) { ?>                
                    <div class="col-md-2 mb-5">
                        <div class="card" style="width: 10rem; font-size: 6pt">
                          <img src="<?= base_url();?>assets/foto/<?=$bk->foto?>"style="height: 250px;" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h6 ><?=$bk->nm_buku?></h6>
                            <p class="card-text"><?=$bk->nm_penerbit?></p>
                            <form method="post" action="<?= base_url('admin/view_detail_buku')?>">
                                <input type="hidden" name="id" value="<?=$bk->id_koleksi ?>"> 
                                <button type="submit" class="btn btn-primary text-center"style="width:80% ;font-size: 10pt">Detail Buku
                                </button>
                            </form>
                          </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </section>
        </div>
    
    </div> 

  <body>


    























    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>