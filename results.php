<?php
  $pageName = 'Results';
  include_once 'includes/dbh.inc.php';
?>
<?php 
function binary_search(array $arr, $length , $x)
{
  $left = 0 ; $right = $length-1;

  while($left <= $right)
  {
    if($length == 1)
    return -1;

    if($x > $arr[$right])
    return intval($right);

    $mid = ($left+$right)/2;

    if($mid == $length-1 &&  ($x > $arr[$mid] || $arr[$mid] > $x && $x > $arr[$mid-1]))
    return intval($mid);

    if( $mid > 0 && ($arr[$mid] == $x || $arr[$mid-1] < $x && $x < $arr[$mid]))
    return intval($mid-1);

    if($arr[$mid] < $x)
    {
      $left = $mid + 1;
    }

    else 
    $right = $mid - 1;

  }
return -1;
}
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
 <style>
    .header{
    width: 100%;
    height: 350vh;
    background: #e2e9f7;
}
  </style>
  <body>

  <!--  Navbar  -->
  <div class="header">
    <div class="side-nav">
      <a class="logo" href="#">
        <img src="./img/logo.png" width="90%" height="80%">
      </a>
      <ul class="nav-links">
        <li><a href="admin.php"><i class="fas fa-house-chimney-user"></i><p>Dashboard</p></a></li>
        <li><a href="results.php"><i class="fas  fa-square-poll-vertical"></i><p>Results</p></a></li>
        <li><a href='includes/logout.inc.php'><i class="fas fa-arrow-right-from-bracket"></i><p>Log Out</p></a></li>
        <div class="active"></div>
      </ul>
    </div>
  </div>
    <!-- Navbar -->
    <main>
    

  <?php
    $sqlUNI ="SELECT CandNameVote,
    COUNT(CandNameVote)/ (SELECT COUNT(useruid) FROM Vote_uni WHERE NOT (CandNameVote = 'Abstained') )
    as count From Vote_uni WHERE NOT (CandNameVote = 'Abstained')  GROUP BY CandNameVote;";
    $resultDataUNI = mysqli_query($conn, $sqlUNI)or die("Querry Unsuccessfull".mysqli_error($conn));
    $UNIarray = mysqli_fetch_all($resultDataUNI,MYSQLI_NUM);


    $UNIvoted = "SELECT count(useruid) FROM Vote_uni WHERE NOT (CandNameVote = 'Abstained') ;";
    $votedresult3 = mysqli_query($conn, $UNIvoted) or die("Querry Unsuccessfull".mysqli_error($conn));
    $UNIvoted = mysqli_fetch_array($votedresult3);

    $votes = $UNIvoted[0];
    $loser_percentage = $votes * 0.08;

    for($i = 0 ; $i < count($UNIarray) ; $i++)
    {
      $percentageUNI[] = $UNIarray[$i][1];
    }

    sort($percentageUNI);

    $length = count($percentageUNI);
    $eliminated = binary_search($percentageUNI,$length,$loser_percentage);

    if ($eliminated == -1)
    {
      $slice_left = 0 ; $slice_right = $length-1;
    }
    else
    {
      $slice_left = 0 ; $slice_right = $eliminated;
    }
    $percentageUNI = array_splice($percentageUNI, 0 , $eliminated + 1);


    // a loop on the array so we can calculate the percentage of places 

    $winnersUNI = array();
    for($i = 0 ; $i < count($UNIarray) ; $i++)
    {
      if (in_array($UNIarray[$i][1],$percentageUNI))
      {
        $wins = $UNIarray[$i][1] * 9;
        $winnersUNI[$UNIarray[$i][0]] = $wins;
      }
      
    }
    arsort($winnersUNI);
  ?>
  <div class="content">
  <div class="col-md-6">
    <h3>University Level</h3>
    <h6>
    <?php
      foreach ($winnersUNI as $key => $value )
      {
        $party = $key;
        $seats = round($value);
        $Qquery = "SELECT name FROM universitylevel_nominees WHERE party LIKE '$party';"; 
        $result = mysqli_query($conn,$Qquery);
        $result3 = mysqli_fetch_all($result,MYSQLI_NUM);
        echo " <br> ";
        echo 'Winner Party: '.$party.'<br>';
        echo' Students: ';
        
        
        for($x = 0 ; $x < $seats ; $x++)
        {
          echo $result3[$x][0];
          echo ' ';
        }
      }
  ?>
  </h6>
  </div>
  <div class="col-md-6">
  <h5><?php   echo $UNIvoted[0] ;  ?> Students Voted </h5>
  <span><i class="fa fa-check-circle" aria-hidden="true" style="padding-bottom: 25px;  width: 50px;
  height: 60px; margin: 0 6px;"></i></span>
  </div>
</div>
</div>



