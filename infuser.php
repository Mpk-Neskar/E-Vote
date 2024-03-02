<?php
 session_start();
 include 'assets/conn.php';

 if (!isset($_SESSION['nisn'])) {
  header('Location: login');
}

$nisn = $_SESSION['nisn'];
$query = "SELECT * FROM voters WHERE nisn='$nisn'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Informasi Pengguna - E-Vote</title>
 <?php include 'assets/header.php'?>
 <!-- Bootstrap CSS -->
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" rel="stylesheet">
 <!-- Font Awesome CSS -->
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
 <!-- AOS Library CSS -->
 <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <style>
    body {
        background: linear-gradient(to bottom, #1e90ff, #4169e1); /* Warna gradasi biru */
        color: #fff;
    }

    .navbar {
        background-color: rgba(0, 0, 0, 0.3); /* Warna navbar dengan opasitas */
    }

    .card {
        background-color: rgba(0, 0, 0, 0.5); /* Warna card dengan opasitas */
        color: #fff;
        margin-bottom: 300px;
        transition: transform 0.3s ease-in-out; /* Efek transisi saat hover */
    }

    .card:hover {
        transform: scale(1.05); /* Efek scaling saat hover */
    }

    .card img {
        height: 300px; /* Ukuran gambar card */
        object-fit: cover; /* Memastikan gambar tidak terdistorsi */
    }

    .card-title {
        margin-bottom: 0.5rem; /* Jarak antara judul card dan teks deskripsi */
    }

    .card-text {
        opacity: 0.8; /* Opasitas teks deskripsi */
    }

    .btn {
        margin-top: 0.5rem; /* Jarak antara tombol */
    }
</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index">
                E-Vote
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kandidat">Kandidat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="infuser">Informasi Pengguna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout">Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
 <div class="container mt-5">
  <div class="row justify-content-center">
   <div class="col-lg-6">
    <div class="card" data-aos="fade-up" data-aos-duration="1000">
     <div class="card-header">
      <h3 class="text-center">Informasi Pengguna</h3>
     </div>
     <div class="card-body">
      <table class="table table-striped">
       <tbody>
        <tr>
         <th scope="row">Nama:</th>
         <td><?= $row["name"]; ?></td>
        </tr>
        <tr>
         <th scope="row">Kelas:</th>
         <td><?= $row["class"]; ?></td>
        </tr>
        <tr>
         <th scope="row">NIS:</th>
         <td><?= $row["nisn"]; ?></td>
        </tr>
        <tr>
         <th scope="row">Status Vote:</th>
         <td><?= $row["ready"] ? '<font color="green">Sudah Vote!!</font>' : '<font color="red">Belum Vote!!</font>'; ?></td>
        </tr>
        <tr>
         <th scope="row">Jam:</th>
         <td id="jam"></td>
        </tr>
       </tbody>
      </table>
     </div>
    </div>
   </div>
  </div>
 </div>

 <!-- Bootstrap JS -->
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Letakkan di bawah bagian <script> yang sudah ada -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js"></script>
 <!-- AOS Library JS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
 <!-- Script untuk waktu dan AOS -->
 <script>
  setInterval(function() {
   var now = new Date();
   var jam = now.getHours();
   var menit = now.getMinutes();
   var detik = now.getSeconds();
   jam = jam < 10 ? "0" + jam : jam;
   menit = menit < 10 ? "0" + menit : menit;
   detik = detik < 10 ? "0" + detik : detik;
   var waktu = jam + ":" + menit + ":" + detik;
   var selamat = "";

   if (jam >= 0 && jam < 12) {
    selamat = "Selamat pagi!";
   } else if (jam >= 12 && jam < 18) {
    selamat = "Selamat siang!";
   } else {
    selamat = "Selamat malam!";
   }

   document.getElementById("jam").innerHTML = selamat + " " + waktu;
  }, 1000);

  AOS.init({
   duration: 800,
   easing: 'ease-in-out',
   once: true
  });
 </script>
</body>
</html>
