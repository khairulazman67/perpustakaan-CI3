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
    <title>Data Buku</title>
  </head>

  <body>
    <div class="row no-gutters">
      <div class="col-md-10 p-5" style="margin-left: 16%">
        <h3><i class="fas fa-book mr-2 ml-3 mt-5"></i>DATA BUKU</h3><hr class="bg-secondary">

        <section class="isi">
          <table>
            <tr style="margin-left: 100%">
              <td style="width: 67%">
                <button type="button" class="btn btn-warning inline" data-toggle="modal" data-target="#tambah">
                  <i class="fas fa-plus mr-2"></i>Tambah Data Buku
                </button>      
              </td>
              <td class="pl-3">
                <form class="form-inline my-2 my-lg-0 ml-auto" method="post" action="<?= base_url('admin/search') ?>">
                  <input type="hidden" name="tabel" value="vkoleksi">
                  <input class="form-control mr-sm-2" type="text" name="keyword"  placeholder="Search">
                  <button class="btn btn-primary" type="submit">Search</button>
                </form>      
              </td>
            </tr>
            <tr>
              <td  colspan ='2' style="padding-top: 1.5%">
                <?= $this-> session ->flashdata('message'); ?>
              </td>
            </tr>
          </table>
          
          <div class="modal fade my-5" id="tambah" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content ">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Data Buku</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <?php echo form_open_multipart('admin/tambah_buku'); ?>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Nama</label>
                      <input type="text" class="form-control" id="recipient-name" name="nama">
                    </div>
                    
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Pengarang</label>
                      <input type="text" class="form-control" name="pengarang">
                    </div>
                    
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Stok</label>
                      <input type="text" name="stok" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Genre</label>
                        <select name="genre" class="form-control">
                          <option value="">Genre</option>
                          <?php foreach($genre as $gen):?>
                            <option value="<?php echo $gen->id_genre;?>"><?php echo $gen->genre;?></option>
                          <?php endforeach;?>
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Penerbit</label>
                      <select name="penerbit" class="form-control">
                        <option value="">Penerbit</option>
                        <?php foreach($penerbit as $pen):?>
                          <option value="<?php echo $pen->id_penerbit;?>"><?php echo $pen->nm_penerbit;?></option>
                        <?php endforeach;?>
                      </select>
                    </div>
                    

                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Tahun Terbit</label>
                      <select name="tahun" class="form-control">
                        <?php
                         $tahun=date('Y'); 
                         echo $tahun;
                         for($i=$tahun;$i>=1900;$i--){
                        ?>
                        <option value="<?=$i?>"><?=$i?></option>
                      <?php } ?>
                      </select>
                      
                    </div>

                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Foto</label>
                      <input type="file" class="form-control" id="recipient-name" name="foto" >
                    </div>
                    
                    <div class="modal-footer">
                      <button type="reset" class="btn btn-danger">Hapus</button>
                      <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                  <?php echo form_close();  ?>
                </div>
                
              </div>
            </div>
          </div>

<!-- tabel -->
          <div class="table-responsive">
            <table class="table table-striped" border="3">
              <thead>
                <tr class="text-center">
                  <th scope="col">No</th>
                  <th scope="col">ID Buku</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Penerbit</th> 
                  <th scope="col">Tahun Terbit</th>
                  <th scope="col">Genre</th>
                  <th scope="col">Total Stok</th>
                  <th scope="col">Sisa Stok</th>
                  <th scope="col" colspan="2">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no=1;
                foreach($koleksi as $buku) :  
                ?>
                  <tr>
                    <th scope="row" class="text-center"><?php echo $no++ ?></th>
                    <td><?php echo $buku->id_koleksi; ?></td>
                    <td><?php echo $buku->nm_buku; ?></td>
                    <td><?php echo $buku->nm_penerbit; ?></td>
                    <td><?php echo $buku->thn_terbit; ?></td>
                    <td><?php echo $buku->genre; ?></td>
                    <td><?php echo $buku->total_stok; ?></td>
                    <td><?php echo $buku->sisa_stok; ?></td>
                    <td>
                      <form method="post" action="<?= base_url('admin/view_detail_buku')?>">
                        <input type="hidden" name="id" value="<?=$buku->id_koleksi ?>"> 
                        <button type="submit" class="btn btn-primary text-center"style="width:100%">Detail
                        </button>
                      </form>
                    </td>

                    <td class="text-center">
                      <form method="post" action="<?= base_url('admin/hapus_buku');?>" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                        <!-- <input type="text" class="form-control" id="recipient-name" name="idadmin"> -->
                        <input type="hidden" name="idbuku" value="<?=$buku->id_koleksi?>">
                        <button type="submit" class="btn btn-danger" style="width: 100%">Hapus</button>
                      </form>
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