<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<div id="chartContainer"  style="width: 80%; height: 350px;display:inline;margin: 0 3%; "></div> <br>
<div id="UNI"  style="width: 80%; height: 350px;display: inline;margin: 0 3%;"></div><br>
<?php

    $sqlKASIT ="SELECT CandNameVote,
    COUNT(CandNameVote)/ (SELECT COUNT(useruid) FROM Vote_faculty WHERE NOT (CandNameVote = 'Null') && faculty = 'kasit')
    as count From Vote_faculty WHERE NOT (CandNameVote = 'Null') && faculty = 'kasit' GROUP BY CandNameVote;";
    $resultDataIT = mysqli_query($conn, $sqlKASIT)or die("Querry Unsuccessfull".mysqli_error($conn));
    $KASITarray = mysqli_fetch_all($resultDataIT,MYSQLI_NUM);


    $ITvoted = "SELECT count(useruid) FROM Vote_faculty WHERE NOT (CandNameVote = 'Null') && faculty = 'Kasit';";
    $votedresult = mysqli_query($conn, $ITvoted) or die("Querry Unsuccessfull".mysqli_error($conn));
    $KASITvoted = mysqli_fetch_array($votedresult);
    
    $votes = $KASITvoted[0];
    $loser_percentage = ($votes/10) * 0.08;

      for($i = 0 ; $i < count($KASITarray) ; $i++)
      {
        $percentage[] = $KASITarray[$i][1] ;
      }

      sort($percentage);

      $length = count($percentage);
      $eliminated = binary_search($percentage,$length,$loser_percentage);

      if ($eliminated == -1)
      {
        $slice_left = 0 ; $slice_right = $length-1;
      }
      else
      {
        $slice_left = 0 ; $slice_right = $eliminated;
      }
    $perecntage = array_splice($percentage, 0 , $eliminated + 1);


    // a loop on the array so we can calculate the percentage of places 


    $winnersK = array();
for($i = 0 ; $i < count($KASITarray) ; $i++)
{
  if (in_array($KASITarray[$i][1],$percentage))
  {
    $wins = $KASITarray[$i][1] * 3;
    $winnersK[$KASITarray[$i][0]] = $wins;
  }
}
arsort($winnersK);

    ?>

<div class="content">
<div class="col-sm-6">
  <h3>KASIT</h3>
    <h6>
    <?php 
      foreach ($winnersK as $key => $value )
      {
        $party = $key;
        $seats = round($value);
        $Qquery = "SELECT name FROM facultylevel_nominees WHERE party LIKE '$party';"; 
        $result = mysqli_query($conn,$Qquery);
        $result2 = mysqli_fetch_all($result,MYSQLI_NUM);
        echo 'Winner Party : '.$party.'<br>';
        echo' Students : ';
        
        
        for($x = 0 ; $x < $seats ; $x++)
        {
          echo $result2[$x][0];
          echo '<br>';
        }
      }
  ?>
  </h6>
  </div>
<div class="col-sm-6">

  <h5><?php   echo $KASITvoted[0] ;  ?> Students Voted </h5>
  <span><i class="fa fa-check-circle" aria-hidden="true" style="padding-bottom: 25px;  width: 50px;
  height: 60px; margin: 0 6px;"></i></span>
  </div>
</div>

<?php 
    $sqlEng ="SELECT CandNameVote,
    COUNT(CandNameVote)/ (SELECT COUNT(useruid) FROM Vote_faculty WHERE NOT (CandNameVote = 'Null') && faculty = 'Engineering')
    as count From Vote_faculty WHERE NOT (CandNameVote = 'Null') && faculty = 'Engineering' GROUP BY CandNameVote;";
    $resultDataENG = mysqli_query($conn, $sqlEng)or die("Querry Unsuccessfull".mysqli_error($conn));
    $ENGarray = mysqli_fetch_all($resultDataENG,MYSQLI_NUM);



    $Engvoted = "SELECT count(useruid) FROM Vote_faculty WHERE NOT (CandNameVote = 'Null') && faculty = 'Engineering';";
    $votedresult2 = mysqli_query($conn, $Engvoted) or die("Querry Unsuccessfull".mysqli_error($conn));
    $ENGvoted = mysqli_fetch_array($votedresult2);

    $votes = $ENGvoted[0];
    $loser_percentage = ($votes/10) * 0.08;

    for($i = 0 ; $i < count($ENGarray) ; $i++)
    {
      $percentageENG[] = $ENGarray[$i][1];
    }

    sort($percentageENG);

    $length = count($percentageENG);
    $eliminated = binary_search($percentageENG,$length,$loser_percentage);

    if ($eliminated == -1)
    {
      $slice_left = 0 ; $slice_right = $length-1;
    }
    else
    {
      $slice_left = 0 ; $slice_right = $eliminated;
    }
    $percentageENG = array_splice($percentageENG, 0 , $eliminated + 1);


    // a loop on the array so we can calculate the percentage of places 

    $winnersEng = array();
    for($i = 0 ; $i < count($ENGarray) ; $i++)
    {
      if (in_array($ENGarray[$i][1],$percentage))
      {
        $wins = $ENGarray[$i][1] * 3;
      }
      $winnersEng[$ENGarray[$i][0]] = $wins;

    }
    arsort($winnersEng);

  ?>
