<!DOCTYPE html>
<html>
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
    <title>Data Admin</title>
</head>

<body>	
    <div class="row no-gutters">
      <div class="col-md-10 p-5" style="margin-left: 16%">
        <h3><i class="fas fa-users-cog mr-2 ml-3 mt-5"></i>EDIT DATA ADMIN</h3><hr class="bg-secondary">    
        <div class="isi">
          <div class="form-group">
            <?= $this-> session ->flashdata('message'); ?>
          </div>
          <form method="post" action="<?= base_url('admin/edit_admin')?>"> 
          <?=''.$this->session->userdata('id') ?>
    		<?php foreach($admin as $adn) {
    			if ($adn->JK==='L') {
                	$JK='Laki-laki';
            	}else{
            		$JK='Perempuan';
            	}
        
        ?>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Nama</label>

              <input type="text" class="form-control" id="recipient-name" name="nama" value="<?php echo $adn->Nama?>">
            </div>
            	<input type="hidden" name="id" value="<?php echo $adn->idAdmin?>">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label" >Alamat</label>
              <input type="text" class="form-control" id="recipient-name" name="alamat" value="<?php echo $adn->Alamat?>">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Jenis Kelamin</label>
              <select name="jeniskelamin" class="form-control">

                <option value="<? echo $adn->JK?>"><?=$JK?></option>
                <option value="Laki-Laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-danger">Hapus</button>
              <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        	<?php } ?>
          </form>
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
