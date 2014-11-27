<?php
session_start();

include_once('core/database.php');


?>

<?php include_once('includes/forumheader.php') ?>

<h1 id="forumtitle">Create topic</h1>

<?php

	if (!isset($_SESSION['id'])){

		echo 'You need to log in, to create topics';
	}

	if (isset($_POST['create_topic'])){

		$cid = $_GET['cid'];

		$subject = $_POST['subject'];
		$content = $_POST['topic_content'];
		
		if (empty($_POST) === false){
			$check = false;
			$required_fields = array('subject', 'topic_content');

			foreach($_POST as $key => $value){
				if (empty($value) && in_array($key, $required_fields) === true){
					$check = true;
					break 1;
				}
			}

			if ($check == true){
				$errors[] = 'Topic subject and topic content must both be filled';

			} 

			if (empty($errors) === true) {
				$sql = "INSERT INTO topics (category_id, topic_title, topic_creator, topic_content) VALUES ($cid, '$subject', '$username', '$content')";
				mysql_query($sql);
				$success = 'Success! You will be redirected';
				header("refresh:3;url=forum.php");
			};
		}
	}


?>

		<form action="#" method="POST" class="topic_creation">
			<span class="subject">Subject <input type="text" name="subject"></span><br><br>
			<textarea maxlength="2000" rows="16" cols="80" name="topic_content"></textarea>
			<input type="submit" name="create_topic" value="Post" class="createtopic">
		</form>

		<?php

		if(isset($success)){
			echo $success;
		}

		?>

<?php include_once('includes/footer.php') ?>