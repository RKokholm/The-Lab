<?php
session_start();

include_once('core/database.php');

$tid = $_GET['tid'];
$sql = "SELECT topics.category_id, topics.topic_title, topics.topic_creator, topics.topic_date, topics.topic_content, users.username AS creator, users.name FROM topics JOIN users ON topics.topic_creator=users.id WHERE topics.id='$tid'";
$query = mysql_query($sql);

 if (mysql_num_rows($query) > 0){

 	$topicdata = mysql_fetch_assoc($query);

?>

<?php include_once('includes/forumheader.php') ?>



<div class='topic_left_area'>

	<div class="picture_area">
		<img src="graphics/unknown.jpg" class="noimage"></img>
	</div>
	<div class="topic_author"><?=ucfirst($topicdata['creator']); ?></div>

</div>


<div class='topic_content_area'>
	
	<div class='topic_header'>
		<h4 class='in_topic_title'><?=ucfirst($topicdata['topic_title']); ?></h4>
	</div>

	<div class"topic_text_area"><?=nl2br(htmlentities($topicdata['topic_content'])); ?></div>

</div>


<?php include_once('includes/footer.php') ?>


<?php } ?>

