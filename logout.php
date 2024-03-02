<?php
// proses logout
session_start();
session_destroy();

// hapus cookie
setcookie("remember_me", "", time() - 3600, "/");

if (!isset($_SESSION['nisn'])) { 
    header("Location: login");
    exit;
} else {
    header("Location: login");
    exit;
}
?>
