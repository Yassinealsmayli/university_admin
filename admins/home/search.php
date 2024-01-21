<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/search.css">

</head>
<body>
    <div class="container my-5">
        <form action="" method="POST">
            <input type="text" placeholder="Search data" name="search">
            <button class="btn btn-dark btn-sm" name="submit">Search</button>
        </form>
        <div class="container my-5"> 
            <table class="table">
                <th>id</th>
                <th>First Name</th>
                <th>Father Name</th>
                <th>Last Name</th>
                <th>Mother Name</th>
                <th>Birthday Date</th>
                <th>Birthdate Place</th>
                <th>civil number</th>
                <th>nationality</th>
                <th>Gender</th>
                <th>Phone Number</th>
                <th>place_of_occupation</th>
                <th>place_of_registration</th>
                <th>governorate</th>
                <th>judiciary</th>
                <th>university_id</th>
                <th>university_year</th>
                <th>major</th>

                <?php
                if (isset($_POST['submit'])) {
                    $search = $_POST['search'];
                    
                    // Connect to the database
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "courses";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM student_info INNER JOIN students ON student_info.id = students.student_id WHERE 
                            first_name LIKE '%$search%' 
                            OR father_name LIKE '%$search%'
                            OR last_name LIKE '%$search%'
                            OR mother_name LIKE '%$search%'
                            OR birthday_date LIKE '%$search%'
                            OR place_of_birth LIKE '%$search%'
                            OR id_number LIKE '%$search%'
                            OR nationality LIKE '%$search%'
                            OR gender LIKE '%$search%'
                            OR phone_number LIKE '%$search%'
                            OR place_of_occupation LIKE '%$search%'
                            OR place_of_registration LIKE '%$search%'
                            OR governorate LIKE '%$search%'
                            OR judiciary LIKE '%$search%'
                            OR id LIKE '%$search%'
                            OR year LIKE '%$search%'
                            OR major LIKE '%$search%'";

                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        $num = mysqli_num_rows($result);

                        echo "Number of results: " . $num . "<br>";

                        // Display the results
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Output data from each row
                            echo "<tr><td>{$row['id']}</td>";
                            echo "<td>{$row['first_name']}</td>";
                            echo "<td>{$row['father_name']}</td>";
                            echo "<td>{$row['last_name']}</td>";
                            echo "<td>{$row['mother_name']}</td>";
                            echo "<td>{$row['birthday_date']}</td>";
                            echo "<td>{$row['place_of_birth']}</td>";
                            echo "<td>{$row['nationality']}</td>";
                            echo "<td>{$row['gender']}</td>";
                            echo "<td>{$row['id_number']}</td>";
                            echo "<td>{$row['phone_number']}</td>";
                            echo "<td>{$row['place_of_occupation']}</td>";
                            echo "<td>{$row['place_of_registration']}</td>";
                            echo "<td>{$row['governorate']}</td>";
                            echo "<td>{$row['judiciary']}</td>";
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['year']}</td>";
                            echo "<td>{$row['major']}</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "Error in query: " . mysqli_error($conn);
                    }

                    // Close the connection
                    mysqli_close($conn);
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
