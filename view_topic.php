<?php
session_start();

include_once('core/database.php');

$tid = $_GET['tid'];

$querytitle = mysql_query("SELECT topic_title FROM topics WHERE id='$tid'");

 if (mysql_num_rows($querytitle) > 0){

 	$title = mysql_fetch_assoc($querytitle);

 }

	$author = mysql_query("SELECT topic_creator FROM topics WHERE id=$tid");
	$authorrow = mysql_fetch_assoc($author);
	$topic_creator = $authorrow['topic_creator'];

?>

<?php include_once('includes/forumheader.php') ?>



<div class='topic_left_area'>

	<div class="picture_area">
		<img src="graphics/unknown.jpg" class="noimage"></img>
	</div>

<?php
	echo "<div class='topic_author'>".ucfirst($topic_creator)."</div>";
?>

</div>


<div class='topic_content_area'>
	
	<div class='topic_header'>
		<h4 class='in_topic_title'><?php echo ucfirst($title['topic_title']); ?></h4>
	</div>

	<?php


		$query = mysql_query("SELECT topic_content FROM topics WHERE id='$tid'");
		$numrows = mysql_num_rows($query);

		if($numrows > 0){

			$row = mysql_fetch_assoc($query);
			echo "<div class='topic_text_area'>".$row['topic_content']."</div>";

		} else {
			$nocontent = 'No content in this topic';
		}



	?>

</div>



<?php include_once('includes/footer.php') ?>