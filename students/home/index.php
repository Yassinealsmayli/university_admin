<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<table border="5" id="studentInformationTable">
    <thead>
        <tr>
            <th colspan="14" style="text-align: center;">Personal Details</td>
        </tr>
    </thead>
    <thead>
    <tr>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    </tr>
</thead>
<tbody>
<?php
// Sample PHP code to fetch data from the database and populate the table
$host = '127.0.0.1';
$dbname = 'courses';
$user = 'root';
$password = '';
$iddb = new PDO("mysql:host=$host;dbname=my_data", $user);
    $idQuery = "SELECT id FROM mData where I = 1";
    $stmts = $iddb->prepare($idQuery);
    $stmts->execute();
    $s = $stmts->fetchAll(PDO::FETCH_ASSOC);
    $studentId=$s[0]["id"];
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM student_info where id = $studentId";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    echo '<a href="../../admins/home/StudentInformationForm.php">student registration</a>';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<span><br></span><center><a href='../available_courses/index.php'><input  type='submit' value='select courses' class='btn-login' id='submit'></a></center><span><br></span>";
        echo "<tr>";
        echo "<td>First Name</td><td>{$row['first_name']}</td>";
        echo "</tr><tr>";
        echo "<td>Father Name</td><td>{$row['father_name']}</td>";
        echo "</tr><tr>";
        echo "<td>Last Name</td><td>{$row['last_name']}</td>";
        echo "</tr><tr>";
        echo "<td>Birthdate</td><td>{$row['birthday_date']}</td>";
        echo "</tr><tr>";
        echo "<td>BirthPlace</td><td>{$row['place_of_birth']}</td>";
        echo "</tr><tr>";
        echo "<td>الجنسية</td><td>{$row['nationality']}</td>";
        echo "</tr><tr>";
        echo "<td>Gender</td><td>{$row['gender']}</td>";
        echo "</tr><tr>";
        echo "<td>رقم السجل</td><td>{$row['id_number']}</td>";
        echo "</tr><tr>";
        echo "<td>Phone numbers</td><td>{$row['phone_number']}</td>";
        echo "</tr><tr>";
        echo "<td>Home telephone numbers</td><td>{$row['second_phone_number']}</td>";
        echo "</tr><tr>";
        echo "<td>Your Main Place</td><td>{$row['place_of_occupation']}</td>";
        echo "</tr><tr>";
        echo "<td>محل القيد</td><td>{$row['place_of_registration']}</td>";
        echo "</tr><tr>";
        echo "<td>المحافظة</td><td>{$row['governorate']}</td>";
        echo "</tr><tr>";
        echo "<td>القضاء</td><td>{$row['judiciary']}</td>";
        echo "</tr>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
</tbody>
</table>
<table border="5">
<thead>
    <tr>
        <th colspan="14" style="text-align: center;">Univeraity Details</td>
    </tr>
</thead>
<thead>
    <tr>
        <td>student id</td>
        <td>University Year</td>
        <td>Major</td>
    </tr>
</thead>
<tbody>
<?php
// Sample PHP code to fetch data from the database and populate the table
$host = '127.0.0.1';
$dbname = 'courses';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM students where student_id = $studentId";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>{$row['student_id']}</td>";
        echo "<td>{$row['year']}</td>";
        echo "<td>{$row['major']}</td>";
        echo "</tr>";
        echo"</tbody></table>";
    }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    if(!session_id()) session_start();
    if(!isset($_SESSION['studentId'])) {
        $_SESSION['studentId'] = $studentId;
    }
    
?>

</body>
</html>
