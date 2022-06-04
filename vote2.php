<?php
   include_once "header.php";

    $message="";
    $selectStatus = "SELECT * FROM users WHERE usersId=1";
    $status = mysqli_query($conn,$selectStatus);
    $res = mysqli_fetch_assoc($status);
    if($res['vote_status'] == "on"){
        $message="Voting Started";
    }else{
        $message="Not started yet";
    }
?>
<head>
<link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="container">
        <div class="box">
            <span style="font-size: 1rem;color: green; margin-bottom: 1rem; font-weight: bold;">
        <?php  if(isset($_SESSION['message'])){
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        } ?>
        </span>
            <h6 style="font-size: 1.4rem;color: orange; padding: .6rem 20px; background:#311B92; margin-bottom: 1rem; display: block; border-radius: 4px; "><?php echo $message ?></h6><br>
            <h3>Vote For Your Next Student Union</h3>
            <p></p>
           <!-- <form method="post"> -->
           <?php
           if ($res['vote_status'] == "on") {
               echo '<a href="FLvote2.php"><button name="vote">Click to Vote</button></a>';
           }
           else
           {
               echo '<a href="vote2.php"><button name="vote">Click to Vote</button></a>';
           }
           ?>
           
           <!-- </form> -->
        </div>
    </div>
</body>
</html>
