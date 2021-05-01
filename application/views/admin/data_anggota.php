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
    <title>Data Anggota</title>
  </head>

  <body>
    <div class="row no-gutters">
      <div class="col-md-10 p-5" style="margin-left: 16%">
        <h3><i class="fas fa-users mr-2 ml-3 mt-5"></i>DATA ANGGOTA</h3><hr class="bg-secondary">    
         <section class="isi">
           <table>
            <tr style="margin-left: 100%">
              <td style="width: 67%">
                <button type="button" class="btn btn-warning inline" data-toggle="modal" data-target="#login">
                  <i class="fas fa-plus mr-2"></i>Tambah Data Anggota
                </button>      
              </td>
              <td class="pl-3">
                <form class="form-inline my-2 my-lg-0 ml-auto" method="post" action="<?= base_url('admin/search') ?>">
                  <input type="hidden" name="tabel" value="vanggota">
                  <input class="form-control mr-sm-2" type="text" name="keyword"  placeholder="Search">
                  <button class="btn btn-primary" type="submit">Search</button>
                </form>      
              </td>
              <tr >
                <td  colspan ='2' style="padding-top: 1.5%">
                  <?= $this-> session ->flashdata('message'); ?>
                </td>
              </tr>
            </tr>
          </table>
          
          <div class="modal fade my-5" id="login" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content ">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="<?= base_url('admin/tambah_anggota');?>"> 
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Nama</label>
                      <input type="text" class="form-control" id="recipient-name" name="nama" >
                    </div>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label" >Alamat</label>
                      <input type="text" class="form-control" id="recipient-name" name="alamat">
                    </div>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Jenis Kelamin</label>
                      <select name="jeniskelamin" class="form-control">
                        <option value="Laki-Laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Jenis Anggota</label>
                      <select name="jenisanggota" class="form-control">
                        <option value="Guru">Guru</option>
                        <option value="Siswa">Siswa</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Kelas</label>
                      <select name="kelas" class="form-control">
                        <option value="">Kelas</option>
                        <?php foreach($kelas as $kls):?>
                        <option value="<?php echo $kls->kd_kelas;?>"><?php echo $kls->nm_kelas;?></option>
                        <?php endforeach;?>
                      </select>     
                    </div>
                    <div class="modal-footer">
                      <button type="reset" class="btn btn-danger">Hapus</button>
                      <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                  </form>
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
                  <th scope="col">ID Anggota</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Jenis Kelamin</th>
                  <th scope="col">Jenis Anggota</th>
                  <th scope="col">Kelas</th>
                  <th scope="col" colspan="2">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no=1;
                foreach($anggota as $agt) :  
                ?>
                  <tr>
                    <th scope="row" class="text-center"><?php echo $no++ ?></th>
                    <td><?php echo $agt->id_anggota; ?></td>
                    <td><?php echo $agt->Nama; ?></td>
                    <td><?php echo $agt->Alamat; ?></td>
                    <td><?php  
                    if($agt->JK ==='L') {
                      $JK ='Laki-laki';
                      echo $JK;
                    }else{
                      $JK ='Perempuan';
                      echo $JK;
                    }
                    ; ?></td>
                    <td><?php echo $agt->jenis_anggota; ?></td>
                    <td><?php echo $agt->nm_kelas; ?></td>
                    <td>
                      <form method="post" action="<?= base_url('admin/view_edit_anggota')?>">
                        <input type="hidden" name="id" value="<?=$agt->id_anggota ?>"> 
                        <button type="submit" class="btn btn-success text-center"style="width:100%">Edit
                        </button>
                      </form>
                    </td>
                    <td class="text-center" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                      <form method="post" action="<?= base_url('admin/hapus_anggota');?>">
                        <!-- <input type="text" class="form-control" id="recipient-name" name="idadmin"> -->
                        <input type="hidden" name="idadmin" value="<?=$agt->id_anggota?>">
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