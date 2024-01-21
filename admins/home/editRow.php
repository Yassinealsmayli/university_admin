<?php
include 'DB_Functions.php';
include 'formFunctionsEdit.php';

// Define database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "courses";

// Establish database connection
$dbc = mysqli_connect($host, $username, $password, $database);

// Initialize variables to store form data
$first_name = $father_name = $last_name = $mother_name = $birthday_date = "";
$place_of_birth = $nationality = $gender = $civil_number = $phone_number2 = "";
$place_of_occupation = $place_of_registration = $governorate = $judiciary = "";
$university_id = $university_year = $major = "";

// Check if an ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    die('ID not provided');
}

// Fetch data from the database based on the ID
$query = "SELECT * FROM student_info INNER JOIN students ON student_info.id = students.student_id WHERE id = $id";
$result = $dbc->query($query);

if ($result->num_rows != 1) {
    die('ID not found');
}

// Check if the query was successful
if ($result) {
    $row = mysqli_fetch_assoc($result);

    // Assign values from the database to variables
    $first_name = $row['first_name'];
    $father_name = $row['father_name'];
    $last_name = $row['last_name'];
    $mother_name = $row['mother_name'];
    $birthday_date = $row['birthday_date'];
    $place_of_birth = $row['place_of_birth'];
    $nationality = $row['nationality'];
    $gender = $row['gender'];
    $civil_number = $row['id_number'];
    $phone_number2 = $row['phone_number'];
    $place_of_occupation = $row['place_of_occupation'];
    $place_of_registration = $row['place_of_registration'];
    $governorate = $row['governorate'];
    $judiciary = $row['judiciary'];
    $university_id = $row['university_id'];
    $university_year = $row['university_year'];
    $major = $row['major'];
} else {
    echo "Error in fetching data: " . mysqli_error($dbc);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/edit.css">

</head>
<div class="container">
        <header>Student Form Registration</header>

        <form method="GET" action="update.php" id="studentForm" >
        <h3>Edit your information</h3>
            <div class="form First">
                <div class="details personal">
                    <span class="title">Personal Details</span>
                    <div class="fields">
                        <div class="input-field">
                        <?php echo text("first_name", "Your Name", isset($row['first_name']) ? $row['first_name'] : ''); ?>

                        </div>

                        <div class="input-field">
                            <?php echo text("father_name", "Your Father Name", isset($row['father_name']) ? $row['father_name'] : ''); ?>
                        </div>

                        <div class="input-field">
                            <?php echo text("last_name", "Your Last Name", isset($row['last_name']) ? $row['last_name'] : ''); ?>
                        </div>

                        <div class="input-field">
                            <?php echo text("mother_name", "Your  Mother Name", isset($row['mother_name']) ? $row['mother_name'] : ''); ?>
                        </div>
                        <div class="input-field">
                            <?php echo dates("birthday_date ", "Your Date", isset($row['birthday_date']) ? $row['birthday_date'] : ''); ?>
                        </div>
                        <div class="input-field">
                            <?php echo text("place_of_birth", "Your  Mother Name", isset($row['place_of_birth']) ? $row['place_of_birth'] : ''); ?>
                        </div>

                        <div class="input-field">
                            <?php echo text("nationality", "Nationality", isset($row['nationality']) ? $row['nationality'] : ''); ?>
                        </div>

                        <div class="input-field">
                            <?php
                            $options = [
                                "value1" => "Male",
                                "value2" => "Female",
                                // Add more options as needed
                            ];

                            echo comboBox("gender", "Choose Gender", $options , isset($row['gender']) ? $row['gender'] : '');
                            ?>
                        </div>

                        <div class="input-field">
                            <?php echo numbers("civil_number", "Civil Number ", isset($row['id_number']) ? $row['civil_number'] : ''); ?>
                        </div>

                        <div class="input-field">
                            <?php echo phonenumbersLebanon("phone_number", "Enter Your Phone Numbers", isset($row['phone_number']) ? $row['phone_number'] : ''); ?>
                        </div>
                        <div class="input-field">
                            <?php echo text("place_of_occupation", "Place of your occupation", isset($row['place_of_occupation']) ? $row['place_of_occupation'] : ''); ?>
                        </div>

                        <div class="input-field">
                            <?php echo text("place_of_registration", "Place of Registration", isset($row['place_of_registration']) ? $row['place_of_registration'] : ''); ?>
                        </div>

                        <div class="input-field">
                            <?php echo text("governorate", "Governorate", isset($row['governorate']) ? $row['governorate'] : ''); ?>
                        </div>

                        <div class="input-field">
                            <?php echo text("judiciary", "Judiciary", isset($row['judiciary']) ? $row['judiciary'] : ''); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form First">
                <div class="details ID">
                    <span class="title">University Major Information</span>
                    <div class="fields">
                        <div class="input-field">
                            <?php
                            echo numbers("university_id", "Enter your ID Number", isset($row['id']) ? $row['id'] : '');
                            ?>
                        </div>

                        <div class="input-field">
                            <?php
                            $options = [
                                "value1" => "premier anee",
                                "value2" => "deuxieme anee",
                                "value3" => "troisieme anee",
                                "value4" => "premiere  anee en Master",
                                // Add more options as needed
                            ];

                            echo comboBox("university_year", "university year", $options, isset($row['university_year']) ? $row['university_year'] : '');
                            ?>
                        </div>

                        <div class="input-field">
                            <?php
                            $options = [
                                "value1" => "computeer science",
                                "value2" => "Math",
                                "value3" => "Biology",
                                "value4" => "Biochimie",
                                "value5" => "chimie",
                                "value6" => "Statistique",
                                "value7" => "Physique",
                                "value8" => "Electronique",
                                // Add more options as needed
                            ];

                            echo comboBox("major", "Major", $options, isset($row['major']) ? $row['major'] : '');
                            ?>
                        </div>
                        <button class="nextbtn" type="submit" name="submit" >
    <span class="btnTest">UPDATE</span>
</button>


                    </div>
                </div>
            </div>
        </form>
    </div>

    </body>
</html>