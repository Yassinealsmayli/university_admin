<?php
// Include your database connection code or configuration here

// Example database configuration
$host = '127.0.0.1';
$dbname = 'registration';
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

// Function to perform a search on the database for universities
function searchUniversities($pdo, $searchData)
{
    try {
        $query = "SELECT * FROM student_registration1 
                  WHERE university_id LIKE :university_id 
                     AND university_year LIKE :university_year 
                     AND major LIKE :major";

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

// Check if the search query is present for universities
if (isset($_GET['search_universities'])) {
    $searchDataUniversities = array(
        'university_id' => isset($_GET['search_universities']['university_id']) ? $_GET['search_universities']['university_id'] : '',
        'university_year' => isset($_GET['search_universities']['university_year']) ? $_GET['search_universities']['university_year'] : '',
        'major' => isset($_GET['search_universities']['major']) ? $_GET['search_universities']['major'] : '',
    );

    // Perform the search for universities
    searchUniversities($pdo, $searchDataUniversities);
}
?>