<div class="content">
<div class="col-md-6">
  <h3>Engineering</h3>
    <h6>
    <?php 
  foreach ($winnersEng as $key => $value )
  {
    $party = $key;
    $seats = round($value);
    $Qquery = "SELECT name FROM facultylevel_nominees WHERE party LIKE '$party';"; 
    $result = mysqli_query($conn,$Qquery);
    $result2 = mysqli_fetch_all($result,MYSQLI_NUM);
    echo 'Winner Party : '.$party.'<br>';
    echo' Students : ';

    for($x = 0 ; $x < $seats ; $x++)
    {
      echo $result2[$x][0];
      echo '<br>';
    }
  }
    ?></h6>
</div>
  <div class="col-md-6">
  <h5><?php   echo $ENGvoted[0] ;  ?> Students Voted </h5>
  <span><i class="fa fa-check-circle" aria-hidden="true" style="padding-bottom: 25px;  width: 50px;
  height: 60px; margin: 0 6px;"></i></span>
</div>
</div>

 
<?php
 
$dataPoints = array(
	array("label"=> "KASIT", "y"=> $KASITvoted[0]),
	array("label"=> "Engineering","y"=> $ENGvoted[0])
);

?>
<?php
 
 $yk = array();
 $xk=array();
 for($j = 0 ; $j < count($KASITarray); $j++)
  {
    $xk[$j] = $KASITarray[$j][1]; // numbers
    $yk[$j]= $KASITarray[$j][0]; //labels
  }
  $KASITGRAPH = array( 
    array("y" => $xk[0], "label" => $yk[0]),
    array("y" => $xk[1],"label" => $yk[1] ),
    array("y" => $xk[2],"label" => $yk[2] )
  );
 ?>

<?php
 $y = array();
 $x=array();
 for($j = 0 ; $j < count($UNIarray); $j++)
  {
    $x[$j] = $UNIarray[$j][1]; // numbers
    $y[$j]= $UNIarray[$j][0]; //labels
  }
  $dataPoints2 = array(
    array("y" => $x[0],"label" => $y[0]),
    array("y" => $x[1],"label" => $y[1]),
    array("y" => $x[2],"label" => $y[2])
  );

?>

<?php
 $yE= array();
 $xE=array();
 for($j = 0 ; $j < count($ENGarray); $j++)
  {
    $xE[$j] = $ENGarray[$j][1]; // numbers
    $yE[$j]= $ENGarray[$j][0]; //labels
  }
  $ENGgraph = array(
    array("y" => $xE[0], "label" => $yE[0]),
    array("y" => $xE[1],"label" => $yE[1] ),
    array("y" => $xE[2],"label" => $yE[2] )
  );

?>

<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Number Of Student Voted"
	},
	axisY:{
		includeZero: true
	},
  data: [{
		type: "pie",
		yValueFormatString: "#",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});

var chart1 = new CanvasJS.Chart("UNI", {
	animationEnabled: true,
	exportEnabled: true,
	title:{
		text: "Each Party Percentage",
    fontSize: 25,
    fontWeight:"normal",
    margin: 5,
    padding: 10,
	},
  
	axisY: {
		title: "Percentage",
    tickLength: 10,
		includeZero: true,
    labelAutoFit: true,
    margin: 25,
    padding: 15,
 
	},
	data: [{
		type: "bar",
		yValueFormatString: "#%",
		indexLabel: "{label} ({y})",
		indexLabelPlacement: "inside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
var chart2 = new CanvasJS.Chart("KASIT", {
	animationEnabled: true,
	exportEnabled: true,
	title:{
		text: "KASIT Parties Percentage",
    fontSize: 25,
    fontWeight:"normal",
    margin: 5,
    padding: 10,
	},
  
	axisY: {
		title: "Percentage",
    tickLength: 10,
		includeZero: true,
    labelAutoFit: true,
    margin: 25,
    padding: 15,
 
	},
	data: [{
		type: "bar",
		yValueFormatString: "#%",
		indexLabel: "{label} ({y})",
		indexLabelPlacement: "inside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($KASITGRAPH, JSON_NUMERIC_CHECK); ?>
	}]
});
var chart3 = new CanvasJS.Chart("ENG", {
	animationEnabled: true,
	exportEnabled: true,
	title:{
		text: "Engineering Parties Percentage",
    fontSize: 25,
    fontWeight:"normal",
    margin: 5,
    padding: 10,
	},
  
	axisY: {
		title: "Percentage",
    tickLength: 10,
		includeZero: true,
    labelAutoFit: true,
    margin: 25,
    padding: 15,
 
	},
	data: [{
		type: "bar",
		yValueFormatString: "#%",
		indexLabel: "{label} ({y})",
		indexLabelPlacement: "inside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($ENGgraph, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
chart1.render();
chart2.render();
chart3.render();
}
</script>

<div id="KASIT"  style="width: 80%; height: 350px;display: inline;margin: 0 3%;"></div><br>

<div id="ENG"  style="width: 80%; height: 350px;display: inline;margin: 0 3%;"></div>

      
    </main>

  </body>

</html>
