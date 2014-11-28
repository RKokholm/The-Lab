<?php
session_start();

include_once('core/database.php');

$cid = $_GET['cid'];

$querytitle = mysql_query("SELECT category_title FROM categories WHERE id='$cid'");

 if (mysql_num_rows($querytitle) > 0){

 	$title = mysql_fetch_assoc($querytitle);

 }




?>

<?php include_once('includes/forumheader.php') ?>



<h1 id="forumtitle"><?php echo $title['category_title']; ?></h1>

<?php

	if (isset($_SESSION['id'])){
		$logged = "<div class='createbutton'><a href='create_topic.php?cid=".$cid."'>New topic</a></div>";
		echo $logged;
	} else {
		$logged = "Please <a href='login.php'>log in</a> to create a topic";
		echo $logged;
	}

	$query = mysql_query("SELECT id FROM categories WHERE id='".$cid."'");

	if (mysql_num_rows($query) == 1) {

		$querytopics = mysql_query("SELECT * FROM topics WHERE category_id='$cid' ORDER BY topic_reply_date DESC");
		$numrows = mysql_num_rows($querytopics);

		if ($numrows > 0) {

			while ($row = mysql_fetch_assoc($querytopics)){
				$id = $row['id'];
				$title = $row['topic_title'];
				$topics = "<div class='topic_link_area'><a href='view_topic.php?tid=$id' class='topic_link'>".ucfirst($title)."</a><span class='author'>By Author</span></div>";
				
				echo $topics;
			} 

		} else {
			echo 'No topics available in this category<br>';
			echo '<a href="forum.php" class="categoryerror">Return to forum</a>';
		}

	} else {
		echo 'This category does not exist<br>';
		echo '<a href="forum.php" class="categoryerror">Return to forum</a>';
	}

?>


<?php include_once('includes/footer.php') ?>