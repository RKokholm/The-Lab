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
		<title>Draftpick</title>
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

				<form id="searchform" action="#" method="POST">
					<input id="playersearch" type="text" name="player" placeholder="Search player">
				</form>

			<?php

				if(isset($_SESSION['id'])){


					$query = mysql_query('SELECT username FROM users WHERE id="'.$_SESSION['id'].'"');

					$row = mysql_fetch_assoc($query);
					$username = $row['username'];


					echo'<span id="loggedin">
							<b id="loggedinas">Logged in as:</b><b id="username">'.$username.'</b>
						</span>';
					

				}

			?>
				

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
								<li><a href="#">Subject</a></li>
								<li><a href="#">Subject</a></li>
								<li><a href="#">Subject</a></li>
								<li><a href="#">Subject</a></li>
								<li><a href="#">Subject</a></li>
							</ul>
				</div>
			</div>