<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
}

a {
	color: #333;
	font-size: 16px;
	text-decoration: none;
	margin: 15px 0;
	
}

button {
	border-radius: 20px;
	border: 1px solid lightseagreen;
	background-color: lightseagreen;
	color: #FFFFFF;
	font-size: 30px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

button:active {
	transform: scale(0.95);
}

button:focus {
	outline: none;
}

form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: center;
}

input {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
}

.container {
	background-color: #fff;
	border-radius: 10px;
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	width: 768px;
	max-width: 100%;
	min-height: 480px;
  top: 10%;
}

.form-container {
	position: absolute;
	top: 0;
	height: 100%;
}

.sign-in-container {
	left: 25%;
	width: 50%;
	z-index: 2;
}

</style>
<?php
	$pageName = 'Log In';
    include_once "header.php"
?>

<div class="container" id="container">
	<div class="form-container sign-in-container">
    <form action="includes/login.inc.php" method="post">
      <h1 style="color:lightseagreen">Log In</h1>
      <input type="text" name="uid" placeholder="Username/Email...">
      <input type="password" name="pwd" placeholder="Password...">
      <a href="https://regweb1.ju.edu.jo:4443/selfregapp/reset-password.xhtml">Forgot your password?</a>
      <button type="submit" name="submit">Log In</button>
      <?php
          if(isset($_GET["error"])){
              if($_GET["error"] == "emptyinput"){
                echo "<p style='margin-top:15px; color:crimson'>Fill in all fields!</p>";
              }
              else if ($_GET["error"] == "wronglogin"){
                  echo "<p>Incorrect login Username or Password!</p>";
              }
          }
      ?>
    </form>
	</div>
</div>