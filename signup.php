<?php
$showAlert = false;
$showError = false;
$existsData = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include 'partials/_dbconnect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    //Check for existing account
    $sql1 = "SELECT * FROM `users` WHERE `username`='$username'";
    $row = mysqli_query($conn, $sql1);
    $exists = mysqli_num_rows($row);


    if ($exists != 0) {
        $existsData = true;
    } else {
        if ($password == $cpassword) {
            $hash = password_hash("$password", PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`username`, `password`, `date`) VALUES ('$username', '$hash', current_timestamp())";

            $result = mysqli_query($conn, $sql);


            if ($result) {
                $showAlert = true;
            }
        } else {
            $showError = true;
        }
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SignUp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <?php require 'partials/_nav.php';

    // <!-- Dismissable alert  -->
    if ($existsData) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Sorry!</strong> Accounts already exists with this username.
        <br><strong>Try logging in or use another username.</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    if ($showAlert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account has been created successfully.
        <br><strong>You can now login.</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    if ($showError) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Passwords do not match.
        <br><strong>Re-enter Password</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>


    <div class="container my-4">
        <h2 class="text-center">Sign Up to create your account!</h2>

        <form action="/loginsystem/signup.php" method="post">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="email" name="username" class="form-control" id="username" aria-describedby="emailHelp">

            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="cpassword" id="cpassword">
                <div id="emailHelp" class="form-text">Make sure to type the same password. </div>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>