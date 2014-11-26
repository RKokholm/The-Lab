<?php
session_start();

include_once('core/database.php');


?>

<?php include_once('includes/forumheader.php') ?>

<h1 id="forumtitle">Forum</h1>

<?php
	
$cid = $_GET['cid'];

	if (isset($_SESSION['id'])){
		$logged = "<a href='create_topic.php?cid=".$cid."'>Click here to create a topic</a>";
	} else {
		$logged = "Please log in to create a topic";
	}

	$query = mysql_query("SELECT id FROM categories WHERE id='".$cid."'");

	if (mysql_num_rows($query) == 1) {

		$querytopics = mysql_query("SELECT * FROM topics WHERE category_id='$cid' ORDER BY topic_reply_date DESC");
		$numrows = mysql_num_rows($querytopics);

		if ($numrows > 0) {

			while ($row = mysql_fetch_assoc($querytopics)){
				$id = $row['id'];
				$title = $row['topic_title'];
				$topics = "<a href='view_topic.php?tid=$id' class='topic_link'>$title</a>";

				echo $topics;
			} 

		} else {
			echo 'No topics available in this category<br>';
			echo $logged.' or ';
			echo '<a href="forum.php" class="categoryerror">Return to forum</a>';
		}

	} else {
		echo 'This category does not exist<br>';
		echo '<a href="forum.php" class="categoryerror">Return to forum</a>';
	}

?>


<?php include_once('includes/footer.php') ?>