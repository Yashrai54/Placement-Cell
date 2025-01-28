<?php
   require "db.php";
   if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email=$_POST["email"];
    $password=$_POST["password"];

    try{
        $stmt=$pdo->prepare("SELECT * FROM STUDENT WHERE email=?");
        $stmt->execute([$email]);
        $user=$stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password,$user['password'])){
            echo "login succesfull";
            session_start();
            $_SESSION['user_id']=$user['id'];
            $_SESSION['username']=$user['name'];

            if($user['role']=="admin"){
                header("Location:admin_home.html");
                exit();
            }
            else if($user['role']=="student"){
                header("Location:student_dashboard.php");
            }
        }
        else{
            echo "invalid credentials";
        }
    }
    catch(PDOException $e){
        echo "Login has some error".$e.getMessage();
    }
   }
?>