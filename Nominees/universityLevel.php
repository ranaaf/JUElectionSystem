<?php 
include_once '../includes/dbh.inc.php';
$pageName = 'Nominees University Level';
include_once "head.php";
?>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
            <div class="masthead-heading text-uppercase">UNIVERSITY LEVEL NOMINEES</div>
            <div  style="right: 10px" class="dropdown">
                <a class="dropbtn btn btn-primary btn-xl text-uppercase" href="#Nashama">AL-Nashama</a>
            </div>
             <div style="right: 10px" class="dropdown">
                <a class="dropbtn btn btn-primary btn-xl text-uppercase" href="#AhelAlHimmeh">Ahel Al Himmeh</a>
            </div>
            <div class="dropdown">
                <a class="dropbtn btn btn-primary btn-xl text-uppercase" href="#Awda">AL-Awda</a>
            </div>
            <div class="dropdown">
                <a class="dropbtn btn btn-primary btn-xl text-uppercase" href="#Karama">AL-Karama</a>
            </div>
            <div style="right: -10px"  class="dropdown">
                <a class="dropbtn btn btn-primary btn-xl text-uppercase" href="#Tajdeed">AL-Tajdeed</a>
            </div>
            </div>
        
        <!-- Portfolio Grid 1-->
            <div id="Nashama">
             <?php
                $sql0 = "SELECT COUNT(DISTINCT(name) ) AS total FROM universitylevel_nominees WHERE party = 'Nashama';";
                $party_num = mysqli_query($conn,$sql0);
                $count = mysqli_fetch_array($party_num);
                
                $p_count = $count[0];

                // write query that will get the names and parties in an array
                $sql ="SELECT name FROM universitylevel_nominees WHERE party = 'Nashama';";

                //make query and get result
                $result = mysqli_query($conn,$sql);

                //fetch resulting rows as an array
                $parties = mysqli_fetch_all($result,MYSQLI_NUM);

                $sql2 ="SELECT imgName FROM universitylevel_nominees WHERE party = 'Nashama';";
                $resultt = mysqli_query($conn,$sql2);
                $imges = mysqli_fetch_all($resultt,MYSQLI_NUM);

                $i=0;
                $j=0;
                

            ?>
                
        <section class="page-section" id="portfolio">
            
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">AL-Nashama</h2>
        <?php
            while ($i < count($parties))
            {
                while( $j < $p_count)
                {
         ?>
            <div class="text-center">
                <div class="col-lg-4 col-sm-6 mb-4"></div>
                
                <div class="portfolio-item">
                    <div class="portfolio-caption">
                    <div class="portfolio-caption-heading"> 
                    <div class="hamza">
                    <?php 
                         for($i = $j ; $i < $j+3 ; $i++)
                        {?><a style="color:black" style = text-align:center><?php echo $parties[$i][0]." ";?>
                            <img width="fit-content" height="250" src="../includes/uploadsU/<?=$imges[$i][0]?>"/><?php
                        
                        }?>
                            </a>
                        </div>
                        </div>
                    </div>
            <?php
            $j=$j+3;
            }
            }?>
            </div>
            </div>
            </div>
            </div>
            </section>
        <!-- Portfolio Grid 2-->
         <div id="AhelAlHimmeh">
            <?php
                $sql0 = "SELECT COUNT(DISTINCT(name) ) AS total FROM universitylevel_nominees WHERE party = 'Ahl Alhema';";
                $party_num = mysqli_query($conn,$sql0);
                $count = mysqli_fetch_array($party_num);
                
                $p_count = $count[0];

                // write query that will get the names and parties in an array
                $sql ="SELECT name FROM universitylevel_nominees WHERE party = 'Ahl Alhema';";

                //make query and get result
                $result = mysqli_query($conn,$sql);

                //fetch resulting rows as an array
                $parties = mysqli_fetch_all($result,MYSQLI_NUM);

                $sql2 ="SELECT imgName FROM universitylevel_nominees WHERE party = 'Ahl Alhema';";
                $resultt = mysqli_query($conn,$sql2);
                $imges = mysqli_fetch_all($resultt,MYSQLI_NUM);

                $i=0;
                $j=0;
                

            ?>
        <section class="page-section" id="portfolio">
            
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Ahel Al Himmeh</h2>
        <?php
            while ($i < count($parties))
            {
                while( $j < $p_count)
                {
         ?>
            <div class="text-center">
             
                <div class="col-lg-4 col-sm-6 mb-4"></div>
                
                <div class="portfolio-item">
                    <div class="portfolio-caption">
                    <div class="portfolio-caption-heading"> 
                     <div class="hamza">
                    <?php 
                         for($i = $j ; $i < $j+3 ; $i++)
                        {?><a style="color:black" style = text-align:center><?php echo $parties[$i][0]." ";?>
                            <img width="250" height="250" src="../includes/uploadsU/<?=$imges[$i][0]?>"/><?php
                        
                        }?>
                            </a>
                        </div>
                        </div>
                    </div>
            <?php
            $j=$j+3;
            }
            }?>
            </div>
            </div>
            </div>
            </div>
            </section>
        
         <!-- Portfolio Grid 3-->
         <div id="Awda">
             <?php
                $sql0 = "SELECT COUNT(DISTINCT(name) ) AS total FROM universitylevel_nominees WHERE party = 'Awda';";
                $party_num = mysqli_query($conn,$sql0);
                $count = mysqli_fetch_array($party_num);
                
                $p_count = $count[0];

                // write query that will get the names and parties in an array
                $sql ="SELECT name FROM universitylevel_nominees WHERE party = 'Awda';";

                //make query and get result
                $result = mysqli_query($conn,$sql);

                //fetch resulting rows as an array
                $parties = mysqli_fetch_all($result,MYSQLI_NUM);

                $sql2 ="SELECT imgName FROM universitylevel_nominees WHERE party = 'Awda';";
                $resultt = mysqli_query($conn,$sql2);
                $imges = mysqli_fetch_all($resultt,MYSQLI_NUM);

                $i=0;
                $j=0;
                

            ?>
        <section class="page-section" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">AL-Awda</h2>
                <?php
                    while ($i < count($parties))
                    {
                        while( $j < $p_count)
                        {
                ?>
            <div class="text-center">
                <div class="portfolio-item">
                    <div class="portfolio-caption">
                    <div class="portfolio-caption-heading"> 
                    <div class = "hamza">
                    <?php 
                         for($i = $j ; $i < $j+3 ; $i++)
                        {?><a style="color:black" style = text-align:center><?php echo $parties[$i][0]." ";?>
                            <img width="fit-content" height="250" src="../includes/uploadsU/<?=$imges[$i][0]?>"/><?php
                        }?>
                        </a>
                        </div>
                        </div>
                    </div>
            <?php
            $j=$j+3;
            }
            }?>
            </div>
            </div>
            </div>
            </div>
            </section>
        <!-- Portfolio Grid 4-->
        <div id="Karama">
             <?php
                $sql0 = "SELECT COUNT(DISTINCT(name) ) AS total FROM universitylevel_nominees WHERE party = 'Al-Karama';";
                $party_num = mysqli_query($conn,$sql0);
                $count = mysqli_fetch_array($party_num);
                
                $p_count = $count[0];

                // write query that will get the names and parties in an array
                $sql ="SELECT name FROM universitylevel_nominees WHERE party = 'Al-Karama';";

                //make query and get result
                $result = mysqli_query($conn,$sql);

                //fetch resulting rows as an array
                $parties = mysqli_fetch_all($result,MYSQLI_NUM);

                $sql2 ="SELECT imgName FROM universitylevel_nominees WHERE party = 'Al-Karama';";
                $resultt = mysqli_query($conn,$sql2);
                $imges = mysqli_fetch_all($resultt,MYSQLI_NUM);

                $i=0;
                $j=0;
                

            ?>
        <section class="page-section" id="portfolio">
            
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">AL-Karama</h2>
        <?php
            while ($i < count($parties))
            {
                while( $j < $p_count)
                {
         ?>
            <div class="text-center">
                <div class="col-lg-4 col-sm-6 mb-4"></div>
                
                <div class="portfolio-item">
                    <div class="portfolio-caption">
                    <div class="portfolio-caption-heading"> 
                    <div class="hamza">
                    <?php 
                         for($i = $j ; $i < $j+3 ; $i++)
                        {?><a style="color:black" style = text-align:center><?php echo $parties[$i][0]." ";?>
                            <img width="fit-content" height="250" src="../includes/uploadsU/<?=$imges[$i][0]?>"/><?php
                        
                        }?>
                            </a>
                        </div>
                        </div>
                    </div>
            <?php
            $j=$j+3;
            }
            }?>
            </div>
            </div>
            </div>
            </div>
            </section>
        
        <!-- Portfolio Grid 5-->
        <div id="Tajdeed">
            
             <?php
                $sql0 = "SELECT COUNT(DISTINCT(name) ) AS total FROM universitylevel_nominees WHERE party = 'Al-Tajdeed';";
                $party_num = mysqli_query($conn,$sql0);
                $count = mysqli_fetch_array($party_num);
                
                $p_count = $count[0];

                // write query that will get the names and parties in an array
                $sql ="SELECT name FROM universitylevel_nominees WHERE party = 'Al-Tajdeed';";

                //make query and get result
                $result = mysqli_query($conn,$sql);

                //fetch resulting rows as an array
                $parties = mysqli_fetch_all($result,MYSQLI_NUM);

                $sql2 ="SELECT imgName FROM universitylevel_nominees WHERE party = 'Al-Tajdeed';";
                $resultt = mysqli_query($conn,$sql2);
                $imges = mysqli_fetch_all($resultt,MYSQLI_NUM);

                $i=0;
                $j=0;
                

            ?>
        <section class="page-section" id="portfolio">
            
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">AL-Tajdeed</h2>
        <?php
            while ($i < count($parties))
            {
                while( $j < $p_count)
                {
         ?>
            <div class="text-center">
                <div class="col-lg-4 col-sm-6 mb-4"></div>
                
                <div class="portfolio-item">
                    <div class="portfolio-caption">
                    <div class="portfolio-caption-heading"> 
                    <div class="hamza">
                    <?php 
                         for($i = $j ; $i < $j+3 ; $i++)
                        {?><a style="color:black" style = text-align:center><?php echo $parties[$i][0]." ";?>
                            <img width="fit-content" height="250" src="../includes/uploadsU/<?=$imges[$i][0]?>"/><?php
                        
                        }?>
                            </a>
                        </div>
                        </div>
                    </div>
            <?php
            $j=$j+3;
            }
            }?>
            </div>
            </div>
            </div>
            </div>
            </section>