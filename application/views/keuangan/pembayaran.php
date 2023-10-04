<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
        </div>
    </nav>

    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-black" aria-label="Sidebar">
       <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
          <a href="#" class="flex items-center pl-2.5 mb-5">
             <img src="https://binusasmg.sch.id/ppdb/logobinusa.png" class="h-6 mr-3 sm:h-7" alt="Flowbite Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">SMK Bina Nusantara</span>
          </a>
      <ul class="space-y-2 font-medium">
         <li>
            <a href="index" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <i class="fa-solid fa-chart-line fa-xl"></i>
               <span class="ml-3">Dashboard Keuangan</span>
            </a>
         </li>
         <li>
          <a href="pembayaran" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
          <i class="fa-solid fa-user fa-xl"></i>
            <span class="ml-3">Pembayaran</span>
         </li>
         <!-- untuk memberikan jarak -->
      <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br>
         <div> 
               <!-- Mengganti teks "Keluar" dengan gambar kecil dan transparan --> 
             <a href="<?php echo base_url('auth/logout')?>" style="color: #fff; text-decoration: none;"> 
                <img src="https://png.pngtree.com/png-vector/20190505/ourmid/pngtree-vector-logout-icon-png-image_1022628.jpg" 
                alt="Logout" style="width: 20px; opacity: 0.5; margin-right: 10px;" /> 
             </a> 
             Logout
         </div>
      </ul>
   </div>
</aside>

<div id="content" class="mx-auto w-3/4"> 
        <!-- tombol tambah -->
        <a href="<?php echo base_url('keuangan/tambah_bayar') ?>" class="btn btn-success ml-20">
                <i class="fas fa-plus"></i> Tambah Pembayaran
        </a>
         <!-- tombol export -->
         <a href="<?php echo base_url('keuangan/export')?>" class="btn btn-primary ml-20">Export</a>
        <table class="table table-striped table-hover" style="margin-left: 150px">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Pembayaran</th>
                        <th>Total Pembayaran</th>
                        <th>Aksi</th> 
                    </tr> 
                </thead> 
                <tbody>
                    <?php $no = 0; foreach ($pembayaran as $row): $no++ ?> 
                    <tr>
                        <td><?php echo $no ?> </td>
                        <td><?php echo nama_siswa ($row->id_siswa) ?></td>
                        <td><?php echo $row->jenis_pembayaran ?></td>
                        <td><?php echo convRupiah($row->total_pembayaran) ?></td>
                        <td>
                            <a href="<?php echo base_url('keuangan/ubah_bayar/') . $row->id_siswa ?>"
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
        <!-- Modal -->
        <div class="text-center">
        <form action="<?= base_url('keuangan/import') ?>" method="post" enctype="multipart/form-data">
           <input type="file" name="file" />
           <input type="submit" name="import" class="inline-block rounded bg-red-600 px-4 py-2 text-xs font-mediun text-white hover:bg-r" 
           value="import" />
        </form>
        </div>
        <!-- Button trigger modal
        <button type="submit" class="btn btn-primary text-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
        </button>

         Modal
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
            </div>
        </div> -->

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
                        window.location.href = "<?php echo base_url('keuangan/hapus/') ?>" + id; 
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
</body>
</html>