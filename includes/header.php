<?php

include_once('core/database.php');

?>

<!doctype html>
<html>

	<head>
		<title>Laboratory</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<meta charset="utf-8">
	</head>


	<body>
		<div id="header">
			
			<div id="topheader">
				<div id="centertopheader">

					<?php

					if (isset($_SESSION['id'])) {

								echo '<nav>
										<ul>
											<li><a href="logout.php">Log out</a></li>
										</ul>
									</nav>';
					} else {

						echo '<nav>
									<ul>
										<li><a href="login.php">Log In</a></li>
										<li><a href="register.php">Sign Up</a></li>
									</ul>
						</nav>';
					}

					?>


				</div>
			</div>

			<div id="headercenter">
				<a id="logolink" href="index.php">
					<img id="logo" src="graphics/icon.png">
				</a>

			<?php
			
			 if ($_POST) {

			 	$player = $_POST['player'];

			 	$sql = "SELECT * FROM users WHERE username='$player'";

			 	$query = mysql_query($sql);
			 	$numrows = mysql_num_rows($query);


			 		if ($numrows != 0) {

			 			while($row = mysql_fetch_assoc($query)){

			 				$playername = $row;

			 			}


			 		} else {
			 			$noplayer = "That player doesn't exist!";
			 		}


			 }

			?>	

			<form id="searchform" action="#" method="POST">
				<input id="playersearch" type="text" name="player" placeholder="Search a player">
			</form>

			</div>
		
		</div>

		<section>

			<div id="content">
