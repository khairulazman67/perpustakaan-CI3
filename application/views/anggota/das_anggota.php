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
    <title>Data Anggota</title>
  </head>

  <body>
    <div class="row no-gutters">
      <div class="col-md-10 p-5" style="margin-left: 16%">
        <h3><i class="fas fa-users mr-2 ml-3 mt-5"></i>Dashboard Anggota</h3><hr class="bg-secondary">    
        <section class="isi">
          <h5>Riwayat Peminjaman</h5>
          <table style="float: right">
            <tr style="margin-left: 100%">
              <td class="pl-3">
                <form class="form-inline my-2 my-lg-0 ml-auto" method="post" action="<?= base_url('anggota/search') ?>">
                  <input type="hidden" name="tabel" value="vpeminjaman">
                  <input class="form-control mr-sm-2" type="text" name="keyword"  placeholder="Search">
                  <button class="btn btn-primary" type="submit">Search</button>
                </form>      
              </td>
            </tr>
          </table>
          <?= $this-> session ->flashdata('message'); ?>
<!-- tabel -->
          <div class="table-responsive pt-3">
            <table class="table table-striped" border="3">
              <thead>
                <tr class="text-center">
                  <th scope="col">No</th>
                  <th scope="col">ID Peminjaman</th>
                  <th scope="col">Judul Buku</th>
                  <th scope="col">Tanggal Peminjaman</th> 
                  <th scope="col">Jadwal Pengembalian</th>
                  <th scope="col">Tanggal Pengembalian</th>
                  <th scope="col">Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no=1;
                foreach($riwayat as $data) :  
                ?>
                  <tr>
                    <th scope="row" class="text-center"><?php echo $no++ ?></th>
                    <td><?php echo $data->id_peminjaman; ?></td>
                    <td><?php echo $data->nm_buku; ?></td>
                    <td><?php echo $data->tgl_peminjaman; ?></td>
                    <td><?php echo $data->tgl_harusdikembalikan; ?></td>
                    <td><?php echo $data->tgl_pengembalian; ?></td>
                    <td><?php 
                      $telat=$data->keterlambatan;
                      $ket=$data->tgl_pengembalian;
                        if ($ket!=NUll) {
                          echo "Dikembalikan";
                        }
                        elseif ($telat<0) {
                          $sisawaktu = substr($telat, 1,3);
                          echo "Sisa ".$sisawaktu. " hari";
                        }elseif ($telat=='0') {
                          echo "Saatnya dikembalikan";
                        }
                        else{
                          echo "Terlambat ".$telat ." hari";
                        }
                      ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
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