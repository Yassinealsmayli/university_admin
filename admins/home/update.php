<?php
include "formFunctionsEdit.php";
include 'DB_Functions.php';
// Define database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "courses";

// Establish database connection
$dbc = mysqli_connect($host, $username, $password, $database);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['submit'])) {
    // Process form data and perform the update

    // Sanitize input data (use mysqli_real_escape_string or prepared statements)
    $id = isset($_GET['id']) ? mysqli_real_escape_string($dbc, $_GET['id']) : '';
    $first_name = isset($_GET['first_name']) ? mysqli_real_escape_string($dbc, $_GET['first_name']) : '';
    $father_name = isset($_GET['father_name']) ? mysqli_real_escape_string($dbc, $_GET['father_name']) : '';
    $last_name = isset($_GET['last_name']) ? mysqli_real_escape_string($dbc, $_GET['last_name']) : '';
    $mother_name = isset($_GET['mother_name']) ? mysqli_real_escape_string($dbc, $_GET['mother_name']) : '';
    $birthday_date = isset($_GET['birthday_date']) ? mysqli_real_escape_string($dbc, $_GET['birthday_date']) : '';
    $place_of_birth = isset($_GET['place_of_birth']) ? mysqli_real_escape_string($dbc, $_GET['place_of_birth']) : '';
    $nationality = isset($_GET['nationality']) ? mysqli_real_escape_string($dbc, $_GET['nationality']) : '';
    $gender = isset($_GET['gender']) ? mysqli_real_escape_string($dbc, $_GET['gender']) : '';
    $id_number = isset($_GET['id_number']) ? mysqli_real_escape_string($dbc, $_GET['civil_number']) : '';
    $phone_number2 = isset($_GET['phone_number2']) ? mysqli_real_escape_string($dbc, $_GET['phone_number2']) : '';
    $place_of_occupation = isset($_GET['place_of_occupation']) ? mysqli_real_escape_string($dbc, $_GET['place_of_occupation']) : '';
    $place_of_registration = isset($_GET['place_of_registration']) ? mysqli_real_escape_string($dbc, $_GET['place_of_registration']) : '';
    $governorate = isset($_GET['governorate']) ? mysqli_real_escape_string($dbc, $_GET['governorate']) : '';
    $judiciary = isset($_GET['judiciary']) ? mysqli_real_escape_string($dbc, $_GET['judiciary']) : '';
    $university_id = isset($_GET['university_id']) ? mysqli_real_escape_string($dbc, $_GET['university_id']) : '';
    $university_year = isset($_GET['university_year']) ? mysqli_real_escape_string($dbc, $_GET['university_year']) : '';
    $major = isset($_GET['major']) ? mysqli_real_escape_string($dbc, $_GET['major']) : '';

    // Construct the SQL update query
    $updateQuery = "UPDATE student_info INNER JOIN students ON student_info.id = students.student_id SET
        first_name = '$first_name',
        father_name = '$father_name',
        last_name = '$last_name',
        mother_name = '$mother_name',
        birthday_date = '$birthday_date',
        place_of_birth = '$place_of_birth',
        nationality = '$nationality',
        gender = '$gender',
        id_number = '$id_number',
        phone_number2 = '$phone_number2',
        place_of_occupation = '$place_of_occupation',
        place_of_registration = '$place_of_registration',
        governorate = '$governorate',
        judiciary = '$judiciary',
        id = '$university_id',
        year = '$university_year',
        major = '$major'
        WHERE id = '$id'";

    // Execute the update query
    $updateResult = $dbc->query($updateQuery);

    // Check if the update was successful
    if ($updateResult) {
        echo "Update successful!";
        // Optionally, you can redirect the user to another page after the update
         header("Location: form1.php");
        // exit();
    } else {
        echo "Error updating data: " . mysqli_error($dbc);
    }
}

// Rest of your existing code for fetching data from the database
?>