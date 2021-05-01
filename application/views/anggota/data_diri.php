<!DOCTYPE html>
<html>
<head>
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
	<title></title>
</head>
<body>
<div class="row no-gutters">
      <div class="col-md-10 p-5" style="margin-left: 16%">
        <h3><i class="fas fa-users-cog mr-2 ml-3 mt-5"></i>DATA DIRI</h3><hr class="bg-secondary">    
        <div class="isi">
        
        <button type="button" class="mt-3 mb-3 btn btn-warning inline" data-toggle="modal" data-target="#gantipass">Ganti Password</button>

        	<?= $this-> session ->flashdata('message'); ?>
          	<form method="post" action="<?= base_url('anggota/edit_anggota')?>"> 
    		<?php foreach($anggota as $agt) {
    			if ($agt->JK==='L') {
                	$JK='Laki-laki';
            	}else{
            		$JK='Perempuan';
            	}
        	?>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Nama</label>
              <input type="text" class="form-control" id="recipient-name" name="nama" value="<?php echo $agt->Nama?>">
            </div>
            	<input type="hidden" name="id" value="<?php echo $agt->id_anggota?>">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label" >Alamat</label>
              <input type="text" class="form-control" id="recipient-name" name="alamat" value="<?php echo $agt->Alamat?>">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Jenis Kelamin</label>
              <select name="jeniskelamin" class="form-control">
                <option value="<?= $agt->JK?>"><?=$JK?></option>
                <option value="Laki-Laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>

            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Jenis Anggota</label>
              <select name="jenisanggota" class="form-control">
                <option value="<?= $agt->jenis_anggota?>"><?=$agt->jenis_anggota?></option>
                <option value="Guru">Guru</option>
                <option value="Siswa">Siswa</option>
              </select>
            </div>
            
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Kelas</label>
              <select name="kelas" class="form-control">
                <option value="<?= $agt->kd_kelas?>"><?=$agt->kd_kelas?></option>
                <?php foreach($kelas as $kls):?>
                <option value="<?php echo $kls->kd_kelas;?>"><?php echo $kls->nm_kelas;?></option>
                <?php endforeach;?>
              </select>  

            </div>
            <div class="modal-footer">
               	<button type="reset" class="btn btn-danger">Hapus</button>
              	<button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        	<?php  }?>
          
          </form>

          <div class="modal fade my-5" id="gantipass" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content ">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <?= form_open_multipart('Anggota/ganti_password'); ?>

                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Password Sekarang</label>
                      <input type="text" name="pass_now" class="form-control">
                    </div>
                    
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Password Baru</label>
                      <input type="text" name="pass_baru" class="form-control">
                    </div>

                 
                    <div class="modal-footer">
                      <button type="reset" class="btn btn-danger">Batal</button>
                      <button type="submit" class="btn btn-primary">Ganti Password</button>
                    </div>
                  <?= form_close();  ?>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 












    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>