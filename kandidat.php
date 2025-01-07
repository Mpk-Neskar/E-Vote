<?php
session_start();
include 'assets/conn.php';

if (!isset($_SESSION['nisn'])) {
  header('Location: login');
}

$nisn = $_SESSION['nisn'];
$query = "SELECT * FROM candidates";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Vote Dashboard</title>
  <!-- CSS Bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to bottom, #1e90ff, #4169e1);
      color: #fff;
    }

    .navbar {
      background-color: rgba(0, 0, 0, 0.6);
    }

    .card-deck {
      margin-top: 30px;
    }

    .card {
      background-color: rgba(0, 0, 0, 0.6);
      color: #fff;
      margin-bottom: 20px;
      border: none;
      transition: transform 0.3s ease-in-out, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: scale(1.05);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }

    .card img {
      height: 300px;
      object-fit: cover;
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
    }

    .card-body {
      padding: 20px;
    }

    .card-title {
      margin-bottom: 0.5rem;
      font-size: 1.5rem;
      font-weight: bold;
    }

    .card-text {
      opacity: 0.8;
      font-size: 1rem;
    }

    .btn-details {
      background-color: #007bff;
      border: none;
      color: #fff;
      padding: 10px 20px;
      text-align: center;
      font-size: 1rem;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .btn-details:hover {
      background-color: #0056b3;
    }

    .container {
      max-width: 1200px;
    }

    .header {
      text-align: center;
      margin: 30px 0;
    }

    .header h1 {
      font-size: 2.5rem;
      font-weight: bold;
      text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
    }
  </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index">E-Vote</a>
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

  <div class="container">
    <div class="header">
      <h1>Calon Ketua MPK Periode 2023 - 2024</h1>
    </div>

    <div class="row" data-aos="fade-up" data-aos-duration="1000">
      <?php
      $detail_pages = array('candidate1', 'candidate2', 'candidate3');
      $i = 1;
      while ($row = mysqli_fetch_assoc($result)) :
      ?>
        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="1800">
          <div class="card">
            <img src="<?php echo $row['pict']; ?>" class="card-img-top" alt="Candidate <?php echo $i; ?>">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['name']; ?></h5>
              <p class="card-text"><?php echo $row['description']; ?></p>
              <center>
                <a href="calon/<?php echo $detail_pages[$i - 1]; ?>" class="btn btn-details">Selengkapnya</a>
              </center>
            </div>
          </div>
        </div>
      <?php
        $i++;
      endwhile;
      ?>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    AOS.init(); // Initialize AOS
  </script>
</body>

</html>
