<?php
// Proteksi halaman
$this->simple_login->sudah_login_admin();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/fontawesome/css/all.min.css">
    
   
    <title>Login Admin</title>
  </head>
  <body class="bg-dark">
    <div class="container">
      <h2 class="text-center">LOGIN ADMIN</h2>
      <hr>
      <form action="<?php echo base_url('Login_admin/aksi_login'); ?>" method="post">
        <div class="form-group">
          <label>Username</label>
            <div class="input-group"> 
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-user"></i></div>
              </div>
              <input type="text" name="username" class="form-control" placeholder="Masukkan Username Anda" required autofocus>
            </div>
        </div>
        <div class="form-group">
          <label>Password</label>
            <div class="input-group"> 
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
              </div>
              <input type="password" name="password" class="form-control" placeholder="Masukkan Password Anda" required autofocus>
            </div>
        </div>
        
        <button type="submit" name="login" class="btn btn-primary">MASUK</button>
        <button type="reset" class="btn btn-danger">HAPUS</button>
      </form>
    </div>













    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>