<?php
session_start();

require_once('core/database.php');

?>

<?php
	
	if ($_POST) {

		$username = $_POST["username"];

		$password = $_POST["password"];

		if ($username&&$password) {

				$query = mysql_query("SELECT * FROM users WHERE username='$username' and password='$password'");

				$numrows = mysql_num_rows($query);


				if ($numrows==1) {

					$row = mysql_fetch_assoc($query);
					$_SESSION['id'] = $row['id'];
					header('location: index.php');
				} else {

					$nouser = 'That user does not exist!';
				}

		} else {
		
			$enterpass = 'Enter username and password';
			
		}

	}


?>

<?php include_once('includes/loginheader.php'); ?>


				<a href="index.php">
					<img id="logo" src="graphics/icon.png">
				</a>

				<div id="loginarea">

					<span id="logintitle">Log in</span>

					<form action="login.php" id="loginform" method="POST">

						<input type="text" name="username" placeholder="Username"><br>
						<input type="password" name="password" placeholder="Password"><br>
						<input type="submit" value="Log in" id="login">

					</form>

					<?php

						if (isset($nouser)) {
							echo '<div class="error">';
							echo $nouser;
							echo '</div>';	
						}

						if (isset($enterpass)) {
							echo '<div class="error">';
							echo $enterpass;
							echo '</div>';
							
						}

					?> 
				</div>


<?php include_once('includes/footer.php'); ?>