<!DOCTYPE html>
<html>
<head>
	<title>sada</title>
</head>
<body>
	<form method="post" action="<?php echo base_url('admin/tambah_admin') ?>"> 
	    <div class="form-group">
	      <label for="recipient-name" class="col-form-label" name="nama">Nama</label>
	      <input type="text" class="form-control" id="recipient-name">
	    </div>
	    <div class="form-group">
	      <label for="recipient-name" class="col-form-label" name="alamat">Alamat</label>
	      <input type="text" class="form-control" id="recipient-name">
	    </div>
	    <div class="form-group">
	      <label for="recipient-name" class="col-form-label">Jenis Kelamin</label>
	      <select name="jeniskelamin" class="form-control">
	        <option value="Laki-Laki">Laki-laki</option>
	        <option value="Perempuan">Perempuan</option>
	      </select>
	    </div>
	    <button type="reset" class="btn btn-danger">Hapus</button>
	    <button type="button" class="btn btn-primary">Kirim</button>
	  </form>
</body>
</html>