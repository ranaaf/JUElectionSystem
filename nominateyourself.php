<?php
    include_once"header.php"
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv = "content-type" content ="text/html" charset="utf-8"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  
    <style>
        body
        {
            background-image: linear-gradient(to right, #117aaabe, #216AC0) ;
            padding-bottom:30px;
        }
        .btn-info
        {
        background-color: aliceblue;
        color:#2e4357;
        border-color:#2191c0;
        }
        .table__ul
        {
        list-style-type: none;
        margin:0;
        padding: 0;
        overflow: hidden;
        }
        .table__li a
        {
        float:right;
        display: block;
        text-align: center;
        padding: 16px;
        color:#216AC0;
        text-decoration: none;
        }
        .table__li a:hover{
        text-decoration: none;
        color:#16729a ; 
        }

    </style>
    
<title> Nominate Yourself </title>

<table width="100%" height="400" border="0" cellpadding="10" cellspacing="1" style="background-color:white;">
    
    <tr>
         <td align=right>
             <ul class="table__ul">
                 <li class="table__li"><a href="">FAQs</a></li>
             </ul>
        </td>
    </tr>
    <tr>
         <td align="center" colspan="3">
             <font color ="#2191c0" size="6">Interested in standing for election? </font><br/>
             <font color="#2191c0" size="6"> Nominate yourself and be a part of The Student Union </font> 
        </td>
        </tr>
    <tr>
         <td align ="center" colspan="3">
             <img class="img-responsive w-50" src = "./img/nominee.png" >
        </td>
    </tr>
</table>
  
</head>

<body>
    <br/>
    <div class="d-grid gap-4 col-8 mx-auto">
        <a href="facultylevel.php" class="btn btn-info btn-lg" role="button" style="color:#16729a">Nominate Yourself at Faculty Level</a>
        <a href="universitylevel.php" class="btn btn-info btn-lg" role="button"  style="color:#16729a" >Nominate Yourself at University Level</a>
   </div>
    
</body>

</html>