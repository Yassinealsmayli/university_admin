<?php
// Include your database connection code here

// Get the student ID from the AJAX request
$studentId = $_GET['id'];

// Query to fetch student data based on ID
$query = "SELECT * FROM student_info WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $studentId, PDO::PARAM_INT);
$stmt->execute();

// Fetch data as an associative array
$studentData = $stmt->fetch(PDO::FETCH_ASSOC);

// Convert the data to JSON and echo it
echo json_encode($studentData);
?>
