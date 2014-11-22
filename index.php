<?php
session_start();

include_once('core/database.php');

?>

<?php include_once('includes/header.php'); ?>
			
			<div id="menuarea">
				<ul>
					<li><a href="#">Champions</li>
					<li><a href="#">Community</li>
					<li><a href="#">Guides</li>
					<li><a href="#">Streams</li>
					<li><a href="#">Database</li>
				</ul>
			</div>

					<div id="menuopen">
						<img src="graphics/forward.png" id="menuarrow">
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