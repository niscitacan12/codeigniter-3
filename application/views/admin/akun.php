<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>akun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
       <h3 class="text-center">Akun</h3> 
       <?php foreach($user as $users) : ?>
        <form action="<?php echo base_url('admin/aksi_ubah_akun') ?>" enctype="multipart/form-data"
        method="post">
     <div class="row">
       <div class="mb-3 col-6">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input type="email" value="<?php echo $users->email ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Email" name="email" aria-describedby="emailHelp">
       </div>
       <div class="mb-3 col-6">
        <label for="exampleInputUsername" class="form-label">Username</label>
        <input type="username" value="<?php echo $users->username ?>" class="form-control" id="exampleInputUsername" placeholder="Masukkan Username" name="username">
       </div>
       <div class="mb-3 col-6">
        <label for="exampleInputPassword1" class="form-label">Password Baru</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Password" name="password_baru">
       </div>
       <div class="mb-3 col-6">
        <label for="konfirmasi_password" class="form-label">Konfirmasi Password</label>
        <input type="password" class="form-control" id="konfirmasi_password" placeholder="Konfirmasi Password" name="konfirmasi_password">
       </div>
     </div>
       <div class="mb-3 col-12">
         <button type="submit" class="btn btn-primary">Ubah</button>
       </div>
    </form>
       <?php endforeach; ?>
    </div>
</body>
</html>