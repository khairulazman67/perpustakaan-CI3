<?php
// Proteksi halaman
$this->simple_login->cek_login();
?>
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

    <!-- Fontawesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/fontawesome/css/all.min.css">
    
    <!-- file css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/admin.css">
    <title>Pengembalian</title>
  </head>

  <body>
    <div class="row no-gutters">
      <div class="col-md-10 p-5" style="margin-left: 16%">
        <h3><i class="fas fa-minus-square mr-2 ml-3 mt-5"></i>PENGEMBALIAN</h3><hr class="bg-secondary">
        <section class="isi">
          <div class="form-group">
            <?= $this-> session ->flashdata('message'); ?>
          </div>
          <form method="post" action="<?= base_url('admin/detail_pengembalian')?>"> 
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Id Peminjaman</label>

              <input type="text" class="form-control" id="recipient-name" name="id_peminjaman">
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-danger">Cancel</button>
              <button type="submit" class="btn btn-primary">Lihat Detail</button>
            </div> 
          </form>
        </section>
      </div>
    </div> 























    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>