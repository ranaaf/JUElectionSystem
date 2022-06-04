<?php
  $pageName = 'Adminstration';
  include_once 'includes/dbh.inc.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Election</title>
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
    <link rel="stylesheet" href="./css/admin.css">
    <!-- access to all fonts and icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="https://kit.fontawesome.com/0190ce0c4d.js" crossorigin="anonymous"></script>

  </head>
  <body>

  <!--  Navbar  -->
  <div class="header">
    <div class="side-nav">
      <a class="logo" href="#">
        <img src="./img/logo.png" width="90%" height="80%">
      </a>
      <ul class="nav-links">
        <li><a href="#"><i class="fas fa-house-chimney-user"></i><p>Dashboard</p></a></li>
        <li><a href="results.php"><i class="fas  fa-square-poll-vertical"></i><p>Results</p></a></li>
        <li><a href='includes/logout.inc.php'><i class="fas fa-arrow-right-from-bracket"></i><p>Log Out</p></a></li>
        <div class="active"></div>
      </ul>
    </div>
  </div>

    <main>
      <?php
        $sqlStudent = "SELECT COUNT(usersid) FROM users WHERE level='user';";
        $resultData1 = mysqli_query($conn, $sqlStudent)or die("Querry Unsuccessfull".mysqli_error($conn));
        $resultCheck = mysqli_num_rows($resultData1);
        $r1= mysqli_fetch_array($resultData1);
        $sqlVoted = "SELECT COUNT(usersid) FROM users WHERE vote='DONE';";
        $resultData2 = mysqli_query($conn, $sqlVoted)or die("Querry Unsuccessfull".mysqli_error($conn));
        $r2= mysqli_fetch_array($resultData2);
      ?>
     
     <div class="content">
          <div class="col-sm-6">
          <h3>Number of Students</h3>
          <h3><?php echo $r1[0] ; ?> <span><i class="fa fa-users" aria-hidden="true"></i></span></h3>
          </div>
          
          <div class="col-sm-6">
          <h3>Number of Voted Students</h3>
          <h3><?php   echo $r2[0] ; ?>
          <span><i class="fa fa-check-circle" aria-hidden="true"></i></span></h3>
          </div>
     </div>
     <div class="content">
     <div class="box">
        <p style="color: #3D5AFE;font-size: 1.2rem; font-weight: bold; text-align: center; padding: 5px;">
        <?php if (isset($_SESSION['message'])) {
          echo $_SESSION['message'];
          unset($_SESSION['message']);
          }
        ?></p>
        <h3><?php if ($_SESSION["votestat"] == 'on') {
          echo "Voting Control";
        } else {
        echo "Give access for voting";
        } ?>
        </h3>
        <div class="checkbox">
          <form method="post" action="
          <?php if ($_SESSION["votestat"] == 'on') {
          echo "includes/disablestatus.inc.php";
          } else {
            echo "includes/updatestatus.inc.php";
            }  ?>">
          <button class="btn" style="padding:15px 8px;">
            <?php if ($_SESSION["votestat"] == 'on') {
              echo "Stop Voting Process";
            } else {
              echo "Start Voting Process";
            }
            ?></button>
            </form>
          </div>
        </div>
      
    </main>          
  </body>
</html>