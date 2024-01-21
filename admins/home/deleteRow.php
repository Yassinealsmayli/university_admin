<?php
// deleteRow.php

if (isset($_GET['id'])) {
    $host = '127.0.0.1';
    $dbname = 'courses';
    $user = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = $_GET['id'];

        // Assuming your table name is student_registration1
        $query = "DELETE FROM student_info WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "Row deleted successfully";
        } else {
            echo "Error deleting row";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        $pdo = null;
    }
} else {
    echo "ID not provided";
}
?>
