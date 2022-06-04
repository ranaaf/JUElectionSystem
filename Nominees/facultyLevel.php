
<?php 
include_once '../includes/dbh.inc.php';
$pageName = 'Nominees Faculty Level';
include_once "head.php";
?>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-heading text-uppercase">FACULTY LEVEL NOMINEES</div>
                <div class="dropdown" style="right: 20px">
                <a class="dropbtn btn btn-primary btn-xl text-uppercase" href="#Information Technology">Information Technology</a>
                </div>

                <div style="right: 15px"  class="dropdown">
                <a class="dropbtn btn btn-primary btn-xl text-uppercase" href="#Engineering">Engineering </a>
                </div>
                
                <div style="right: 10px" class="dropdown">
                <a class="dropbtn btn btn-primary btn-xl text-uppercase" href="#Arts">Arts</a>
                </div>

                <div  style="right: 10px" class="dropdown">
                <a class="dropbtn btn btn-primary btn-xl text-uppercase" href="#Business">Business</a>
                </div>
                <div style="right: 5px" class="dropdown">
                <a class="dropbtn btn btn-primary btn-xl text-uppercase" href="#Medicine">Medicine</a>
                </div>
                <div class="dropdown">
                <a class="dropbtn btn btn-primary btn-xl text-uppercase" href="#Pharmacy">Pharmacy</a>
                </div>
            </div>
        </header>
    
        <!-- Portfolio Grid 1-->
        <div id="Information Technology" class="testClass">
        <section class="page-section" id="portfolio">
           <div class="container">
               <div class="text-center">
                   <h2 class="section-heading text-uppercase">Information Technology</h2>
            
            <?php

               $sql00 = "SELECT party FROM `facultylevel_nominees` WHERE faculty ='KASIT' GROUP BY party;";
               $result00 = mysqli_query ($conn,$sql00);

               $array00 = mysqli_fetch_all($result00,MYSQLI_NUM);

               //print_r($array00);

               $p_count00 = count($array00);

               $sql01 = "SELECT name, party,imgNAME FROM `facultylevel_nominees` WHERE faculty ='KASIT' ORDER BY party;";
               $result01 = mysqli_query ($conn,$sql01);

               $array01 = mysqli_fetch_all($result01,MYSQLI_ASSOC);

               echo'<br>';
              //print_r($array01);

               $j=0;
               for($i = 0 ; $i < count($array01) ; $i++)
               {
                   if($i % 3 == 0)
                   { ?>
                    <div class="text-center">
                   </br>
                      <h3 style= "color:#285b82"><?php echo $array00[$j][0]; ?></h3> </div>
                      <?php echo'<br>';
                       $j+=1;?>
                    <div class="portfolio-item">
                    <div class="portfolio-caption">
                       <div class="portfolio-caption-heading"> 
                       <div class="hamza">
                       <a style = text-align:center> <?php echo $array01[$i]['name'];?> 
                       <img width="fit-content" height="250" src="../includes/uploads/<?=$array01[$i]['imgNAME']?>"/></a>
                       <a style = text-align:center> <?php echo $array01[$i+1]['name'];?>
                       <img width="fit-content" height="250" src="../includes/uploads/<?=$array01[$i+1]['imgNAME']?>"/></a>
                       <a style = text-align:center> <?php echo $array01[$i+2]['name']; ?> 
                       <img width="fit-content" height="250" src="../includes/uploads/<?=$array01[$i+2]['imgNAME']?>"/></a>
                       </div>
                    </div>
                </div>
                <?php }
               } ?>
               </div>
               </div>
           </div>
           </div>
        </section>



        <!-- Portfolio Grid 2-->
        <div id="Engineering" class="testClass">
        <section class="page-section" id="portfolio">
           <div class="container">
               <div class="text-center">
                   <h2 class="section-heading text-uppercase">Engineering</h2>
            
            <?php

               $sql10 = "SELECT party FROM `facultylevel_nominees` WHERE faculty ='Engineering' GROUP BY party;";
               $result10 = mysqli_query ($conn,$sql10);

               $array10 = mysqli_fetch_all($result10,MYSQLI_NUM);

               $p_count10 = count($array10);

               $sql11 = "SELECT name, party,imgNAME FROM `facultylevel_nominees` WHERE faculty ='Engineering' ORDER BY party;";
               $result11 = mysqli_query ($conn,$sql11);

               $array11 = mysqli_fetch_all($result11,MYSQLI_ASSOC);

               echo'<br>';
              //print_r($array01);

               $j=0;
               for($i = 0 ; $i < count($array11) ; $i++)
               {
                   if($i % 3 == 0)
                   { ?>
                      <div class="text-center">
                   </br>
                   <h3 style= "color:#285b82"><?php echo $array10[$j][0]; ?></h3> </div>
                      <?php echo'<br>';
                       $j+=1;?>
                       <div class="portfolio-item">
                       <div class="portfolio-caption">
                       <div class="portfolio-caption-heading"> 
                       
                       <div class="hamza">
                       <a style = text-align:center> <?php echo $array11[$i]['name'];?> 
                       <img width="fit-content" height="250" src="../includes/uploads/<?=$array11[$i]['imgNAME']?>"/></a>
                       <a style = text-align:center> <?php echo $array11[$i+1]['name'];?>
                       <img width="fit-content" height="250" src="../includes/uploads/<?=$array11[$i+1]['imgNAME']?>"/></a>
                       <a style = text-align:center> <?php echo $array11[$i+2]['name']; ?> 
                       <img width="fit-content" height="250" src="../includes/uploads/<?=$array11[$i+2]['imgNAME']?>"/></a>
                       </div>
                       </div>
                       </div>
                       </div>
               </div>
                   <?php }
               } ?>
               
               </div>
           </div>
        </section>
        </div>

        <!-- Portfolio Grid 3-->
        <div id="Arts" class="testClass">
        <section class="page-section" id="portfolio">
           <div class="container">
               <div class="text-center">
                   <h2 class="section-heading text-uppercase">Arts</h2>
            
            <?php

               $sql20 = "SELECT party FROM `facultylevel_nominees` WHERE faculty ='Arts' GROUP BY party;";
               $result20 = mysqli_query ($conn,$sql20);

               $array20 = mysqli_fetch_all($result20,MYSQLI_NUM);

               $p_count20 = count($array20);

               $sql21 = "SELECT name, party,imgNAME FROM `facultylevel_nominees` WHERE faculty ='Arts' ORDER BY party;";
               $result21 = mysqli_query ($conn,$sql21);

               $array21 = mysqli_fetch_all($result21,MYSQLI_ASSOC);

               echo'<br>';

               $j=0;
               for($i = 0 ; $i < count($array21) ; $i++)
               {
                   if($i % 3 == 0)
                   { ?>
                      <div class="text-center">
                   </br>
                   <h3 style= "color:#285b82"><?php echo $array20[$j][0]; ?></h3> </div>
                      <?php echo'<br>';
                       $j+=1;?>
                       <div class="portfolio-item">
                   
                       <div class="portfolio-caption">
                       
                       <div class="portfolio-caption-heading"> 
                    
                       <div class="hamza">
                       <a style = text-align:center> <?php echo $array21[$i]['name'];?> 
                       <img width="fit-content" height="250" src="../includes/uploads/<?=$array21[$i]['imgNAME']?>"/></a>
                       <a style = text-align:center> <?php echo $array21[$i+1]['name'];?>
                       <img width="fit-content" height="250" src="../includes/uploads/<?=$array21[$i+1]['imgNAME']?>"/></a>
                       <a style = text-align:center> <?php echo $array21[$i+2]['name']; ?> 
                       <img width="fit-content" height="250" src="../includes/uploads/<?=$array21[$i+2]['imgNAME']?>"/></a>

                       </div>

                       </div>
                        
                       </div>

                       </div>

                      
                   <?php }
               } ?>
               
               </div>
           </div>
        </section>
        </div>
      

         <!-- Portfolio Grid 4-->
         <div id="Business" class="testClass">
        <section class="page-section" id="portfolio">
           <div class="container">
               <div class="text-center">
                   <h2 class="section-heading text-uppercase">Business</h2>
            
            <?php

               $sql30 = "SELECT party FROM `facultylevel_nominees` WHERE faculty ='Business' GROUP BY party;";
               $result30 = mysqli_query ($conn,$sql30);

               $array30 = mysqli_fetch_all($result30,MYSQLI_NUM);

               $p_count30 = count($array30);

               $sql31 = "SELECT name, party,imgNAME FROM `facultylevel_nominees` WHERE faculty ='Business' ORDER BY party;";
               $result31 = mysqli_query ($conn,$sql31);

               $array31 = mysqli_fetch_all($result31,MYSQLI_ASSOC);

               echo'<br>';

               $j=0;
               for($i = 0 ; $i < count($array31) ; $i++)
               {
                   if($i % 3 == 0)
                   { ?>
                      <div class="text-center">
                   </br>
                   <h3 style= "color:#285b82"><?php echo $array30[$j][0]; ?></h3> </div>
                      <?php echo'<br>';
                       $j+=1;?>
                       <div class="portfolio-item">
                   
                       <div class="portfolio-caption">
                       
                       <div class="portfolio-caption-heading"> 
                    
                       <div class="hamza">
                       <a style = text-align:center> <?php echo $array31[$i]['name'];?> 
                       <img width="fit-content" height="250" src="../includes/uploads/<?=$array31[$i]['imgNAME']?>"/></a>
                       <a style = text-align:center> <?php echo $array31[$i+1]['name'];?>
                       <img width="fit-content" height="250" src="../includes/uploads/<?=$array31[$i+1]['imgNAME']?>"/></a>
                       <a style = text-align:center> <?php echo $array31[$i+2]['name']; ?> 
                       <img width="fit-content" height="250" src="../includes/uploads/<?=$array31[$i+2]['imgNAME']?>"/></a>

                       </div>

                       </div>
                        
                       </div>

                       </div>

                      
                   <?php }
               } ?>
               
               </div>
           </div>
        </section>
        </div>
      

        <!-- Portfolio Grid 5-->
        <div id="Medicine" class="testClass">
        <section class="page-section" id="portfolio">
           <div class="container">
               <div class="text-center">
                   <h2 class="section-heading text-uppercase">Medicine</h2>
            
            <?php

               $sql40 = "SELECT party FROM `facultylevel_nominees` WHERE faculty ='Medicine' GROUP BY party;";
               $result40 = mysqli_query ($conn,$sql40);

               $array40 = mysqli_fetch_all($result40,MYSQLI_NUM);

               $p_count40 = count($array40);

               $sql41 = "SELECT name, party,imgNAME FROM `facultylevel_nominees` WHERE faculty ='Medicine' ORDER BY party;";
               $result41 = mysqli_query ($conn,$sql41);

               $array41 = mysqli_fetch_all($result41,MYSQLI_ASSOC);

               echo'<br>';

               $j=0;
               for($i = 0 ; $i < count($array41) ; $i++)
               {
                   if($i % 3 == 0)
                   { ?>
                      <div class="text-center">
                   </br>
                   <h3 style= "color:#285b82"><?php echo $array40[$j][0]; ?></h3> </div>
                      <?php echo'<br>';
                       $j+=1;?>
                       <div class="portfolio-item">
                   
                       <div class="portfolio-caption">
                       
                       <div class="portfolio-caption-heading"> 
                    
                       <div class="hamza">
                       <a style = text-align:center> <?php echo $array41[$i]['name'];?> 
                       <img width="fit-content" height="250" src="../includes/uploads/<?=$array41[$i]['imgNAME']?>"/></a>
                       <a style = text-align:center> <?php echo $array41[$i+1]['name'];?>
                       <img width="fit-content" height="250" src="../includes/uploads/<?=$array41[$i+1]['imgNAME']?>"/></a>
                       <a style = text-align:center> <?php echo $array41[$i+2]['name']; ?> 
                       <img width="fit-content" height="250" src="../includes/uploads/<?=$array41[$i+2]['imgNAME']?>"/></a>

                       </div>

                       </div>
                        
                       </div>

                       </div>

                      
                   <?php }
               } ?>
               
               </div>
           </div>
        </section>
        </div>


        <!-- Portfolio Grid 6-->
        <div id="Pharmacy" class="testClass">
        <section class="page-section" id="portfolio">
           <div class="container">
               <div class="text-center">
                   <h2 class="section-heading text-uppercase">Pharmacy</h2>
            
            <?php

               $sql50 = "SELECT party FROM `facultylevel_nominees` WHERE faculty ='Pharmacy' GROUP BY party;";
               $result50 = mysqli_query ($conn,$sql50);

               $array50 = mysqli_fetch_all($result50,MYSQLI_NUM);

               $p_count50 = count($array50);

               $sql51 = "SELECT name, party,imgNAME FROM `facultylevel_nominees` WHERE faculty ='Pharmacy' ORDER BY party;";
               $result51 = mysqli_query ($conn,$sql51);

               $array51 = mysqli_fetch_all($result51,MYSQLI_ASSOC);

               echo'<br>';

               $j=0;
               for($i = 0 ; $i < count($array51) ; $i++)
               {
                   if($i % 3 == 0)
                   { ?>
                      <div class="text-center">
                   </br>
                   <h3 style= "color:#285b82"><?php echo $array50[$j][0]; ?></h3> </div>
                      <?php echo'<br>';
                       $j+=1;?>
                       <div class="portfolio-item">
                   
                       <div class="portfolio-caption">
                       
                       <div class="portfolio-caption-heading"> 
                    
                       <div class="hamza">
                       <a style = text-align:center> <?php echo $array51[$i]['name'];?> 
                       <img width="fit-content" height="250" src="../includes/uploads/<?=$array51[$i]['imgNAME']?>"/></a>
                       <a style = text-align:center> <?php echo $array51[$i+1]['name'];?>
                       <img width="fit-content" height="250" src="../includes/uploads/<?=$array51[$i+1]['imgNAME']?>"/></a>
                       <a style = text-align:center> <?php echo $array51[$i+2]['name']; ?> 
                       <img width="fit-content" height="250" src="../includes/uploads/<?=$array51[$i+2]['imgNAME']?>"/></a>

                       </div>

                       </div>
                        
                       </div>

                       </div>

                      
                   <?php }
               } ?>
               
               </div>
           </div>
        </section>
        </div>
        
        
        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class='fas fa-angle-double-up'></i>	
</button>
        <script>//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
        </script>
       
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
            
        
        
    </body>
</html>
