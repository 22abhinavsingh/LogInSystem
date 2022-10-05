<?php

$server = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($server, $username, $password);




$sql = "Create DATABASE IF NOT EXISTS users";
$result = mysqli_query($conn, $sql);



// Create and connecting table
$sql = "CREATE TABLE IF NOT EXISTS `users`.`users` (`sno` INT(20) NOT NULL AUTO_INCREMENT , `username` VARCHAR(30) NOT NULL , `password` VARCHAR(250) NOT NULL , `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`sno`))";
$result = mysqli_query($conn, $sql);
