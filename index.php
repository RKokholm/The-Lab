<?php
session_start();

include_once('core/database.php');

?>

<?php include_once('includes/header.php'); ?>



			<?php

				if (isset($playername)){

					echo $playername['username'];
				
				} 
				
				if (isset($noplayer)){	
					echo $noplayer;
				}

			?>

		


	

<?php include_once('includes/footer.php'); ?>