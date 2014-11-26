<?php
session_start();

include_once('core/database.php');


?>

<?php include_once('includes/forumheader.php') ?>

<h1 id="forumtitle">Forum</h1>

<div class="categoryheader"><span class="categorytitle">General</span></div>

<?php

	$query = mysql_query('SELECT * FROM categories ORDER BY category_title ASC');
	$numrows = mysql_num_rows($query);

	if ($numrows > 0){

		while ($row = mysql_fetch_assoc($query)){
			$id = $row['id'];
			$title = $row['category_title'];
			$desc = $row['category_desc'];
			$categories = "<a href='view_category.php?cid=".$id."' class='cat_link'>".$title." - <font size='-1'>".$desc."</font></a><br>";

			echo $categories;

		}
	} else {
		echo 'No categories available';
	}

?>

<div class="categoryheader"><span class="categorytitle">League of Legends</span></div>
<div class="categoryheader"><span class="categorytitle">Social</span></div>
<div class="categoryheader"><span class="categorytitle">Support</span></div>


<?php include_once('includes/footer.php') ?>