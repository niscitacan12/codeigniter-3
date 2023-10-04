<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
    <body class="min-vh-100 d-flex align-items-center">
    <div class="card w-50 m-auto p-3"> 
        <div class="content">
            <h3 class="text-center p-3">Ubah Pembayaran</h3>
            <?php foreach($pembayaran as $data_pembayaran):?>
            <form action="<?php echo base_url('keuangan/aksi_ubah_bayar');?>" method="post" class="row" enctype="multipart/form-data">
                <input name="id" type="hidden" value="<?php echo $data_pembayaran->id?>">
                        <div class="mb-3 col-6">
                            <label for="siswa" class="form-label">Siswa</label>
                            <select name="nama" class="form-select">
                                <option selected value="<?php echo $data_pembayaran->id_siswa ?>"><?php echo nama_siswa($data_pembayaran->id_siswa) ?></option>
                                <?php foreach ($siswa as $data): ?>
                                <option value="<?php echo $data->id_siswa ?>">
                                    <?php echo $data->nama_siswa ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                <div class="mb-3 col-6">
                    <label for="jenis_pembayaran" class="form-label">Jenis Pembayaran</label>
                    <select name="jenis_pembayaran" class="form-select">
                        <option selected value="<?php echo $data_pembayaran->jenis_pembayaran ;?>"></option>
                        <option value="Pembayaran SPP">Pembayaran SPP</option>
                        <option value="Pembayaran Uang Gedung">Pembayaran Uang Gedung</option>
                        <option value="Pembayaran Seragam">Pembayaran Seragam</option>
                    </select>
                </div>
                <div class="mb-3 col-6">
                    <label for="total_pembayaran" class="form-label">Total Pembayaran</label>
                    <input type="number" class="form-control" value="<?php echo $data_pembayaran->total_pembayaran?>" id="total_pembayaran" name="total_pembayaran">
                </div>
                <div class="mb-3 col-12">
                <input type="hidden" name="id_siswa" value="<?php echo $data_pembayaran->id_siswa; ?>">
                <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
            <?php endforeach?>
        </div>
    </div>
</body>
</html>