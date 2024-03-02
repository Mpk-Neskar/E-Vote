<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include 'assets/header.php' ?>
    <title>Login</title>
    <style>
      body {
        font-family: 'Helvetica', sans-serif;
        background: linear-gradient(to bottom, #5a72ff, #b54cff);
        width: 100%;
        height: 100vh;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
          <div class="card mt-5">
            <div class="card-body">
              <h3 class="card-title text-center mb-4">Login E-Vote</h3>
              <form method="POST">
                <div class="form-group">
                  <label for="nisn">NIS</label>
                  <input type="text" class="form-control" name="nisn" id="nisn" placeholder="Masukan Nis">
                </div>
                <br>
                <div class="form-group">
                  <label for="password">PASSWORD</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Masukan Password">
                </div>
                <br>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="remember-me" name="remember-me">
                  <label class="form-check-label" for="remember-me">Remember Me</label>
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-block mt-4" name="submit">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
      session_start();
      include 'assets/conn.php';
      include 'assets/footer.php';

      // hash cookie name
      $cookieNameHash = hash('sha256', 'remember_me');

      if (isset($_COOKIE[$cookieNameHash])) {
        $_SESSION['nisn'] = $_COOKIE[$cookieNameHash];

        // Update waktu kedaluwarsa cookie jika pengguna aktif
        setcookie($cookieNameHash, $_COOKIE[$cookieNameHash], time() + 7200, "/");
      } else if (isset($_POST['submit'])) {
        $nisn = $_POST['nisn'];
        $password = $_POST['password'];

        $result = mysqli_query($conn, "SELECT * FROM voters WHERE nisn = '$nisn'");

        if (mysqli_num_rows($result) === 1) {
          $row = mysqli_fetch_assoc($result);

          if ($password == $row["password"]) {
            $_SESSION['nisn'] = $nisn;

            // Set remember me cookie
            if (isset($_POST['remember-me']) && $_POST['remember-me'] == 'on') {
              $cookieValue = $nisn;
              $cookieNameHash = hash('sha256', 'remember_me');
              // Set cookie dengan waktu kedaluwarsa 2 jam (7200 detik)
              setcookie($cookieNameHash, $cookieValue, time() + 7200, "/");
            }

            header('Location: index');
            exit;
          }
        } else {
          echo "<script>
                  swal('Wrong Nisn / Password!!', 'Masukan Username dan Password dengan benar!!', 'error');
                </script>";
        }
      }

      // Logout otomatis setelah 2 jam
      if (isset($_SESSION['nisn'])) {
        $cookieNameHash = hash('sha256', 'remember_me');
        // Hapus sesi dan cookie jika waktu sudah lebih dari 2 jam
        if (isset($_COOKIE[$cookieNameHash])) {
          setcookie($cookieNameHash, '', time() - 3600, '/');
          unset($_SESSION['nisn']);
          header('Location: login.php');
          exit;
        } else {
          // Update waktu kedaluwarsa cookie jika pengguna aktif
          setcookie($cookieNameHash, $_SESSION['nisn'], time() + 7200, "/");
        }
      }
    ?>
  </body>
</html>
