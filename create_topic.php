<?php
session_start();

include_once('core/database.php');


?>

<?php include_once('includes/forumheader.php') ?>

<h1 id="forumtitle">Create topic</h1>

<form action="create_topic.php" method="POST" class="topic_creation">
	Subject <input type="text" name="subject"><br><br>
	<textarea rows="16" cols="100"></textarea>
</form>


<?php include_once('includes/footer.php') ?>