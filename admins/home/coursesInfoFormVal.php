<!DOCTYPE html>
<body>
<?php 
$db_url="127.0.0.1";
$db_password="";
$db_username="root";
$db_name="courses";
$tabName="courses";
$profTabName="professors";
$profCourseTabName="professor_courses";

include './functions/myFunctions.php';

//establishing connection:
$dbc=connectServer($db_url, $db_username, $db_password);
createDB($dbc, $db_name);
selectDB($dbc, $db_name);

//create table
$createTabQuery="CREATE TABLE IF NOT EXISTS $tabName (
    code VARCHAR(5) primary key,
    title VARCHAR(255),
    ctype VARCHAR(255),
    dep VARCHAR(255),
    semester INT,
    prereq VARCHAR(255),
    coption INT,
    nbOfCrdts INT,
    maxNbOfStds INT)";

//create prof table query
$createProfTabQuery="CREATE TABLE IF NOT EXISTS $profTabName (
    profID INT AUTO_INCREMENT PRIMARY KEY,
    profName VARCHAR(255))";

//create prof table query
$createProfCourseTabQuery="CREATE TABLE IF NOT EXISTS $profCourseTabName (
    profID INT,
    code VARCHAR(5),
    FOREIGN KEY (profID) REFERENCES $profTabName(profID),
    FOREIGN KEY (code) REFERENCES $tabName(code))";


//creating the tables
createTable($dbc, $db_name,$createTabQuery, $tabName);
createTable($dbc, $db_name, $createProfTabQuery, $profTabName);
createTable($dbc, $db_name, $createProfCourseTabQuery, $profCourseTabName);
//insert infos via form
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $code=htmlspecialchars($_POST['code']);
    $title=htmlspecialchars($_POST['title']);
    $ctype=htmlspecialchars($_POST['ctype']);
    $dep=htmlspecialchars($_POST['dep']);
    $prof=htmlspecialchars($_POST['prof']);
    $semester=htmlspecialchars($_POST['semester']);
    $prereq=htmlspecialchars($_POST['prereq']);
    $coption=htmlspecialchars($_POST['coption']);
    $nbOfCrdts=htmlspecialchars($_POST['nbOfCrdts']);
    $maxNbOfStds=htmlspecialchars($_POST['maxNbOfStds']);


    //first make sure that all the fields are entered
    if(!empty($_POST['code']) && !empty($_POST['title']) && !empty($_POST['prof']) &&
        !empty($_POST['nbOfCrdts']) && !empty($_POST['maxNbOfStds'])){

            //if code exists in the initial table, return a bool if true
            $codeExistsBool = false;
            $codeExistsQuery="SELECT * FROM $tabName WHERE course_code='$code'";
            $codeExistsResult=mysqli_query($dbc, $codeExistsQuery);
            $CourseId = 0;
            $dbc=connectServer($db_url, $db_username, $db_password);
            selectDB($dbc, $db_name);
            $pdo = new PDO("mysql:host=$db_url;dbname=$db_name", $db_username, $db_password);
            $sqlMergeTables ="SELECT * FROM courses";
            $mergeTablesResult = $pdo->query($sqlMergeTables);
            $courses = $mergeTablesResult->fetchAll(PDO::FETCH_ASSOC);
                foreach($courses as $row){
                    if($row["course_id"]>=$CourseId){
                        $CourseId = $row["course_id"];
                    }
                }
                $CourseId++;
            if(mysqli_num_rows($codeExistsResult)){
                $codeExistsBool = true;
            } else {
                
                $insertCode = "INSERT INTO $tabName VALUES('$CourseId','$code', '$title','$nbOfCrdts','$coption', '$semester', '$dep' , '$maxNbOfStds')";
                insertDataToTab($dbc,$tabName, $insertCode);
            }

            //check if prof exists in the prof table
            $profExistsBool = false;
            $profExistsQuery="SELECT * FROM $profTabName WHERE prof_name='$prof'";
            $profExistsResult=mysqli_query($dbc, $profExistsQuery);
            $ProfId = 0;
            $dbc=connectServer($db_url, $db_username, $db_password);
            selectDB($dbc, $db_name);
            $pdo = new PDO("mysql:host=$db_url;dbname=$db_name", $db_username, $db_password);
            $sqlMergeTables ="SELECT * FROM professors";
            $mergeTablesResult = $pdo->query($sqlMergeTables);
            $profs = $mergeTablesResult->fetchAll(PDO::FETCH_ASSOC);
                foreach($profs as $row){
                    if($row["prof_id"]>=$ProfId){
                        $ProfId = $row["prof_id"];
                    }
                }
                $ProfId++;
            if(mysqli_num_rows($profExistsResult)){
                $profExistsBool = true;
            } else {
            
                $insertProf = "INSERT INTO $profTabName (prof_id,prof_name) VALUES('$ProfId','$prof')";
                insertDataToTab($dbc,$profTabName, $insertProf);
            }

            //check if prof teaches the code
                $checkProfQuery = "SELECT prof_id FROM $profTabName WHERE prof_name='$prof'";
                $data = mysqli_query($dbc,$checkProfQuery) or die(mysqli_error($dbc));
                $ProfIdResult = mysqli_fetch_row($data);
                if(!$codeExistsBool){
                    $insertProfidCode = "INSERT INTO $profCourseTabName VALUES('$ProfId', '$CourseId')";
                    insertDataToTab($dbc,$profCourseTabName, $insertProfidCode);
                    header("location: ./coursesInfoFormShow.php", true);
                }else{
                    echo "duplicated course";
                }
                    
            //close connection
            mysqli_close($dbc);
    }
}
else {
    echo "<h2 style = 'color: red'> submission error </h2>";
}

?>
</body>