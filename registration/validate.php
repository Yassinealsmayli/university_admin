<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){

    if( !empty($_POST["username"]) && !empty($_POST["password"]) ){
        $username = filter_var($_POST["username"],FILTER_VALIDATE_INT);
        $password = htmlspecialchars($_POST["password"],FILTER_VALIDATE_INT);


        // Establish a database connection
        if(!session_id())session_start();
        include "../globals.php";
        $servername = $_SESSION["servername"];
        $user = $_SESSION["user"];
        $pass = $_SESSION["pass"];
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
            if ($password ===$stored_password) {
                echo "Login successful!";
                header("location: ../students/available_courses/index.php?username=".urlencode($username),true);
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
    }else{
        exit("please fill all fields");
    }
}


?>