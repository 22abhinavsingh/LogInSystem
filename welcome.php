<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome - <?php echo $_SESSION['username'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <?php require 'partials/_nav.php';
    ?>
    <div class="container mt-3 d-flex flex-column text-center">

        <h4></h4>
        <div class="alert alert-success" role="alert" style="margin-left:15%; margin-right:15%">
            <h4 class="alert-heading" style="font-weight:bold">Welcome! You are logged in using <?php echo $_SESSION['username'] ?> mail</h4>
            <p>Yeah, you are on our welcome page. After you successfully login, you will be redirected here. The php in the backend works fine.</p>
            <hr>
            <p class="mb-0">Whenever you need to, be sure to logout of your account before exiting the page by clicking here. <a href="/loginsystem/logout.php" style="background-color:green; color:white; border-radius:2vh; padding:1vh; font-weight:bold">LogOut</a></p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>