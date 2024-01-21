<?php
// Include your database connection code or configuration here

// Example database configuration
$host = '127.0.0.1';
$dbname = 'courses';
$user = 'root';
$password = '';

// Establish a PDO connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit(); // Stop script execution if connection fails
}
// Function to perform a search on the database for students
function searchStudents($pdo, $searchData)
{
    try {
        $query = "SELECT * FROM student_info
                  WHERE first_name LIKE :first_name 
                     AND father_name LIKE :father_name 
                     AND last_name LIKE :last_name 
                     AND birthday_date LIKE :birthday_date 
                     AND id_Number LIKE :Civil_Number
                     AND place_of_birth LIKE :place_of_birth 
                     AND gender LIKE :gender 
                     AND place_of_registration LIKE :place_of_registration 
                     AND governorate LIKE :governorate 
                     AND judiciary LIKE :judiciary";

        $stmt = $pdo->prepare($query);

        foreach ($searchData as $key => $value) {
            $stmt->bindValue(":$key", '%' . $value . '%', PDO::PARAM_STR);
        }

        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Return the search results as JSON
        echo json_encode($results);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Check if the search query is present for students
if (isset($_GET['search_students'])) {
    $searchDataStudents = array(
        'first_name' => isset($_GET['search_students']['first_name']) ? $_GET['search_students']['first_name'] : '',
        'father_name' => isset($_GET['search_students']['father_name']) ? $_GET['search_students']['father_name'] : '',
        'last_name' => isset($_GET['search_students']['last_name']) ? $_GET['search_students']['last_name'] : '',
        'birthday_date' => isset($_GET['search_students']['birthday_date']) ? $_GET['search_students']['birthday_date'] : '',
        'place_of_birth' => isset($_GET['search_students']['place_of_birth']) ? $_GET['search_students']['place_of_birth'] : '',
        'id_Number' => isset($_GET['search_students']['id_Number']) ? $_GET['search_students']['Civil_Number'] : '',
        'gender' => isset($_GET['search_students']['gender']) ? $_GET['search_students']['gender'] : '',
        'place_of_registration' => isset($_GET['search_students']['place_of_registration']) ? $_GET['search_students']['place_of_registration'] : '',
        'governorate' => isset($_GET['search_students']['governorate']) ? $_GET['search_students']['governorate'] : '',
        'judiciary' => isset($_GET['search_students']['judiciary']) ? $_GET['search_students']['judiciary'] : '',
    );

    // Perform the search for students
    searchStudents($pdo, $searchDataStudents);
}
?>
