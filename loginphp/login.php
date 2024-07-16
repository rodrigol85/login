<?php

$passAdmin = password_hash('1234', PASSWORD_DEFAULT); 
$usernameAdmin= 'admin';
$hashedPasswordAdmin = $passAdmin;

$usernameUser = 'user';
$passUser = password_hash('1234', PASSWORD_DEFAULT);
$hashedPasswordUser= $passUser;

$username = $_POST['username'];
$password = $_POST['password'];

if($username === $usernameAdmin && password_verify($password, $hashedPasswordAdmin)) {
  session_start();
  $_SESSION['stato'] = "loggato";
  $_SESSION['role'] = "admin";
  header("Location: ./admin/admin.php");
} elseif($username === $usernameUser && password_verify($password, $hashedPasswordUser)) {
  session_start();
  $_SESSION['stato'] = "loggato";
  $_SESSION['role'] = "user"; 
  header("Location: ./user/user.php");
} else {
    session_start();
    $_SESSION['errorMessage'] = "Password o username incorretti";
  header("Location: ./index.php");
}

















?>