<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body class="min-vh-100 d-flex align-items-center">
    <div class="card w-50 m-auto p-3">

        <!-- Konten -->
        <div class="content">
            <h3 class="text-center">Ubah Siswa</h3>
            <?php foreach($siswa as $data_siswa): ?>
            <form class="row" action="<?php echo base_url('admin/aksi_update_siswa'); ?>" enctype="multipart/form-data"
                method="post">
                <div class="mb-3 col-6">
                    <label for="nama_siswa" class="form-label">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa"
                        value="<?php echo $data_siswa->nama_siswa ?>">
                </div>
                <div class="mb-3 col-6">
                    <label for="nisn" class="form-label">NISN</label>
                    <input type="text" class="form-control" id="nisn" name="nisn"
                        value="<?php echo $data_siswa->nisn ?>">
                </div>
                <div class="mb-3 col-6">
                    <label for="gender" class="form-label">Gender</label>
                    <select id="gender" name="gender" class="form-select">
                        <option selected value="<?php echo $data_siswa->gender ?>">
                            <?php echo $data_siswa->gender ?>
                        </option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3 col-6">
                    <label for="kelas" class="form-label">Kelas</label>
                    <select name="id_kelas" id="kelas" class="form-select"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option selected>Pilih Kelas</option>
                        <?php foreach($kelas as $row): ?>
                        <option value="<?php echo $row->id ?>">
                            <?php echo $row->tingkat_kelas.' '.$row->jurusan_kelas ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-3 col-6"> 
                    <label for="nama" class="form-label">Foto</label> 
                    <input type="file" class="form-control" name="foto" > 
                </div>
                <div class="mb-3 col-12">
                    <input type="hidden" name="id_siswa" value="<?php echo $data_siswa->id_siswa; ?>">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>

            <?php endforeach ?>
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