<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class='min-vh-100 d-flex align-items-center'>
<div class="card w-50 m-auto p-3"> 
    
    <!-- Konten --> 
    <div class="content">
        <h3 class="text-center">Tambah Pembayaran</h3> 
        <form action = "<?php echo base_url('keuangan/aksi_tambah_bayar')?>" 
              encytype="multipart/form-data" 
              method="post" class="row"> 
            <div class="mb-3 col-6"> 
                <label for="siswa" class="form-label">Nama Siswa</label> 
                <select name="nama" class="form-select">
                    <!-- <option selected>Pilih Siswa</option> -->
                    <option selected>Pilih Siswa</option>
                    <?php foreach ($siswa as $row): ?>
                    <option value="<?php echo $row->id_siswa; ?>">
                        <?php echo $row->nama_siswa; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div> 
            <div class="mb-3 col-6"> 
                <label for="jenis_pembayaran" class="form-label">Jenis Pembayaran</label> 
                <select name="jenis_pembayaran" class="form-select"> 
                    <option value="" selected>Pilih Jenis Pembayaran</option> 
                    <option value="pembayaran SPP">Pembayaran SPP</option> 
                    <option value="pembayaran uang gedung">Pembayaran Uang Gedung</option> 
                    <option value="pembayaran seragam">Pembayaran Seragam</option> 
                </select> 
            </div> 
            <div class="mb-3 col-6"> 
                <label for="total_pembayaran" class="form-label">Total Pembayaran</label> 
                <input type="text" class="form-control" id="total_pembayaran" name="total_pembayaran" > 
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form> 
    </div>
    </div>
    
    <script> 
    function openNav() { 
        document.getElementById("mySidenav").style.width = "250px"; 
        document.getElementsByClassName("content")[0].style.marginLeft = "250px"; 
    } 
 
    function closeNav() { 
        document.getElementById("mySidenav").style.width = "0"; 
        document.getElementsByClassName("content")[0].style.marginLeft = "0"; 
    } 
    </script> 
</body>
</html>