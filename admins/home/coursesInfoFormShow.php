<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');

        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h1, h2 {
    color: #333;
}

form {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 8px;
}

input {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4caf50;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

button{
    background-color: #4caf50;
    color: #fff;
    cursor: pointer;
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    box-sizing: border-box;
}
button:hover {
    background-color: #45a049;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #4caf50;
    color: #fff;
}

</style>
</head>
    <body>
        <?php 
        session_start();

        

        $db_url="127.0.0.1";
        $db_password="";
        $db_username="root";
        $db_name="courses";
        $tab_name="courses";
        $prof_tab_name="professors";
        $prof_course_tab_name="professor_courses";
        
        include './functions/myFunctions.php';
        function getTable($db_url, $db_username, $db_password,$db_name,$table_name) {
            $dbc=connectServer($db_url, $db_username, $db_password);
            selectDB($dbc, $db_name);
            $pdo = new PDO("mysql:host=$db_url;dbname=$db_name", $db_username, $db_password);
            $sqlMergeTables ="SELECT * FROM $table_name";
            $mergeTablesResult = $pdo->query($sqlMergeTables);
            return $mergeTablesResult->fetchAll(PDO::FETCH_ASSOC);
        }
        //establishing connection:
        $courses = getTable($db_url, $db_username, $db_password,$db_name,$tab_name);

                if (!empty($courses)) {

                    
                    $profs = getTable($db_url, $db_username, $db_password,$db_name,$prof_tab_name);
                    $profs_courses = getTable($db_url, $db_username, $db_password,$db_name,$prof_course_tab_name);
                    // Display  data
                    echo '<table border="1">';
                    echo '<tr><th>Code</th><th>Title</th><th>Dep</th><th>Semester</th><th>Coption</th><th>NbOfCrdts</th><th>MaxNbOfStds</th><th>profName</th></tr>';
                    foreach ($courses as $row) {
                        $prof_id = 0;
                        $prof_name = "";
                        foreach($profs_courses as $pc){
                            if($row["course_id"]==$pc["course_id"]){
                                $prof_id = $pc["prof_id"];
                                break;
                            }
                        }
                        foreach($profs as $prof){
                            if($prof_id==$prof["prof_id"]){
                                $prof_name = $prof["prof_name"];
                                break;
                            }
                        }
                        $opt = ($row['optional'])?'Yes':'No';
                        echo '<tr>';
                        echo '<td>' . $row['course_code'] . '</td>';
                        echo '<td>' . $row['course_name'] . '</td>';
                        echo '<td>' . $row['departement'] . '</td>';
                        echo '<td>' . $row['semester'] . '</td>';
                        echo '<td>' . $opt . '</td>';
                        echo '<td>' . $row['course_credit'] . '</td>';
                        echo '<td>' . $row['maxStudent'] . '</td>';
                        echo '<td>' . $prof_name . '</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                } else {
                    echo 'Session data not found.';
                }
        ?>
    </body>
</html>