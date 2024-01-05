<?php 
// error_reporting(0);
// if($_SERVER["HTTP_REFERER"]!="http://localhost:8080/project-php/registration/index.php"&&$_SERVER['REQUEST_METHOD']=='GET'&&realpath(__FILE__)==realpath($_SERVER['SCRIPT_FILENAME'])){
//     header('HTTP/1.0 403 Forbidden',true,403);
//     die("<h2>Access denied!</h2><p>This file is private.</p>");
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .btn-login {
    background: greenyellow;
    font-weight: bolder;
    color: white;
    box-shadow: 0px 0px 0px 2px white;
    border-radius: 3px;
    padding: 5px 2em;
    margin: 10px;
    transition: 0.5s;
    }
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <?php
    // Database connection parameters
    if(!session_id())session_start();
    include "../../globals.php";
    $servername = $_SESSION["servername"];
    $user = $_SESSION["user"];
    $pass = $_SESSION["pass"];
    $dbname = $_SESSION["dbname"];
    $studentId = filter_var($_GET['username'],FILTER_VALIDATE_INT);
    
    $servername = "127.0.0.1";
    $user = "root";
    $pass = "password";
    $dbname = "courses";
    try {
        // Create a PDO connection
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $user);
        $pdo->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );
    
        // Query to get available courses
        $query = "SELECT courses.course_name, courses.course_code,courses.course_credit,courses.optional
                FROM student_courses 
                JOIN courses ON student_courses.course_id = courses.course_id 
                WHERE student_courses.student_id = :studentId";

        $query_student = "SELECT students.student_name
        FROM students
        WHERE students.student_id = :studentId";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':studentId', $studentId, PDO::PARAM_INT);
        $stmt->execute();
        $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmts = $pdo->prepare($query_student);
        $stmts->bindParam(':studentId', $studentId, PDO::PARAM_INT);
        $stmts->execute();
        $student = $stmts->fetchAll(PDO::FETCH_ASSOC);
        
        //$opts = $conn->query("SELECT * FROM opt_courses");

        // Display courses
        echo "<h1>Student name: {$student[0]['student_name']}";
        echo '<h2>profile no:'.$studentId.'</h2><br>';
        echo "<form action='./validate.php' method='POST'>";
        echo "<table>";
        echo "
        <tr>
            <td>
                Courses
            </td>
            <td>
                Code
            </td>
            <td>
                Credits
            </td>
            <td>
                Optional
            </td>
        </tr>";
        echo "<center><h1><b>Available Courses</b></h1></center>";
        
        foreach ($courses as $course) {
            $grp = $course['optional'];
            if($course['optional']==0){
            $grp = $course['course_name'];
            }
            
            echo "
            <tr>
                <td>
                    <strong>
                        {$course['course_name']}
                    </strong>
                </td>
                <td>
                    {$course['course_code']}
                </td>
                <td>
                    {$course['course_credit']}
                </td>".
                "<td><input type='radio' name='".$grp."' value='".$course["course_code"]."'>".
                "</tr>";
        }
        
        echo "</table>";
        echo "<center><input  type='submit' value='submit' class='btn-login' id='submit'></center></form>";
    
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
</body>
</html>
