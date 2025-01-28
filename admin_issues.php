<?php
   session_start(); // Start the session

   // Initialize session issues array if not already set
   if (!isset($_SESSION["issues"])) {
       $_SESSION["issues"] = [];
   }

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $issue = $_POST["issue_Description"];
      $category = $_POST["issue-list"];

      // Store issue in session
      $_SESSION["issues"][] = ["issue" => $issue, "category" => $category];
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issues List</title>
</head>
<body>
    <h1>List Of Issues:</h1>

    <?php if (!empty($_SESSION["issues"])): ?>
        <ul>
            <?php foreach ($_SESSION["issues"] as $i): ?>
                <li>
                    <p><strong>Issue Description:</strong> <?php echo htmlspecialchars($i["issue"]); ?></p>
                    <p><strong>Category of Issue:</strong> <?php echo htmlspecialchars($i["category"]); ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No issues submitted yet.</p>
    <?php endif; ?>
</body>
</html>
