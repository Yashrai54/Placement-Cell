<?php
require "db.php";
session_start();

try {
    $stmt = $pdo->prepare("SELECT * FROM placements");
    $stmt->execute();
    $placements = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placements</title>
    <style>
        /* General Page Styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 20px;
    text-align: center;
}

/* Heading */
h2 {
    color: #333;
}

/* Placement Container */
div {
    background: #ffffff;
    padding: 20px;
    margin: 20px auto;
    width: 50%;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Company Name */
h3 {
    color: #007BFF;
    margin-bottom: 5px;
}

/* Job Title */
p {
    color: #555;
    font-size: 16px;
}

/* Form Styling */
form {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
}

/* File Input */
input[type="file"] {
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

/* Apply Button */
button {
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: 0.3s;
}

button:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <h2>Available Placements</h2>
    <?php foreach ($placements as $placement): ?>
        <div>
            <h3><?php echo htmlspecialchars($placement['company_name']); ?></h3>
            <p><strong>Title:</strong> <?php echo htmlspecialchars($placement['title']); ?></p>
            
            <form action="application.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="placement_id" value="<?php echo $placement['id']; ?>">
                
                <label for="resume">Upload Resume:</label>
                <input type="file" name="resume" required>
                
                <button type="submit">Apply</button>
            </form>
        </div>
    <?php endforeach; ?>
</body>
</html>
