<?php
   require "db.php";
   if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email=$_POST["email"];
    $updatedpassword=$_POST["password"];
    $hashupdatedpassword=password_hash($updatedpassword,PASSWORD_DEFAULT);
    
    try{
    $stmt=$pdo->prepare("UPDATE STUDENT SET PASSWORD=? WHERE EMAIL=?");
    $stmt->execute([$hashupdatedpassword,$email]);
    $user=$stmt->fetch(PDO::FETCH_ASSOC);
   }
   catch(PDOException $e){
    echo $e->getMessage();
   }
}
echo "PASSWORD UPDATED SUCCESSFULLY";
?>