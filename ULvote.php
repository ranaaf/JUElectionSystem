<?php 
    $pageName = 'University Level Vote';
    include_once 'includes/dbh.inc.php';
    include_once "header.php";
    include_once "breadcrumbs.php"; 
?>
<?php
$selectStatus = "SELECT * FROM users WHERE usersId=1";
$status = mysqli_query($conn,$selectStatus);
$res = mysqli_fetch_assoc($status);
if($res['vote_status'] == "off"){
    header("location: vote.php");
}else{
    
    if(!isset($_SESSION['load'])){
        $duration="";
        $res = mysqli_query($conn,"SELECT time FROM duration");
        while($row = mysqli_fetch_array($res)){
            $duration=$row["time"];
        }
        $_SESSION['duration']=$duration;
        $_SESSION['start_time']=date("Y-m-d H:i:s");
        $end_time = $end_time=date('Y-m-d H:i:s', strtotime('+'.$_SESSION["duration"].'minutes',strtotime($_SESSION["start_time"])));
        $_SESSION["end_time"]=$end_time;
        $_SESSION['load']="once";
        $_SESSION['load']="loaded";
    }else{
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <style>
        #progress1 {
                display: flex;
                -webkit-flex-direction: column;
                -moz-flex-direction: column;
                -ms-flex-direction: column;
                flex-direction: column;
                justify-content: flex-start;
                margin-top: 1em;
                margin-left: 8em;
                margin-right: 8em;
                margin-bottom: 5em;
                border-radius: 0.3rem;
                box-shadow: 0 1px 2px 0 #d8d8d8, 0 0 0 1px #d8d8d8;
            }
            .ballot{
                text-align: center;
                margin: 10px;
                margin-left: 10em;
                padding: 5px;
                font-family:'Courier New', Courier, monospace;
            }

            .continuebtn{
                padding-top: 15px;
                padding-bottom: 15px;
                padding-left: 45px;
                padding-right: 45px;
                margin-top: 2em;
                margin-left: 44em;
                margin-bottom: 2em;
                border-color: #FF8002;
                background-color: #FF8002;
                color: #FFFFFF;
                box-shadow: 4px 4px 1px 0 rgb(38 45 52 / 20%), 0 0 0 0px rgb(38 45 52 / 20%);
            }
            .backbtn{
                padding: 12px 24px;
                margin-top: 2em;
                margin-left: 1em;
                margin-right: 20em;
                margin-bottom: 3em;
                border-color: #FF8002;
                background-color: #FF8002;
                color: #FFFFFF;
                box-shadow: 4px 4px 1px 0 rgb(38 45 52 / 20%), 0 0 0 0px rgb(38 45 52 / 20%);

            }
            .container .time_area .box{
            position: fixed;
            top: 40%;
            left: 1rem;
            transform: translateY(-50%);
            background: linear-gradient(135deg,#FF8002,#FF8002);
            width:200px;
            height: 100px;
            border-radius: 10px;
            padding: 0.5rem;
            z-index: 20;
        }
        .container .time_area .box h3{
        font-size: 20px;
        padding: 5px;
        color: #fff;
        }
        .container .time_area .box p{
            font-size:20px;
            color: #fff;
            text-align: center;
        }
    </style>
    <script>
        var interval = setInterval(function(){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","response.php",false);
        xmlhttp.send(null);
        // console.log(typeof(xmlhttp.responseText));
        if(xmlhttp.responseText == "-1"){
        clearInterval(interval);
        window.location = "autoDisable.php";
        }else{
            document.getElementById("response").innerHTML=xmlhttp.responseText;
        }
        },1000);
    </script>
</head>
<body>
<div id="progress1">
    <div class="col-sm-8 ballot ">
    <div class="container">
    <div class="time_area">
            <div class="box">
                <h3>Remaining time</h3>
                <p id="response"></p>
            </div>
        </div>
    </div>
    <div class="center">
        <h5> University Parties </h5>
        <p><strong>Select ONE choice.</strong> If you don't want to vote, select abstain.<br></p>
    </div>

        <?php

    // count distinct parties
    $sql0 = 'SELECT COUNT(DISTINCT(party) ) AS total FROM universitylevel_nominees;';
    $party_num = mysqli_query($conn,$sql0);
    $count = mysqli_fetch_array($party_num);
    $p_count = $count[0];

    // write query that will get the names and parties in an array
    $sql ='SELECT name,party FROM universitylevel_nominees ;';

    //make query and get result
    $result = mysqli_query($conn,$sql);

    //fetch resulting rows as an array
    $parties = mysqli_fetch_all($result,MYSQLI_NUM);

    $sql2 ="SELECT imgName FROM universitylevel_nominees";
    $resultt = mysqli_query($conn,$sql2);
    $imges = mysqli_fetch_all($resultt,MYSQLI_NUM);

    $i=0;$j=0;
    while ($i < count($parties))
    {
      while( $j < $p_count*6)
      {
    ?>
    <div>
    <form action="includes/ULvote.inc.php" method="post">
    <div class="align-middle">
    <div class="card mt-2" style="width:950px; margin-left:-3em">
        <div class="row no-gutters">
            <div class="col-sm-8">
                <div class="card-body">
                    <h5 class="card-title" >
                        <?php echo $parties[$j][1];
                        ?></h5>  
                        <div style="color:midnightblue;">
                   <p class="card" style="width:600px; display:inline-block;">
                   
                        <?php 
                         for($i = $j ; $i < $j+6 ; $i++)
                        {
                            echo $parties[$i][0]." ";?>
                            <img width="fit-content" height="100px" style="padding:2px 20px;border-radius: 23% ;" src="./includes/uploadsU/<?=$imges[$i][0]?>"/><?php
                        }
                        ?>
                       
                    </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-check mt-3 mb-3">
                    <input type="radio" name="CandVote" value="<?= $parties[$j][1] ?>" style="height:16px; width:16px; vertical-align: middle; margin-top: 6em" >
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php
     $j=$j+6;
      }
    }
      $NULL = "Abstained"; ?>  
        <div class="card mt-3" style="width: 950px;margin-left:-3em">
        <div class="row no-gutters">
            <div class="card-body ml-5">
                <h5 class="card-title" style="margin-right:-0.5em;">Abstain</h5>
                <p class="card-text" style="margin-right:-1em;">Don't Want to Vote</p>
            </div>
            <div class="col-sm-6">
            <div class="form-check mt-3 mb-5 mr-5">
                <label class="form-check-label" style="margin-top: 1em; margin-right: -12.8em">
                    <input type="radio" name="CandVote" value = "NULL" style="height:16px; width:16px; vertical-align: middle;">
                </label>
            </div>
            </div>
        </div>
    </div>
   
    <button type="submit" name="save_radio" class="continuebtn">Continue>></button>
   
</form>
    </div>
</div>
</div>
</body>

</html>
