<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Lebanese university</title>
  <link href="https://fonts.googleapis.com/css?family=Assistant:400,700" rel="stylesheet"><link rel="stylesheet" href="./style.css">
  <style>
    .ad-link{
      color:#ABCDEF;
      text-decoration: none;
      padding:5px;
      margin:5px;
    }

    #spacing{
      size: 10px;
    }
  </style>
</head>
<body>
<section class='login' id='login'>
  <div class='head'>
  <h1 class='company'>Lebanese University</h1>
  </div>
  <p class='msg'>student info</p>
  <div class='form'>
    <form dir="rtl" action="./validate.php" method="POST">
  <input type="text" dir="rtl"  placeholder='رقم الملف' class='text' id='username' name="username" required><br>
  <input type="password" dir="rtl" placeholder='الرقم السري' class='password' name='password'><br>
  <a dir="ltr" class="ad-link" href="../admins/index.php">login as administrator</a>
  <div id="spacing"><br></div>
  <center><input  type="submit" value="login" class='btn-login' id='login'></center>
    </form>
  </div>
</section>
</body>
</html>
