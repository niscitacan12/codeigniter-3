<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Navbar</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('admin') ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('admin') ?>">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('admin/siswa') ?>">Guru</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten -->
    <!-- Tabel -->
    <div class="content">
        <div class="container table-container">
            <table class="table table-striped">
    </div> 
    <a href="<?php echo base_url('admin/tambah_siswa') ?>" class="btn btn-success m-2">
                <i class="fas fa-plus"></i> Tambah
            </a>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto Siswa</th>
                        <th>Nama Siswa</th>
                        <th>NISN</th>
                        <th>Gender</th>
                        <th>Kelas</th>
                        <th class="text-center">Aksi</th> 
                    </tr> 
                </thead> 
                <tbody> 
                    <?php $no = 0; 
                                foreach ($siswa as $row): 
                                    $no++ ?> 
                    <tr> 
                        <td> 
                            <?php echo $no ?> 
                        </td> 
                        <td> 
                            <?php echo $row->nama_siswa ?> 
                        </td> 
                        <td> 
                            <?php echo $row->nisn ?> 
                        </td> 
                        <td> 
                            <?php echo $row->gender ?> 
                        </td> 
                        <td> <?php echo tampilan_full_kelas_byid($row->id_kelas) ?></td>
                        <td class="text-center"> 
                            <a href="<?php echo base_url('admin/update_siswa/').$row->id_siswa?>" 
                                class="btn btn-primary btn-sm">Ubah</a> 
                            <button onclick="hapus(<?php echo $row->id_siswa ?>)" 
                                class="btn btn-danger btn-sm">Hapus</button> 
                        </td>
                        <td>
                           <img src="<?php echo base_url('images/siswa/' .$row->foto); ?>" width="50">
                        </td>
                        <td>
                            <?php echo $row->nama_siswa ?>
                        </td>
                        <td>
                            <?php echo $row->nisn ?>
                        </td>
                        <td>
                            <?php echo $row->gender ?>
                        </td>
                        <td>
                            <?php echo tampilan_full_kelas_byid($row->id_kelas) ?>
                        </td>
                        <td class="text-center">
                        <a href="<?php echo base_url('admin/update_siswa/') . $row->id_siswa ?>"
                                class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button onClick="hapus(<?php echo $row->id_siswa; ?>)" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                                </button>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>

            </table>
 
                    </tr> 
                    <?php endforeach ?> 
                </tbody> 
            </table> 
            </table> 
            <button class="btn btn-sm btn-warning"><a href="Tambah_siswa" class="btn text-primary">Tambah</a> 
            </button> 
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> 
            <script> 
            function hapus(id) { 
                Swal.fire({ 
                    title: 'Apakah Kamu Ingin Menghapusnya?', 
                    icon: 'warning', 
                    showCancelButton: true, 
                    confirmButtonColor: '#3085d6', 
                    cancelButtonColor: '#d33', 
                    confirmButtonText: 'Ya, Hapus!' 
                }).then((result) => { 
                    if (result.isConfirmed) { 
                        window.location.href = "<?php echo base_url('admin/hapus_siswa/') ?>" + id; 
                    } 
                }); 
            } 
            </script> 
 
            <?php if($this->session->flashdata('success')): ?> 
            <script> 
            Swal.fire({ 
                icon: 'success', 
                title: '<?=$this->session->flashdata('success')?>', 
                showConfirmButton: false, 
                timer: 1500 
            }); 
            </script> 
            <?php endif; ?>
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
    </div>

</body>

</html>