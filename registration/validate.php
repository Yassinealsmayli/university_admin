<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        $username = filter_var($_POST["username"], FILTER_VALIDATE_INT);
        $password = htmlspecialchars($_POST["password"], FILTER_SANITIZE_STRING);

        // Establish a database connection
        if (!session_id()) session_start();
        include "../globals.php";
        $servername = $_SESSION["servername"];
        $user = $_SESSION["user"];
        $dbname = $_SESSION["dbname"];

        $conn = new mysqli($servername, $user, null, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query the database
        $sql = "SELECT * FROM students WHERE student_id = $username";
        $result = $conn->query($sql);

        // Check if the query was successful
        if ($result === false) {
            die("Error in SQL query: " . $conn->error);
        }

        if ($result->num_rows > 0) {
            // User found, check password
            $row = $result->fetch_assoc();
            $stored_password = $row['pass'];

            // Verify the password using password_verify
            if ($password == $stored_password) {
                $conn->query("CREATE DATABASE IF NOT EXISTS my_data;");
                $conn->select_db("my_data");

                // Fix mData table creation query
                $conn->query("CREATE TABLE IF NOT EXISTS mData(I INT PRIMARY KEY, id INT, pass TEXT);");

                $result = $conn->query("SELECT COUNT(*) FROM mData;");
                $count = 0;

                if ($result) {
                    // Fetch the result as an enumerated array
                    $row = $result->fetch_row();

                    // Access the first element of the array (the count)
                    $count = (int)$row[0];

                    echo "The count is: " . $count;
                } else {
                    echo "Error executing query: " . $conn->error;
                }

                // Fix the IF statement and use proper UPDATE syntax
                if ($count == 0) {
                    $conn->query("INSERT INTO mData (I, id, pass) VALUES (1, $username, '500');");
                } else {
                    $conn->query("UPDATE mData SET id = $username, pass = '500' WHERE I = 1;");
                }

                echo "Login successful!";
                header("location: ../students/home/index.php", true);
                exit();
            } else {
                echo "Invalid password!";
            }
        } else {
            // User not found
            echo "User not found!";
        }

        // Close the database connection
        $conn->close();
    } else {
        exit("Please fill all fields");
    }
}
?>