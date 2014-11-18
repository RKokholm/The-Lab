<?php
session_start();

require_once('core/database.php');

?>

<?php
	
 	if ($_POST) {

 		$name = $_POST['name'];
 		$username = $_POST['username'];
 		$password = $_POST['password'];
 		$repeatpassword = $_POST['repeatpassword'];
 		$email = $_POST['email'];

 		//checks
 		
 		if (empty($_POST) === false) {
 			$check = false;
 			$required_fields = array('name, username, password, repeatpassword, email');
 			foreach($_POST as $key=>$value) {
 				if (empty($value) && in_array($key, $required_fields) === true) {
 				$check = true;
 				break 1;
 			}
 		}

 		if ($check === true){
 			$errormessage = 'All fields must be filled';

 		} else {


 			if (strlen($password) <= 6) {
 				$errors[] = 'Password must be over 6 characters';
 			}

 			if ($password != $repeatpassword){
 				$errors[] = 'Your passwords does not match'; 		

 			}

 			$queryemail = mysql_query("SELECT * FROM users WHERE email='$email'");
 			$numrowsemail = mysql_num_rows($queryemail);

 			if ($numrowsemail > 0){
 				$errors[] = 'Email already used';
 			}

 			$query = mysql_query("SELECT * FROM users WHERE username='$username'");
 			$numrows = mysql_num_rows($query);

 			if ($numrows > 0){
 				$errors[] = 'Username already taken';
 			}
 			

 			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 				$errors[] = 'Email not valid';
 			}
			
			//print_r($errors);
 			if (!isset($errors)){
 				$sql = "INSERT INTO users (name, username, password, email, active) VALUES ('$name', '$username', '$password', '$email', 0)";
 				if (mysql_query($sql)){
 					$success = 'Success!';
 					header('refresh:3;url=login.php');
 				
 				}
 			}
 		}


 	}
}


?>

<?php include_once('includes/registerheader.php'); ?>


				<a href="index.php">
					<img id="logo" src="graphics/thelab.png">
				</a>

				<div id="registerarea">
					<form action="register.php" id="registerform" method="POST">

						<input type="text" name="name" placeholder="Full name"><br>
						<input type="text" name="username" placeholder="Username"><br>
						<input type="password" name="password" placeholder="Password"><br>
						<input type="password" name="repeatpassword" placeholder="Repeat password"><br>
						<input type="text" name="email" placeholder="Email"><br>
						<input type="submit" value="Sign up" id="signup">

					</form>

					<?php

						if (isset($errormessage)) {
								echo '<div class="error">';
									echo $errormessage;
								echo '</div>';
						}

						if (!empty($errors[0])) {
							foreach($errors as $error){
								echo '<div class="error">';
									echo $error;
								echo '</div>';
							}
						}

						if (isset($success)){
							echo '<div class="error">';
								echo $success;
							echo '</div>';
						}

					?>

				</div>

<?php include_once('includes/footer.php'); ?>