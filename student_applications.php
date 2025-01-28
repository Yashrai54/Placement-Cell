<?php
  require "db.php";
  session_start();
  try{
  $stmt=$pdo->prepare("SELECT p.company_name, p.title, p.description 
        FROM APPLICATIONS a
        JOIN PLACEMENTS p ON a.placement_id = p.id
        WHERE a.student_id = ?");
  $stmt->execute([$_SESSION['user_id']]);

  $companies=$stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  catch (PDOException $e){
    echo $e->getMessage();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 20px;
    text-align: center;
}

h1 {
    color: #333;
}

.application-card {
    background: #fff;
    padding: 15px;
    margin: 15px auto;
    width: 50%;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h3 {
    color: #007BFF;
}

p {
    color: #555;
    font-size: 16px;
}

    </style>
</head>
<body>
     <h1>Your applications</h1>
     <?php foreach($companies as $company): ?>
      <div>
        <h3><?php echo htmlspecialchars($company['company_name']) ?></h3>
        <p><strong>Title:</strong><?php echo htmlspecialchars($company['title']) ?></p>
        <p><strong>Description:</strong><?php echo htmlspecialchars($company['description']) ?></p>
      </div>
      <?php endforeach; ?>
</body>
</html>