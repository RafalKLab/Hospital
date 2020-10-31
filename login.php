<?php
  session_start();
  $_SESSION['message']="";
  if($_SERVER['REQUEST_METHOD']=='POST')
  {
   
    require_once "connect.php";
    $mysqli = new mysqli($host,$db_user,$db_password, $db_name);

    $email = $mysqli->real_escape_string($_POST['email']);
    $password = md5($_POST['password']); //hashing md5 pass

    //trying to connect to DB and select users with email(email is unique)
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    if($result = $mysqli->query($sql))
    {
      $how_many_users = $result->num_rows;
      if($how_many_users>0)
      {
        $row=$result->fetch_assoc();
        
        $_SESSION['username']=$row['username'];
        $_SESSION['email']=$row['email'];
        $_SESSION['avatar']=$row['avatar'];
        
        
        header('Location: main.php');

        $result->close();
      }
      else
      {
        $_SESSION['message']="Neteisingas slaptazodis!";
      }

    }else
    {
      $_SESSION['message']="Problema su DB!";
    }
    



  }

?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Main</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">
<form action="login.php" method="POST" enctype="multipart/form-data">

<div class="alert"><?=$_SESSION['message'] ?></div>

<br> <input type="email" value="" name="email" placeholder="E-mail" required > <br>

<br> <input type="password" name="password" placeholder="Slaptazodis" required > <br>

<br> <input type="text" name="key" placeholder="Gydytojo raktas"> <br>

<br><input type="submit" value="Prisijungti" name="submit"/>

</form>
Neturi paskyros ? <a href="register.php">Registruokis!</a>
</div>




</body>
</html>