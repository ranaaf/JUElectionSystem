    <?php
    //ERROR MESSAGES 
    require_once('functions2.inc.php');
    
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
            echo'<script> alert("Fill in All Fields!!")</script>';
        }
    }
    if(isset($_GET["error"])){
        if($_GET["error"] == "invalidid"){
            echo'<script> alert("Enter Proper Student ID !\n Proper Student ID consist of 7 digits")</script>';
        }
    
    }
    if(isset($_GET["error"])){
        if($_GET["error"] == "stmtfailed"){
            echo'<script>alert("something went wrong!! try again")</script>';
        }
    }

    if(isset($_GET["error"])){
        if($_GET["error"] == "none"){
            echo'<script>alert("You have successfully nominated your party!!\n Thank you")</script>';
        }
    }

    if(isset($_GET["error"])){
        if($_GET["error"] == "partyalreadyexists"){
            echo'<script> alert("PARTY NAME ALREADY TAKEN")</script>';
        }
    
    }

    if(isset($_GET["error"])){
        if($_GET["error"] == "alreadynominated1"){
            echo'<script> alert("First Student is already nominated!!")</script>';
        }
    
    }

    if(isset($_GET["error"])){
        if($_GET["error"] == "alreadynominated2"){
            echo'<script> alert("Second Student is already nominated!!")</script>';
        }
    
    }

    if(isset($_GET["error"])){
        if($_GET["error"] == "alreadynominated3"){
            echo'<script> alert("Third Student is already nominated!!")</script>';
        }
    
    }
    if(isset($_GET["error"])){
        if($_GET["error"] == "alreadynominated4"){
            echo'<script> alert("Fourth Student is already nominated!!")</script>';
        }
    
    }
    if(isset($_GET["error"])){
        if($_GET["error"] == "alreadynominated5"){
            echo'<script> alert("Fifth Student is already nominated!!")</script>';
        }
    
    }
    if(isset($_GET["error"])){
        if($_GET["error"] == "alreadynominated6"){
            echo'<script> alert("Sixth Student is already nominated!!")</script>';
        }
    
    }
?>
