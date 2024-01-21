<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <p>loading...</p>
    <?php
    include "./index.php"; 
    if($_SERVER['REQUEST_METHOD']=='GET'){
        header("location: ../available_course/index.php/?username=$global_StudentId", true);
    }
    
    exit();
    ?>