<?php
// Include your database connection code here

// Get data from the AJAX request
$studentId = $_POST['id'];
$firstName = $_POST['first_name'];
$fatherName = $_POST['father_name'];
// Add other form fields here

// Query to update student data based on ID
$query = "UPDATE student_info SET first_name = :first_name, father_name = :father_name WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $studentId, PDO::PARAM_INT);
$stmt->bindParam(':first_name', $firstName, PDO::PARAM_STR);
$stmt->bindParam(':father_name', $fatherName, PDO::PARAM_STR);
// Bind other parameters here
$stmt->execute();

// You can return a success message or updated data if needed
$response = ['status' => 'success', 'message' => 'Student data saved successfully'];
echo json_encode($response);
?>
