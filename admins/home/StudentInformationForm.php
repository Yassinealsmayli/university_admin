<?php
include "formfunction.php";
include 'DB_Functions.php';

// Define database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "courses";

// Establish database connection
$dbc = mysqli_connect($host, $username, $password, $database);
// Insert data
if (isset($_POST['submit'])) {
    if (generateValidateFormScript()) {
        $data = [
            'first_name' => isset($_POST['first_name']) ? $_POST['first_name'] : '',
            'father_name' => isset($_POST['father_name']) ? $_POST['father_name'] : '',
            'last_name' => isset($_POST['last_name']) ? $_POST['last_name'] : '',
            'mother_name' => isset($_POST['mother_name']) ? $_POST['mother_name'] : '',
            'birthday_date' => !empty($_POST['birthday_date']) ? $_POST['birthday_date'] : null,
            'place_of_birth' => isset($_POST['place_of_birth']) ? $_POST['place_of_birth'] : '',
            'id_number' => isset($_POST['id_number']) ? $_POST['id_number'] : '',
            'nationality' => isset($_POST['nationality']) ? $_POST['nationality'] : '',
            'gender' => isset($_POST['gender']) ? $_POST['gender'] : '',
            'phone_number2' => isset($_POST['phone_number']) ? $_POST['phone_number2'] : '',
            'place_of_occupation' => isset($_POST['place_of_occupation']) ? $_POST['place_of_occupation'] : '',
            'place_of_registration' => isset($_POST['place_of_registration']) ? $_POST['place_of_registration'] : '',
            'governorate' => isset($_POST['governorate']) ? $_POST['governorate'] : '',
            'judiciary' => isset($_POST['judiciary']) ? $_POST['judiciary'] : '',
            'university_id' => isset($_POST['university_id']) ? $_POST['university_id'] : '',
            'university_year' => isset($_POST['university_year']) ? $_POST['university_year'] : '',
            'major' => isset($_POST['major']) ? $_POST['major'] : ''
        ];

        $query = "INSERT INTO student_info (first_name, father_name, last_name, mother_name, birthday_date, place_of_birth, id_number, nationality, gender, phone_number, place_of_occupation, place_of_registration, governorate, judiciary) VALUES (
            '{$data['first_name']}', '{$data['father_name']}', '{$data['last_name']}', '{$data['mother_name']}', '{$data['birthday_date']}', '{$data['place_of_birth']}', '{$data['id_number']}', '{$data['nationality']}', '{$data['gender']}', '{$data['phone_number']}', '{$data['place_of_occupation']}', '{$data['place_of_registration']}', '{$data['governorate']}', '{$data['judiciary']}', '{$data['id']}'
        );
        INSERT INTO students (student_id,pass, year, major)VALUES('{$data['id']}','500', '{$data['university_year']}', '{$data['major']}');
        ";

        $result = mysqli_query($dbc, $query);

        if ($result) {
            echo "Data inserted successfully!";
        } else {
            echo "Error in inserting data: " . mysqli_error($dbc);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive registration form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/informationStudentForm.css">
    <script>
        function validateForm() {
            var requiredFields = [
                'first_name', 'father_name', 'last_name', 'mother_name', 'birthday_date',
                'place_of_birth', 'nationality', 'gender', 'civil_number', 'phone_number2',
                'place_of_occupation', 'place_of_registration', 'governorate', 'judiciary',
                'university_id', 'university_year', 'major'
            ];

            for (var i = 0; i < requiredFields.length; i++) {
                var fieldName = requiredFields[i];
                var fieldValue = document.getElementById(fieldName).value.trim();

                if (fieldValue === '') {
                    alert('Please enter your ' + fieldName.replace(/_/g, ' '));
                    return false;
                }
            }

            // If all fields are filled, return true
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <header>Student Form Registration</header>

        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="studentForm" >
            <div class="form First">
                <div class="details personal">
                    <span class="title">Personal Details</span>
                    <div class="fields">
                        <div class="input-field">
                            <?php echo text("first_name", "Your Name"); ?>
                        </div>

                        <div class="input-field">
                            <?php echo text("father_name", "Your Father Name"); ?>
                        </div>

                        <div class="input-field">
                            <?php echo text("last_name", "Your Last Name"); ?>
                        </div>

                        <div class="input-field">
                            <?php echo text("mother_name", "Your  Mother Name"); ?>
                        </div>
                        <div class="input-field">
                            <?php echo dates("birthday_date ", "Your Date"); ?>
                        </div>
                        <div class="input-field">
                            <?php echo text("place_of_birth", "Your  Mother Name"); ?>
                        </div>

                        <div class="input-field">
                            <?php echo text("nationality", "Nationality"); ?>
                        </div>

                        <div class="input-field">
                            <?php
                            $options = [
                                "value1" => "Male",
                                "value2" => "Female",
                                // Add more options as needed
                            ];

                            echo comboBox("gender", "Choose Gender", $options);
                            ?>
                        </div>

                        <div class="input-field">
                            <?php echo numbers("civil_number", "Civil Number "); ?>
                        </div>

                        <div class="input-field">
                            <?php echo phonenumbersLebanon("phone_number2", "Enter Your Phone Numbers"); ?>
                        </div>
                        <div class="input-field">
                            <?php echo text("place_of_occupation", "Place of your occupation"); ?>
                        </div>

                        <div class="input-field">
                            <?php echo text("place_of_registration", "Place of Registration"); ?>
                        </div>

                        <div class="input-field">
                            <?php echo text("governorate", "Governorate"); ?>
                        </div>

                        <div class="input-field">
                            <?php echo text("judiciary", "Judiciary"); ?>
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
                            echo numbers("university_id", "Enter your ID Number");
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

                            echo comboBox("university_year", "university year", $options);
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

                            echo comboBox("major", "Major", $options);
                            ?>
                        </div>
                        <button class="nextbtn" type="submit" name="submit">
                            <span class="btnTest">Register</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php
function generateValidateFormScript()
{
    $requiredFields = [
        'first_name', 'father_name', 'last_name', 'mother_name', 'birthday_date',
        'place_of_birth', 'nationality', 'gender', 'civil_number', 'phone_number2',
        'place_of_occupation', 'place_of_registration', 'governorate', 'judiciary',
        'university_id', 'university_year', 'major'
    ];

    $script = '<script>' . PHP_EOL;
    $script .= 'function validateForm() {' . PHP_EOL;

    foreach ($requiredFields as $fieldName) {
        $script .= '    var ' . $fieldName . ' = document.getElementById("' . $fieldName . '").value.trim();' . PHP_EOL;
        $script .= '    if (' . $fieldName . ' === "") {' . PHP_EOL;
        $script .= '        alert("Please enter your ' . str_replace('_', ' ', $fieldName) . '");' . PHP_EOL;
        $script .= '        return false;' . PHP_EOL;
        $script .= '    }' . PHP_EOL;
    }

    $script .= '    return true;' . PHP_EOL;
    $script .= '}' . PHP_EOL;
    $script .= '</script>';

    return $script;
}
?>

</body>
</html>
