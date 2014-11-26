<?php
session_start();

include_once('core/database.php');

$cid = $_GET['cid'];

?>

<?php include_once('includes/forumheader.php') ?>

<h1 id="forumtitle">Create topic</h1>

<?php

	if (!isset($_SESSION['id'])){

		echo 'You need to log in, to create topics';
	}

	if ($_POST){

		$subject = $_POST['subject'];
		$content = $_POST['topic_content'];
		
		if (empty($_POST) === false){
			$check = false;
			$required_fields = array('subject', 'topic_content');

			foreach($_POST as $key => $value){
				if (empty($value) && in_array($key, $required_fields) === true);
				$check = true;
				break 1;
			}

			if ($check == true){
				$errors[] = 'Topic subject and topic content must both be filled';

			} 

			if (empty($errors) === true) {
				$sql = "INSERT INTO topics (category_id, topic_title, topic_creator, topic_content) VALUES ($cid, $subject, $username, $content)";
				echo 'Success!';
				header('refresh:3;url="forum.php"');
			};
		}
	}


?>

		<form action="create_topic.php" method="POST" class="topic_creation">
			<span class="subject">Subject <input type="text" name="subject"></span><br><br>
			<textarea maxlength="2000" rows="16" cols="80" name="topic_content"></textarea>
			<input type="submit" name="create_topic" value="Post" class="createtopic">
		</form>

<?php include_once('includes/footer.php') ?>