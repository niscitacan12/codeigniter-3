<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Home</title>
    <!-- Menggunakan Bootstrap CSS dari CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
     <style>
            body {
                background-image : url('https://foto.data.kemdikbud.go.id/getImage/20328986/7.jpg');
                background-size : cover;
                background-repeat : no-repeat;
                background-attachment : fixed;   

            }
        </style>
</head>
<body class="background">
    <header class="text-white text-center py-4">
    <div class="text-center">
         <img src="https://binusasmg.sch.id/ppdb/logobinusa.png" alt="image" height="200px" width="250px" >
        </div>
        <h1>SMK Bina Nusantara Programer</h1>

    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    </nav>
    <main class="container mt-4">
        <section class="row">
            <div class="col-md-4 text-white" >
                <h2>Tentang SMK</h2>
                <h3>SMK Bina Nusantara cerdas, cermat, kreatif, berakhlak baik, mandiri, </h3>
        </section>
        <section class="mt-4 text-white" >
            <h2>SMK Bina Nusantara Mranggen</h2>
            <ul>
                <li>jurusan SMK cocok untuk siswa perempuan</li>
                <li>mengenal jurusan teknik komputer dan jaringan</li>
                <li>jurusan SMK sesuai era revolusi industri</li>
            </ul>
        </section>
        <div class= "jumbotron text-center">
        <a class="btn btn-danger" href="./auth" role="button">Register</a>
        <a class="btn btn-warning" href="./auth" role="button">Login</a>
        </div>
    </main>
    <footer class="bg-dark text-white text-center py-3 mt-4">
        &copy; 2023 - 2024 SMK Bina Nusantara
    </footer>

    <!-- Menggunakan Bootstrap JS dari CDN (opsional, hanya jika Anda memerlukan komponen Bootstrap yang interaktif) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
