<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header('Location: index.php');
		exit();
  }

?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Main page</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="style.css">

</head>

<body>


 
 
    
<div class="content">

  <div class="nav"><h1>Nav</h1></div>

  <div class="searchbox">
    <h3>Gydytojų paieška</h3>
    <form method="POST" enctype="multipart/form-data">

      <div class="alert"><?=$_SESSION['message'] ?></div>

      <br> <input type="text" name="" placeholder="Vardas"> <br>

      <br> <input type="text" name="" placeholder="Pavarde"> <br>
      
      <br> <input type="text" name="key" placeholder="Profesija"> <br>

      <br><input type="submit" value="Ieškoti" name="submit"/>

    </form>

  </div>

  <div class="results">
   <H2>Paieškos rezultatai</H2>

  </div>  
  
  <div class="personal">
    Sveikas prisijunges <?= $_SESSION['username'] ?>
    <br>Email: <?= $_SESSION['email'] ?>
    <img src='<?= $_SESSION['avatar'] ?>' alt="">
   <br> <a href="logout.php">Atsijungti</a> 
  </div>

  <div style="clear:both;"></div>


  
</div>


</body>
</html>