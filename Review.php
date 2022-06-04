<?php 

    $pageName = 'Review Vote';
    include_once 'includes/dbh.inc.php';
    include_once "header.php";
    include_once "breadcrumbs.php"; 
    $useruid = $_SESSION["useruid"];

?>
<!DOCTYPE html>
<html>
<head>
<style>
    .row
    {
        margin:auto;
        width:100%;
        color:#2e4357;
        align-items: center;     
    }
    p
    {
        font-size:x-large;
    }
    .box
    {
        text-align: center;
        padding-top: 2px;
        padding-bottom:5px;
        font-family:'Courier New', Courier, monospace;
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
    .banner
    {
        font-family:'Courier New', Courier, monospace;
        border-style:solid;
        border-color: #FF8002;
        border-radius: 0.3rem;
        background-color:transparent;
        color: black;
    }
    .R
    {
        float:left;
        width:50%;
        justify-content: center;   
    }
    .tif
    {
        border-style:solid;
        border-color: #FF8002;
        border-radius: 0.3rem;
        background-color:transparent;
        width:50%;
    }
    .Rbutton
    {
        width:50%;
        padding: 12px 24px;
        margin-top: 1em;
        margin-left: 18em;
        margin-bottom: 1em;
        border-color: #FF8002;
        background-color: #FF8002;
        color: #FFFFFF;
        box-shadow: 4px 4px 1px 0 rgb(38 45 52 / 20%), 0 0 0 0px rgb(38 45 52 / 20%);
    }
    .container .time_area .box{
            position: fixed;
            top: 40%;
            left: -6rem;
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
      <?php
        $sqlStudent = "SELECT CandNameVote FROM vote_faculty WHERE useruid = '$useruid';";
        $resultData1 = mysqli_query($conn, $sqlStudent)or die("Querry Unsuccessfull".mysqli_error($conn));
        $resultCheck = mysqli_num_rows($resultData1);
        $r1= mysqli_fetch_array($resultData1);
        $sqlVoted = "SELECT CandNameVote FROM vote_Uni WHERE useruid = '$useruid';";
        $resultData2 = mysqli_query($conn, $sqlVoted)or die("Querry Unsuccessfull".mysqli_error($conn));
        $r2= mysqli_fetch_array($resultData2);
      ?>
    <div class="row">
        <div class="d-grid m-3 col-10 mx-auto banner">
        <div class="container">
    <div class="time_area">
            <div class="box">
                <h3>Remaining time</h3>
                <p id="response"></p>
            </div>
        </div>
    </div>
        <p align = "center" size="5"><strong> Review Your Vote and Submit <br/></p>
        <p align = "center" size="5"><string> Your Choice :</p>
        </div>
    </div>   

    <div class="box">
    <div class="d-grid m-3 col-12 ">
        <div class="container mt-5 mb-2 R">
        <font align = "center" size="5">Faculty Level Choice:</font>
        <h4 class="d-grid m-3 col-6 mx-auto tif"><?php if($_SESSION["facultyVote"] == "NULL"){ echo 'Abstained';} else {echo $_SESSION["facultyVote"];}  ?></h4>        </div>
         
        <div class="container mt-5 mb-4 R">
        <font align = "center" size="5">University Level Choice:</font>
        <h4 class="d-grid m-3 col-6 mx-auto tif"><?php if($_SESSION["uniVote"] == "NULL"){ echo 'Abstained';} else {echo $_SESSION["uniVote"];} ?></h4>
        </div>
    </div>

    <div class="d-grid m-3 col-9">
    <form action="includes/Review.inc.php" method="post">
    <button type="submit" name="clearVote" class="Rbutton">Re-Vote</button>
    </form>
    <form action="includes/Review.inc.php" method="post">
    <input type="hidden" name ="submitvote" value="checker()">
    <button onclick="checker()" type="submit" name="submitVote" class="Rbutton">Submit My Vote</button>
    </form>
    
    </div>
    </div>
    <script>
        function checker()
        {
            var result = confirm ('Are you sure you want to submit your vote? \n You will not be able to access the voting page again!');
            if(result == false){
                event.preventDefault();}
            else{
                return"TRUE";
            }
        }    
    </script>
</body>

</html>

