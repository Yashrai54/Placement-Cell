<?php
require "db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["resume"]) && isset($_POST["placement_id"])) {
    $student_id = $_SESSION['user_id'];
    $placement_id = $_POST["placement_id"]; // Get placement ID from form

    try {
        // File upload handling
        $resume_name = $_FILES["resume"]["name"];
        $resume_tmp_name = $_FILES["resume"]["tmp_name"];
        $resume_folder = "uploads/" . basename($resume_name);

        if (move_uploaded_file($resume_tmp_name, $resume_folder)) {
            $stmt = $pdo->prepare("INSERT INTO applications (student_id, placement_id, status) VALUES (?, ?, ?)");
            $stmt->execute([$student_id, $placement_id,'applied']);

            echo "Application submitted successfully!";
        } else {
            echo "Failed to upload resume.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
