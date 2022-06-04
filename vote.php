<?php 

    $pageName = 'Already Voted';
    include_once "header.php";
?>

<style>
    .center-screen {
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  min-height: 60vh;
}
.row
    {
        margin:auto;
        width:100%;
        color:#2e4357;
        align-items: center;     
    }
    .continuebtn{
                padding-top: 10px;
                padding-bottom: 15px;
                padding-left: 45px;
                padding-right: 45px;
                margin-top: 2em;
                margin-bottom: 2em;
                border-color: #FF8002;
                background-color: #FF8002;
                color: #FFFFFF;
                box-shadow: 4px 4px 1px 0 rgb(38 45 52 / 20%), 0 0 0 0px rgb(38 45 52 / 20%);
            }
    .box
    {
        padding-top: 10em;
        padding-bottom:10em;
        padding-left: 30em;
        padding-right: 30em;
        font-family:'Courier New', Courier, monospace;
        display: flex;
        -webkit-flex-direction: column;
        -moz-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        justify-content: flex-start;
        margin-top: 3em;
        margin-bottom: 4em;
        border-radius: 0.3rem;
        box-shadow: 0 1px 2px 0 #d8d8d8, 0 0 0 1px #d8d8d8;
    }
</style>


<body>
 <div class="center-screen">
     <div class="box">
 <div class="row">
        <div class="d-grid mx-auto banner">
        <h4 style="font-size: 28.5px;">You Already Voted</h4>
        <h4 style="font-size: 22px;">Thank You for Voting</h4>
        <a class='nav__a' href='index.php' style="color:#FFFFFF"><button class= "continuebtn" align = "center" size="10"> Go to Home Page</button></a>
        </div>
    </div>
    </div>
 </div>
 </body>
