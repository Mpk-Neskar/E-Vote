<?php
session_start();
include '../assets/conn.php';

if (!isset($_SESSION['nisn'])) {
  header('Location: login.php');
}

$nisn = $_SESSION['nisn'];
$query = "SELECT * FROM voters WHERE nisn='$nisn'";
$result = mysqli_query($conn, $query);

if (!$result) {
  die('Error: ' . mysqli_error($conn)); // handle SQL query error
}
$scarpe = mysqli_query($conn,"SELECT * FROM voters WHERE nisn = '$nisn'");
$row = mysqli_fetch_assoc($scarpe);
$ready = $row['ready'];

if (isset($_POST['vote']) && $_POST['vote'] === 'yes') {
    include '../assets/conn.php'; // Sertakan koneksi ke database

    // Lakukan pembaruan suara kandidat (gantilah 'candidates' dengan nama tabel kandidat yang sesuai)
    $queryUpdateCandidate = "UPDATE candidates SET vote_count = vote_count + 1 WHERE id = 2"; // Ubah '1' dengan id kandidat yang sesuai
    $resultUpdateCandidate = mysqli_query($conn, $queryUpdateCandidate);

    // Lakukan pembaruan status pemilih (gantilah 'voters' dengan nama tabel pemilih yang sesuai)
    $queryUpdateVoterStatus = "UPDATE voters SET ready = 1 WHERE nisn = '$nisn'"; // Gantilah '$nisn' dengan variabel yang sesuai
    $resultUpdateVoterStatus = mysqli_query($conn, $queryUpdateVoterStatus);

    if ($resultUpdateCandidate && $resultUpdateVoterStatus) {
        // Jika pembaruan sukses, kirim status OK (200) kembali ke JavaScript
        http_response_code(200);
    } else {
        // Jika terjadi kesalahan dalam pembaruan data, kirim status error (500) kembali ke JavaScript
        http_response_code(500);
    }
} else {
    // Jika tidak ada vote yang dikirim, kirim status bad request (400) kembali ke JavaScript
    http_response_code(400);
}
?>
