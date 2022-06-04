<?php 
    
    function setActive($name = 'home'){
        global $pageName;
        if(isset($pageName) && $pageName == $name)
        {
            echo "class = 'breadcrumbs__link breadcrumbs__link--active'";
        }

    }
?>
<!doctype html>
<html lang="en">
  <head>
    <title><?php if(isset($pageName)) {echo $pageName; } ?></title>
    <style>
        #progress {
            
            display: flex;
            -webkit-flex-direction: column;
            -moz-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            justify-content: flex-start;
            margin-top: 1em;
            margin-left: 8em;
            margin-right: 8em;
            margin-bottom: 0.5em;
            border-radius: 0.3rem;
            box-shadow: 0 1px 2px 0 #d8d8d8, 0 0 0 1px #d8d8d8;
        }
        #progress .title {
            background: #f5f8fb;
            padding: 0.3em 0.6em;
            font-size: 1 em;
            font-weight: bold;
        }
        #progress .title .election-name {
            display: inline-block;
            margin-left: 2px;
        }
        .breadcrumbs{
            text-align: center;
            margin: 10px ;
            padding: 10px;
            font-family: sans-serif;
        }
        .breadcrumbs__item{
            display: inline-block;
        }

        .breadcrumbs__item:not(:last-of-type)::after {
            content: ' > ';
            font-size: 20px;
            opacity: 1;
            margin: 0 10px;
            color:gray;
        }

        .breadcrumbs__link{
            text-decoration: none;
            color: gray;
            font-size: 1.5rem;
            font-weight: 300;
        }
        .breadcrumbs__link:hover {
            text-decoration: underline;
            color: #FF8002;
        }
        .breadcrumbs__link--active {
            color: #FF8002;
            font-weight: 500;
        }

    </style>
  </head>
<body>
    <div id="progress">
    <div class="title election-name">Elect Your Student Union </div>
        <div class="col-md-12">
        <ul class="breadcrumbs">
                <li class="breadcrumbs__item"><a <?php setActive('Faculty Level Vote') ?> <?php if(isset($_SESSION["facultyVote"])){?> onclick="return false"<?php } ?>class="breadcrumbs__link" href="FLvote2.php">Faculty Level</a></li>
                <li class="breadcrumbs__item"><a <?php setActive('University Level Vote')?> <?php if(isset($_SESSION["uniVote"])){?> onclick="return false"<?php } ?> class="breadcrumbs__link" href="ULvote.php">University Level</a></li>
                <li class="breadcrumbs__item"><a <?php setActive('Review Vote') ?><?php if($_SESSION['vote']== "NULL"){?> onclick="return false"<?php } ?>class="breadcrumbs__link" href="Review.php">Review & Confirm</a></li>
            </ul>
    </div>
    </div>
</body>
</html>