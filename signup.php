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
	height: 50%;
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
	width: 100%;
	z-index: 2;
}

</style>
<?php
    include_once "header.php"
?>

    <section class= "container">
        <br><br>
        <h2 class="text-center pb-5" style="color: lightseagreen;">Sign Up</h2>
		
        <div class="col-md-12 pb-5">
            <form action="includes/signup.inc.php" method="post">
                <input type="text" name="name" placeholder="Full name...">
                <input type="text" name="email" placeholder="Email...">
				<input type="text" name="studentId" placeholder="Student ID...">
				<input type="text" name="faculty" placeholder="Faculty...">
                <input type="text" name="uid" placeholder="Username...">
                <input type="password" name="pwd" placeholder="Password...">
                <input type="password" name="pwdrepeat" placeholder="Repeat password...">
				<br>
                <button class="mb-2 mt-2"type="submit" name="submit">Sign Up</button>
            </form>
        </div>
    
        <?php
        if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all fields!</p>";
            }
            else if ($_GET["error"] == "invaliduid"){
                echo "<p>Choose a proper username!</p>";
            }
            else if ($_GET["error"] == "invalidemail"){
                echo "<p>Choose a proper email!</p>";
            }
            else if ($_GET["error"] == "passworddontmatch"){
                echo "<p>Password doesn't match!</p>";
            }
            else if ($_GET["error"] == "stmtfaild"){
                echo "<p>Something went wrong, try again!</p>";
            }
            else if ($_GET["error"] == "usernametaken"){
                echo "<p>Username already taken!</p>";
            }
            else if ($_GET["error"] == "none"){
                echo "<p>You have signed up!</p>";
            }
        }
        ?>
    </section>
