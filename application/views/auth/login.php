<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
    body {
        background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStFTFc3epFUwOuWHJPyczqAsB4d4Wm9Tw9dXmYLcD4rWeIE5wH-_Gjh-635g_bPlTAUno&usqp=CAU');
    }
</style>
</head>
<body>
<div class="container py-5 "> 
<div class="card w-50 justify-content-center mx-auto bg-light   "> 
<div class="header"> 
<div class="jumbotron text-center">
         <img src="https://binusasmg.sch.id/ppdb/logobinusa.png" alt="image" height="200px" width="250px" >
        </div>
        <div style="text-align: center;">
        <h1>SMK Bina Nusantara</h1>
        </div>
    <h2 class="text-center pt-3 text-primary">login </h2> 
</div> 
   
<form action="<?php echo base_url(); ?>Auth/aksi_login" method="post" class="space-y-12"> 
    <div class="card-body"> 
    <div class="mb-3"> 
    <img src="https://png.pngtree.com/png-vector/20190927/ourmid/pngtree-email-icon-png-image_1757854.jpg" alt="logo" widht="20" height="20"
            style="top: 50%; right: 10px;";>
       <label for="exampleInputEmail1" class="form-label">Email</label> 
       <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Email" name="email" aria-describedby="emailHelp"> 
    </div> 
    <img src="https://e7.pngegg.com/pngimages/778/12/png-clipart-computer-icons-skype-icon-design-change-password-logo-internet.png" alt="logo" widht="20" height="20"
            style="top: 50%; right: 10px;";>
       <label for="exampleInputPassword1" class="form-label">Password</label> 
       <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Password" name="password"> 
    </div> 
    <div class="text-center pb-3"> 
           <button type="submit" class="btn btn-primary">LOGIN</button> 
    </div> 
        <br>  
          <p class="text-center">don't have an account yet? <a href="./auth">register account</a></p> 
        <br>  
        </div> 
        </div>
</form> 
        
</body>
</html>