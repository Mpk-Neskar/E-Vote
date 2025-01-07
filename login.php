<?php
session_start();
require_once 'assets/header.php';
require_once 'assets/conn.php';
require_once 'assets/footer.php';

function autoLogout()
{
    if (isset($_SESSION['login_time']) && (time() - $_SESSION['login_time'] > 7200)) {
        session_unset();
        session_destroy();
        header('Location: login.php');
        exit;
    }
}

// Jika sudah login, langsung redirect ke index
if (isset($_SESSION['nisn'])) {
    autoLogout();
    header('Location: index.php');
    exit;
}

$errorMessage = ""; // Variabel untuk pesan kesalahan

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nisn = mysqli_real_escape_string($conn, $_POST['nisn']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM voters WHERE nisn = '$nisn'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if ($password === $row['password']) {
            $_SESSION['nisn'] = $nisn;
            $_SESSION['login_time'] = time();
            header('Location: index.php');
            exit;
        }
    }

    $errorMessage = "NIS atau Password salah, Bakaaa!!";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="flex min-h-screen flex-col justify-center px-6 py-12 lg:px-8">
<div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-20 w-auto" src="https://th.bing.com/th/id/OIP.42xEeheIkSEFwOYvnw6C_QHaHa?rs=1&pid=ImgDetMain" alt="Your Company">
    <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-gray-900">Evote Mpkuy</h2>
</div>
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <?php if (!empty($errorMessage)): ?>
            <div class="mb-4 rounded-lg bg-red-100 p-4 text-sm text-red-700">
                <?= htmlspecialchars($errorMessage) ?>
            </div>
        <?php endif; ?>
        <form class="space-y-6" action="" method="POST">
            <div>
                <label for="nisn" class="block text-sm font-medium text-gray-900">NIS</label>
                <div class="mt-2">
                    <input type="number" name="nisn" id="nisn" required
                           class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 outline-gray-300 placeholder-gray-400 focus:outline-2 focus:outline-indigo-600 sm:text-sm">
                </div>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
                <div class="mt-2">
                    <input type="password" name="password" id="password" required
                           class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 outline-gray-300 placeholder-gray-400 focus:outline-2 focus:outline-indigo-600 sm:text-sm">
                </div>
            </div>
            <div>
                <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
