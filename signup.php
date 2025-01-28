<?php
  require_once "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $pdo->prepare("SELECT COUNT(*) FROM student WHERE email = ?");
  $stmt->execute([$_POST['email']]);
    
  if ($stmt->fetchColumn() > 0) {
      echo "Email is already taken. Please choose another.";
  } else {
      $stmt = $pdo->prepare("INSERT INTO student (name, email, password, role) VALUES (?, ?, ?, ?)");
      $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

      if ($stmt->execute([$_POST['username'], $_POST['email'], $hashedPassword, $_POST["status"]])) {
          echo "You will be redirected to login page";
          header("Location: login.html");
          exit();
      } else {
          echo "Error: Registration failed.";
      }
  }
}

?>