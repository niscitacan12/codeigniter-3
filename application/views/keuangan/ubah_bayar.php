<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="min-vh-100 d-flex align-items-center">
    <div class="card w-50 m-auto p-3">

        <!-- Konten -->
        <div class="content">
            <h3 class="text-center">Ubah Pembayaran</h3>
            <?php foreach($pembayaran as $data_pembayaran) : ?>
            <form class="row" action="<?php echo base_url('keuangan/aksi_ubah_bayar'); ?>" enctype="multipart/form-data"
                method="post">
                <input name="id" type="hidden" value="<?php echo $data_pembayaran->id; ?>">
                <div class="mb-3 col-6"> 
                    <label for="siswa" class="form-label">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama_siswa" name="nama"
                        value="<?php echo nama_siswa( $data_pembayaran->id_siswa)?>">
            </div> 
            <div class="mb-3 col-6"> 
                <label for="jenis_pembayaran" class="form-label">Jenis Pembayaran</label> 
                <select name="jenis_pembayaran" class="form-select"> 
                <option selected><?php echo $data_pembayaran->jenis_pembayaran; ?></option>
                    <option value="" selected>Pilih Jenis Pembayaran</option> 
                    <option value="pembayaran SPP">Pembayaran SPP</option> 
                    <option value="pembayaran uang gedung">Pembayaran Uang Gedung</option> 
                    <option value="pembayaran seragam">Pembayaran Seragam</option> 
                </select> 
            </div> 
            <div class="mb-3 col-6"> 
                <label for="total_pembayaran" class="form-label">Total Pembayaran</label> 
                <input type="text" class="form-control" id="total_pembayaran" name="total_pembayaran" 
                value="<?php echo $data_pembayaran->total_pembayaran; ?>"> 
            </div>
            <div class="mb-3 col-12">
                <input type="hidden" name="id_siswa" value="<?php echo $data_pembayaran->id_siswa; ?>">
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
        </form>
        <?php endforeach; ?>
    </div>
    </div>
</body>
</html>