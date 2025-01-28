<?php
   $host='localhost';
   $dbname='placement_cell';
   $username='root';
   $password='root';

   try{
   $pdo=new PDO("mysql:host=$host;port=3306;dbname=$dbname",$username,$password);
   $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   }
   catch(PDOException $e){
      die("connection failed". $e->getMessage());
   }
?>