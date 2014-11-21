<?php
session_start();

include_once('core/database.php');

?>

<?php include_once('includes/header.php'); ?>
			
			<div id="menuarea">
				<ul>
					<li><a href="#">Subject</li>
					<li><a href="#">Subject</li>
					<li><a href="#">Subject</li>
					<li><a href="#">Subject</li>
					<li><a href="#">Subject</li>
				</ul>
			</div>
			<?php

				if (isset($playername)){

					echo $playername['username'];
				
				} 
				
				if (isset($noplayer)){	
					echo $noplayer;
				}

			?>

		


	

<?php include_once('includes/footer.php'); ?>