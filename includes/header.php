<?php
session_start();


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

					if (!isset($_SESSION)) {

						echo '<nav>
									<ul>
										<li><a href="#">Log out</a></li>;
									</ul>
								</nav>';

					} else {

						echo '<nav>
									<ul>
										<li><a href="#">Log In</a></li>
										<li><a href="#">Register</a></li>
									</ul>
						</nav>';
					}

					?>


				</div>
			</div>

			<div id="headercenter">
				<a href="index.php">
					<img id="logo" src="graphics/thelab.png">
				</a>
			</div>
		
		</div>

		<section>

			<div id="content">