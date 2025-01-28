<?php
  require "db.php";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['desc'];
    $companyname = $_POST['companyname'];
    $postingdate = $_POST['date'];
    $eligibilitycriteria = $_POST['eligible']; // Ensure this matches the form field name

    echo "Form submitted successfully!";

    try {
        $stmt = $pdo->prepare(
            "INSERT INTO placements (title, description, company_name, `date`, eligibility_criteria) 
            VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->execute([$title, $description, $companyname, $postingdate, $eligibilitycriteria]);
        echo "Placement post added to the database!";
    } catch (PDOException $e) {
        error_log($e->getMessage()); // Log the error
        echo "An error occurred while adding the placement post.";
    }
  }
?>
