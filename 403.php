<?php 
session_start();
include '../assets/conn.php';
include '../assets/header.php';

if (!isset($_SESSION['nisn'])) {
  header('Location: login');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Voting Status - E-Vote OSIS</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/css/bootstrap.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to bottom, #1e90ff, #4169e1);
      color: #fff;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      text-align: center;
    }

    h1 {
      font-size: 3rem;
      color: #fff;
      margin-bottom: 30px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
      animation: textScale 1s ease-in-out alternate infinite;
    }

    .btn-back {
      background-color: #6c757d;
      border-color: #6c757d;
      transition: all 0.3s ease;
    }

    .btn-back:hover {
      background-color: #495057;
      border-color: #495057;
    }

    @keyframes textScale {
      0% {
        transform: scale(1);
      }
      100% {
        transform: scale(1.05);
      }
    }
  </style>
</head>
<body>
<div class="container" data-aos="fade-up">
  <div class="container">
    <h1>Mau apa bang?</h1>
    <a href="../../../index" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Beranda</a>
  </div>
</div>
  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script>
    AOS.init({
      duration: 800, // Durasi animasi (dalam milidetik)
      easing: 'ease-in-out', // Jenis easing untuk animasi
      once: true // Animasi hanya dijalankan sekali saat halaman dimuat
    });
  </script>
</body>
</html>
