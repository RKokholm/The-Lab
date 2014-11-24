<?php

include_once('core/database.php');

	if (isset($_SESSION['id'])){

		$query = mysql_query('SELECT username FROM users WHERE id="'.$_SESSION['id'].'"');

		$username = mysql_fetch_assoc($query);

		
		
	}

?>

<!doctype html>
<html>

	<head>
		<title>Draftpick | Forum</title>

		<link rel="stylesheet" type="text/css" href="css/forumstyle.css">
		
		<meta charset="utf-8">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	</head>


	<body>
		<div id="header">
			
			<div id="topheader">
				<div id="centertopheader">

					<?php

					if (isset($_SESSION['id'])) {

						$query = mysql_query('SELECT username FROM users WHERE id="'.$_SESSION['id'].'"');

						$row = mysql_fetch_assoc($query);
						$username = $row['username'];

								echo '<nav>
										<ul>
											<b id="loggedinas">Logged in as:</b><b id="username">'.$username.'</b>
										</ul>
									</nav>';

								echo '<nav id ="logout">
										<ul>
											<b id="logoutlink"><a href="logout.php">Log Out</a></b>
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

				<form id="searchform" action="#" method="POST">
					<input id="playersearch" type="text" name="player" placeholder="Search player">
				</form>

				<div id="menubutton">
				</div>

				

			</div>

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

			</div>
		
		</div>

		<section>

	<div id="content">


			<div id="menuarea">
				<ul>
					<a href="#"><div class="menubox"><li>Champions</li></div></a>
					<a href="forum.php"><div class="menubox"><li>Forums</li></div></a>
					<a href="#"><div class="menubox"><li>Guides</li></div></a>
					<a href="#"><div class="menubox"><li>Streams</li></div></a>
					<a href="#"><div class="menubox"><li>Database</li></div></a>
				</ul>
			</div>

			