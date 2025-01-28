<?php
  require "db.php";

  try{
    $stmt = $pdo->prepare("
    SELECT S.NAME, P.COMPANY_NAME 
    FROM STUDENT S
    JOIN APPLICATIONS A ON S.ID = A.STUDENT_ID
    JOIN PLACEMENTS P ON P.ID = A.PLACEMENT_ID
");
   $stmt->execute([]);
   $applications=$stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  catch(PDOException $e){
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
    <h1>List of all Applications:</h1>
    <ul>
        <?php foreach($applications as $application): ?>
            <div>
                <h2>Student Name: <?php echo htmlspecialchars($application["NAME"]); ?></h2>
                <p>Company Name: <?php echo htmlspecialchars($application["COMPANY_NAME"]); ?></p>
            </div>
            <?php endforeach; ?>
    </ul>
</body>
</html>