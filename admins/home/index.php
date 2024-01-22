<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./form1.css">
    <style>
        body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
  margin: 0;
  padding: 0;
}

.container {
  width: 80%;
  margin: auto;
}

#tabs {
  margin-top: 20px;
}

#tabs button {
  padding: 10px;
  margin: 5px;
  cursor: pointer;
}

#studentInformationTable {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

#studentInformationTable th, #studentInformationTable td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

.btn-grp {
  display: flex;
}

.btn-grp input {
  margin-right: 5px;
}

/* Adjust as needed for your button styles */
.btn {
  padding: 8px;
  cursor: pointer;
}

.btn-secondary {
  background-color: #6c757d;
  color: #fff;
}

.btn-danger {
  background-color: #dc3545;
  color: #fff;
}

    </style>
</head>
<body>



    <div id="tabs">
        <button id="studentTabButton" onclick="showStudentInfo()" >Students</button>
        <button id="uniTabButton" onclick="showUniInfo()">Universities</button>
    </div>
    <header>
<nav><buton><a href="search.php">Search</a></buton></nav>
<a href="../add_page/">course information</a><br>
<a href="./StudentInformationForm.php">student registration</a>
</header>
<div id="studentInfoDiv" class="tab-content">
<table border="5" id="studentInformationTable">
    <thead>
        <tr>
            <th colspan="14" style="text-align: center;">Personal Details</th>
        </tr>
    </thead>
    <thead>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Father Name</th>
        <th>Last Name</th>
        <th>mother Name</th>
        <th>Birthdate</th>
        <th>BirthPlace</th>
        <th>nationality</th>
        <th>Gender</th>
        <th>civil Nnumber </th>
        <th>Phone number</th>
        <th>place_of_occupation</th>
        <th> place_of_registration</th>
        <th>governorate</th>
        <th>judiciary</th>
        <th>action</th>
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

    $query = "SELECT * FROM student_info";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
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
        echo '<td>';
        echo '<div class="btn-grp">';
        echo '<input type="button" class="btn btn-secondary" value="Edit" onclick="editRow(' . htmlspecialchars($row['id'], ENT_QUOTES) . ', \'' . htmlspecialchars($row['first_name'], ENT_QUOTES) . '\')">';
        echo '<input type="button" class="btn btn-danger" value="Delete" onclick="confirmDelete(' . htmlspecialchars($row['id'], ENT_QUOTES) . ', \'' . htmlspecialchars($row['first_name'], ENT_QUOTES) . '\')">';
        ?>
        
        <script>
            function editRow(id) {
                var sanitizedName = decodeURIComponent(name.replace(/\\+/g, ' ')); 
            // Redirect to the edit page with the ID parameter
            window.location.href = 'editRow.php?id=' + id;
        }
            function confirmDelete(id, name) {
                var sanitizedName = decodeURIComponent(name.replace(/\\+/g, ' ')); 
                if (confirm("Are you sure you want to delete " + sanitizedName + "?")) {
                    // Redirect to delete.php with the id parameter
                    window.location.href = "deleteRow.php?id=" + id;
                }
            }
        </script>
        
        <?php 
        echo '</div>';
        echo '</td>';
        

        echo "</tr>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
</tbody>
</table>
</div>
<div id="uniInfoDiv" class="tab-content" style="display: none;">
<table border="5" id="studentInformationTable">
<thead>
    <tr>
        <th colspan="14" style="text-align: center;">Univeraity Details</th>
    </tr>
</thead>
<thead>
    <tr>
        <th>student id</th>
        <th>University Year</th>
        <th>Major</th>
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

    $query = "SELECT * FROM students";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>{$row['student_id']}</td>";
        echo "<td>{$row['year']}</td>";
        echo "<td>{$row['major']}</td>";
        echo "</tr>";
    }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        }
        // Check if a search query is submitted
        ?>
</tbody>
</table>
</div>
<script>
function showStudentInfo() {
document.getElementById("studentInfoDiv").style.display = "block";
document.getElementById("uniInfoDiv").style.display = "none";
}


function showUniInfo() {
document.getElementById("studentInfoDiv").style.display = "none";
document.getElementById("uniInfoDiv").style.display = "block";
}

    </script>
</body>
</html>
