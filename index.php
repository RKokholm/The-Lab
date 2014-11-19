<?php
session_start();

include_once('core/database.php');

include_once('includes/header.php');

?>

<?php include_once('includes/header.php'); ?>

	<?php

		if (isset($_SESSION['id'])) {
			
		}

	?>

					<?php

				if (isset($playername)){

					echo $playername['username'];
				
				} 
				
				if (isset($noplayer)){	
					//echo $noplayer;
				}

				?>


<?php include_once('includes/footer.php'); ?>