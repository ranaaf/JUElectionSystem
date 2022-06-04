    <!--  Navbar  -->
    <?php
      include_once "header.php"
    ?>
    <!--  Navbar  -->
  
    <?php 
    if(isset($_SESSION["useruid"]) && ($_SESSION['level']=='user') && ($_SESSION['vote']== 'NULL')){
      echo "<p class='col-md-12 text-center ready' > Ready To Vote " . $_SESSION["userName"]." </p>";
    }
    elseif(isset($_SESSION["useruid"]) && ($_SESSION['level']=='user') && ($_SESSION['vote']== "DONE")){
      echo "<p class='col-md-12 text-center ready' > Thank You For Voting " . $_SESSION["userName"]." </p>";
    }
    ?>
    <!--  Banner -->
    <section id="banner">
      <div class="container">
        <div class="row">
          <div class="col-md-6 text-center px-0 mx-0 ">
            <h3 class="BannerH1">Be the Voice for Students</h3>
            <p class="center">  The Students’ Union Elections are run each year so students can decide who represents them.
              Nominations are now open! It’s your chance to represent your fellow students and be their voice.
            </p>
            <?php
                if(isset($_SESSION["useruid"])&& ($_SESSION['vote']== 'NULL')){
                 echo "<a href='vote2.php'><button class='VotingBtn'> Vote Now </button></a>";
                }
                elseif(isset($_SESSION["useruid"])&& ($_SESSION['vote']== "DONE")){
                  echo "<a href='vote.php'><button class='VotingBtn'> Vote Now </button></a>";
                }
                else{
                  echo "<a href='login.php'><button class='VotingBtn'> Vote Now </button></a>";
                }
            ?>
          </div>
          <div class="col-md-6 mb-5">
            <img class="img-responsive w-100" src="./img/2.png" alt="bannerImage">
          </div>
        </div>
      </div>
    </section>
    <!--  Banner -->
  <!-- Candidate Section -->
  <section id="cand" class="pt-4">
    <div class="container">
     <div class="row"> 
      <div class="col-md-12 mt-0 mb-0 pb-0">
        <h1 class="text-center">Become a Member </h1>
        <p class="text-center">Join The Student Union</p>
      </div>
      <div class="col-md-6 mt-0 mb-0">
        <div class="img.candi-footer">
            <img class="img-responsive w-100" src="./img/3.png" alt="Candidate-img"/>
        </div>
      </div>
      <div class="col-md-6">
        <div class="text-center candi-apply-text">
          <h2 class="mt-5 mb-4"> Apply </h2>
          <p class="center">Being an elected rep is a great experience. 
             You’ll be able to improve your CV, meet new people and build new skills. 
              If elected, you’ll be the voice of the students you represent, lead the Students’ Union, 
              create change at The University of Jordan and run campaigns and projects to improve students’ lives. 
             Take this step and be part of this great community.</p> <br>
             <a href='nominateyourself.php'><button class="VotingBtn"> Apply Now </button></a>
        </div>
      </div>
    </div>
    </div>
    </section>
    <!-- Candidate Section -->


    <!-- Voting Section -->
    <div class="masthead img-fluid" style="background-image: url('./img/Voting.jpeg');">
      <div class="color-overlay d-flex justify-content-center align-items-center text-center">
      <h2 class="h2 mr-2"> Choose your Student Union </h2><br>
      </div>
        <div class="col-md-12 pt-5 mt-5 justify-content-center">
              <br><br><br><br><br><br>
              <div class="text-center mt-6 pt-5">
                <?php
                if(isset($_SESSION["useruid"])&& ($_SESSION['vote']== 'NULL')){
                 echo "<a href='vote2.php'><button class='VotingBtn mt-5 text-center'> Vote Now </button></a>";
                }
                elseif(isset($_SESSION["useruid"])&& ($_SESSION['vote']== "DONE")){
                  echo "<a href='vote.php'><button class='VotingBtn mt-5 text-center'> Vote Now </button></a>";
                }
                else{
                  echo "<a href='login.php'><button class='VotingBtn mt-5 text-center'> Vote Now </button></a>";
                }
                ?>
              </div>
        </div>
      </div>
  
      <!-- Voting Section -->
  
    <!-- Participate Section -->
    <section class="pt-4">
      <div class="container">
       <div class="row"> 
        <div class="col-md-6">
          <div class="text-center">
            <h3 class="mt-5 mb-4"> Why participate?</h3>
            <p >
          First and foremost, elected students can drive change. You are making a change in your small yet rich community, 
          whether you are choosing your next representative or you are the representative. </p>
         <p>
          By leading campaigns or organizing events, you can steer the direction of your society, sports club, 
          or the whole university and advance the causes that you and your peers believe in.
         </p>  
          </div>
        </div>
        
        <div class="col-md-6">
          <div>
              <img id="voice" class="img-responsive w-100" src="./img/Student-Voice.jpg" alt="Candidate-img"  height="460px" />
          </div>
        </div>
      </div>
      </div>
      </section>
    <!-- Participate Section -->
    
    <!-- About Section -->
    <section id="about" class="mt-4 pt-2 pb-4">
      <div class="col-md-12 mt-3 mb-0">
        <h3 class="text-center mt-4 pt-4">About the Student Union</h3>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-12 mt-3 mb-0 pb-4">
            <p class="col-md-12 text-center"> The Student Union is committed to supporting all students from a wide variety of 
              backgrounds and experiences which acts as an official representation and advocacy on campus.
              It represents the voice of the students’ body at the university. </p>
             <p class="col-md-12 text-center pb-4"> The student union aims at immersing the students in a wealth of cultural events and activities as well as quality support services including the social, sporting, recreational, cultural and academic interests.
              The student union is administered via a selected administrative body which consists of a group of members being elected by the students on a yearly basis. </p>
          </div>
        </div>
      </div>
    </section>
    <!-- About Section -->
    
    <!-- Footer Section -->
    <?php
      include_once "footer.php"
    ?>
    <!-- Footer Section -->
