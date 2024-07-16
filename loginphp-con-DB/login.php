<?php
include './db/connessione.php';

$email=htmlspecialchars($_POST['email']);
$password=$_POST['password'];

$stmt = $db->prepare("SELECT * FROM clienti WHERE email = :email");
$stmt->bindParam(":email", $email);
if ($stmt->execute()) {
    $rows = $stmt->rowCount();
    if ($rows > 0) {
       while($row=$stmt->fetch()){
            $pass= $row['password'];
            $userEmail= $row['email'];
            $userRole= $row['role'];
            if($pass === $password && $userEmail === $email){
              if($userRole === "admin"){
                session_start();
                $_SESSION['stato'] = "loggato";
                $_SESSION['role'] = "admin";
                header("Location: ./admin/admin.php");
              }else{
                session_start();
                $_SESSION['stato'] = "loggato";
                $_SESSION['role'] = "user"; 
                header("Location: ./user/user.php");
              }

            }else{
              session_start();
              $_SESSION['errorMessage'] = "Password o username incorretti";
              header("Location: ./index.php");
            }
       }
    } else {
      session_start();
      $_SESSION['errorMessage'] = "Non esiste nessun utente con questa email";
      header("Location: ./index.php");
    }
} else {
    echo "Errore: " . $stmt->errorInfo()[2];
}



?>



<!-- if($username === $usernameAdmin && password_verify($password, $hashedPasswordAdmin)) {
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
} -->

















?>