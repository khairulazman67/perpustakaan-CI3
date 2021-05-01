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
     	<h3><i class="fas fa-book mr-2 ml-3 mt-5"></i>DETAIL PENGEMBALIAN</h3><hr class="bg-secondary">   
      <section class="isi">
        <?php foreach($buku as $bk) { ?>
            <table style="font-size: 20px; font-family: sans-serif;">  
              <tr >

                <td width="35%">ID Peminjaman</td>
                <td width="2%">:</td>
                <td width="30%"><?=$bk->id_peminjaman?></td>
                <td rowspan="8"><img style="width: 200px" src="<?= base_url();?>assets/foto/<?=$bk->foto?>"></td>
              </tr>
              <tr>
                <td>Nama Peminjam </td>
                <td>:</td>
                <td><?=$bk->Nama?></td>
              </tr>
              <tr>
                <td>Nama Buku</td>
                <td>:</td>
                <td><?=$bk->nm_buku?></td>
              </tr>
              <tr>
                <td>Tanggal Peminjaman </td>
                <td>:</td>
                <td><?=$bk->tgl_peminjaman?></td>
              </tr>
              <tr>
                <td>Jadwal Pengembalian</td>
                <td>:</td>
                <td><?=$bk->tgl_harusdikembalikan?></td>
              </tr>
              <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td><?php $telat=$bk->keterlambatan;
                $ket=$bk->tgl_pengembalian;
                  if ($telat<0) {
                    $sisawaktu = substr($telat, 1,3);
                    echo "Sisa ".$sisawaktu. " hari";
                  }elseif ($ket!=NUll) {
                    echo "Dikembalikan";
                  }else{
                    echo "Terlambat ".$telat ." hari";
                  }

                ?></td>
              
              </tr>
              <tr>
                <td>Denda</td>
                <td>:</td>
                <td><?php 
                  if ($ket!=NUll) {
                    echo "-";
                  }elseif ($telat<0) {
                    echo "-";
                  }else{
                    $denda=$telat*5000;
                    echo "Rp.".$denda;
                  }
                ?></td>
              </tr>
                 
            </table>
        <table class="mt-3">
          <tr> 
            <td class="pr-2">
              <a href="pengembalian"><button type="reset" class="btn btn-danger"><i class="fas fa-undo mr-2"></i>Kembali</button></a>
            </td>
            <td>
              <a href="pengembalian_buku"><button type="submit" class="btn btn-success"><i class="fas fa-plus mr-2"></i>Kembalikan Buku</button></a>
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