<?php
   include_once "includes/dbh.inc.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <title>
      <?php if(isset($pageName)){
        echo $pageName;
        } else {
          echo "Election";
        }
        ?>
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Google Fonts -->  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  
    <!-- Custom css -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- access to all fonts and icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">    </head>
  <body>


  <!--  Navbar  -->
  <header>
 
        <nav class="navbar navbar-expand-lg navbar-dark ">
        <img src="./img/JUlogo.png" alt="JU Logo" width="42" height="45" style="vertical-align:middle;margin:10px 10px">
          <a class="navbar-brand" href="index.php">JU Election System</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav__li"><a class="nav__a" href="index.php">Home<span class="sr-only"></span></a></li>
              <li class="nav__li"><a class="nav__a" href="Nominees/nominees.php">Nominees</a></li>
              <li class='nav__li'><a class='nav__a' href='nominateyourself.php'>Nominate Yourself</a></li>
              <?php
                if(isset($_SESSION["useruid"]) && ($_SESSION['level']=='user') && ($_SESSION['vote']== 'NULL')){
                  echo " <li class='nav__li'><a class='nav__a' href='vote2.php'>Vote</a></li>";
                  echo "<li class='nav__li'><a class='nav__a' href='includes/logout.inc.php'>Log Out</a></li>";
                }
                elseif (isset($_SESSION["useruid"]) && ($_SESSION['level']=='user') && ($_SESSION['vote']== "DONE")){
                  echo " <li class='nav__li'><a class='nav__a' href='vote.php'>Vote</a></li>";
                  echo "<li class='nav__li'><a class='nav__a' href='includes/logout.inc.php'>Log Out</a></li>";
                  
                }
                else{
                  echo "<li class='nav__li'><a class='nav__a' href='login.php'>Log In</a></li>";}
              ?>
            </ul>
          </div>
        </nav>
  </header>
    <!--  Navbar  -->
  </body>
</html>