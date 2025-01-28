<?php 
   require "db.php";
   

   try{
     $stmt=$pdo->prepare("SELECT * FROM PLACEMENTS P WHERE DATEDIFF(CURDATE(),P.DATE)<=1 ORDER BY P.DATE");
     $stmt->execute([]);
     $latestplacements=$stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <title>Student Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        nav {
            background-color: #0073e6;
            padding: 1rem 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        nav ul li {
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        nav ul li:hover {
            color: #ffcc00;
        }

        main {
            flex: 1;
            padding: 2rem;
            text-align: center;
        }

        main h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #0073e6;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1rem 0;
            box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
        }

        footer p {
            font-size: 0.9rem;
        }
        main {
    max-width: 800px;
    margin: 40px auto;
    padding: 20px;
    background: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

h1 {
    color: #333;
    font-size: 28px;
    margin-bottom: 20px;
}

p {
    font-size: 16px;
    color: #666;
}

ul {
    list-style-type: none;
    padding: 0;
}

div {
    background: white;
    margin: 15px 0;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease-in-out;
}

div:hover {
    transform: scale(1.02);
}

h3 {
    color: #007bff;
    margin-bottom: 5px;
}

strong {
    color: #444;
}

    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="student_dashboard.php">Home</a></li>
            <li><a href="student_profile.php">Profile</a></li>
            <li><a href="student_applications.php">Applications</a></li>
            <li><a href="placements.php">Placement Posts</a></li>
            <li><a href="contact_form.php">Contact us</a></li>
        </ul>
    </nav>
    <main>
        <h1>Welcome Student</h1>
        <ul>
            <p>Here is a list of all latest placements:</p>
            <?php foreach($latestplacements as $placement): ?>
             <div>
             <h3><?php echo htmlspecialchars($placement['company_name']); ?></h3>
             <p><strong>Title:</strong> <?php echo htmlspecialchars($placement['title']); ?></p>
             </div>
            <?php endforeach; ?>
        </ul>
    </main>
    <footer>
        <p>Copyright all rights reserved</p>
    </footer>
</body>
</html>
