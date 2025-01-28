<?php
   require "db.php";

   try {
       session_start(); 
       
       $stmt = $pdo->prepare("SELECT * FROM STUDENT WHERE id = ?");
       $stmt->execute([$_SESSION['user_id']]);
       $user = $stmt->fetch(PDO::FETCH_ASSOC);

   } catch (PDOException $e) {
       echo $e->getMessage();
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        /* Reset some default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f7fc;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        main {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
        }

        h1 {
            font-size: 2.5rem;
            color: #0073e6;
            margin-bottom: 1rem;
        }

        h2 {
            font-size: 1.8rem;
            color: #555;
            margin-bottom: 1rem;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 1rem;
            color: #555;
        }

        input[type="email"],
        input[type="password"] {
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #0073e6;
            outline: none;
        }

        button {
            background-color: #0073e6;
            color: white;
            padding: 12px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #005bb5;
        }

        footer {
            text-align: center;
            padding: 1rem;
            margin-top: 2rem;
            color: #555;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <main>
        <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h1>
        <h3>Update Profile:</h3>
        <form action="update_profile.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" name="email" value="" placeholder="Enter Your E-mail" required>
            
            <label for="password">Password:</label>
            <input type="password" name="password" value="" placeholder="Enter new password" required>

            <button type="submit">Update Profile</button>
        </form>
    </main>
    <footer>
        <p>Copyright all rights reserved</p>
    </footer>
</body>
</html>
