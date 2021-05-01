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
	<title>Detail Buku</title>
</head>
<body>
 <div class="row no-gutters">
      <div class="col-md-10 p-5" style="margin-left: 16%">
       	<h3><i class="fas fa-book mr-2 ml-3 mt-5"></i>DETAIL BUKU</h3><hr class="bg-secondary">   
        <section class="isi">
        	<?php foreach($buku as $bk) { ?>
        	<table style="font-size: 20px; font-family: sans-serif;">
        		
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
        	 <button type="button" class="mt-3 btn btn-warning inline" data-toggle="modal" data-target="#edit">
                <i class="fas fa-plus mr-2"></i>Edit Data Buku
            </button>

            <div class="modal fade my-5" id="edit" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content ">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Data Buku</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <?= form_open_multipart('admin/edit_buku'); ?>
                    <div class="form-group">
                      <input type="hidden" name="id" value="<?=$bk->id_koleksi?>">
                      <label for="recipient-name" class="col-form-label">Judul</label>
                      <input type="text" class="form-control" id="recipient-name" name="judul" value="<?=$bk->nm_buku?>">
                    </div>
                    
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Pengarang</label>
                      <input type="text" class="form-control" name="pengarang" value="<?=$bk->nm_pengarang?>">
                    </div>
                    
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Total Stok</label>
                      <input type="text" name="totalstok" class="form-control" value="<?= $bk->total_stok ?>">
                    </div>
                    
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Sisa Stok</label>
                      <input type="text" name="sisastok" class="form-control" value="<?= $bk->total_stok ?>">
                    </div>

                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Genre</label>
                        <select name="genre" class="form-control">
                          <option value="<?= $bk->id_genre?>"><?=$bk->genre?></option>
                          <?php foreach($genre as $gen):?>
                            <option value="<?php echo $gen->id_genre;?>"><?php echo $gen->genre;?></option>
                          <?php endforeach;?>
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Penerbit</label>
                      <select name="penerbit" class="form-control">
                        <option value="<?= $bk->id_penerbit?>"><?=$bk->nm_penerbit?></option>
                        <?php foreach($penerbit as $pen):?>
                          <option value="<?php echo $pen->id_penerbit;?>"><?php echo $pen->nm_penerbit;?></option>
                        <?php endforeach;?>
                      </select>
                    </div>
                    

                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Tahun Terbit</label>
                      <select name="tahun" class="form-control">
                        <option value="<?= $bk->thn_terbit?>"><?=$bk->thn_terbit?></option>
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
                      <label for="recipient-name" class="col-form-label">Jenis Koleksi</label>
                      <select name="jeniskoleksi" class="form-control">
                      	<option value="<?=$bk->jenis_koleksi?>"><?=$bk->jenis_koleksi ?></option>
                        <option value="Buku Digital">Buku Digital</option>
                        <option value="Buku Offline">Buku Offline</option>
                        
                      </select>      
                    </div>

                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Foto</label>
                      <input type="file" class="form-control" id="recipient-name" name="foto">
                    </div>
                    
                    <div class="modal-footer">
                      <button type="reset" class="btn btn-danger">Hapus</button>
                      <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                  <?= form_close();  ?>
                </div>
                
              </div>
            </div>
          </div>
          <?php } ?>
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