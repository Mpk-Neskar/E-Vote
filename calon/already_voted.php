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
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      text-align: center;
      background-color: rgba(0, 0, 0, 0.6);
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }

    h1 {
      font-size: 2.5rem;
      margin-bottom: 20px;
      text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
      animation: textScale 1s ease-in-out alternate infinite;
    }

    .btn-back {
      background-color: #6c757d;
      border-color: #6c757d;
      transition: all 0.3s ease;
      font-size: 1rem;
    }

    .btn-back:hover {
      background-color: #495057;
      border-color: #495057;
    }

    .btn-back i {
      margin-right: 8px;
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
  <h1>Terima Kasih Kamu sudah melakukan voting!</h1>
  <h3>Cuman bisa sekali ya beb!</h3>

  <a href="../" class="btn btn-danger btn-back">
    <i class="fas fa-arrow-left"></i> Beranda
  </a>
</div>

  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script>
    AOS.init({
      duration: 800,
      easing: 'ease-in-out',
      once: true
    });
  </script>
</body>
</html>
