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
       	<h3><i class="fas fa-book mr-2 ml-3 mt-5"></i>DETAIL PEMINJAMAN</h3><hr class="bg-secondary">   
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
        			<td>Jenis Koleksi </td>
        			<td>:</td>
        			<td><?=$bk->jenis_koleksi?></td>
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
			<table class="mt-3">
				<tr > 
					<td class="pr-2">
        				<a href="peminjaman"><button type="reset" class="btn btn-danger"><i class="fas fa-undo mr-2"></i>Kembali</button></a>
        			</td>
					<td class="mt-5">
						<form method="post" action="<?= base_url('admin/pinjam_buku');?>" >
        					<button type="submit" class="btn btn-success"><i class="fas fa-plus mr-2"></i>Pinjam Buku</button>
        				</form>
        			</td>
        			
				</tr>	
			</table>
        	

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