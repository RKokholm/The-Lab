<?php
session_start();

include_once('core/database.php');


?>

<?php include_once('includes/forumheader.php') ?>

<h1 id="forumtitle">Forum</h1>

<div class="categoryheader"><span class="categorytitle">General</span></div>

<?php

	$query = mysql_query('SELECT * FROM categories ORDER BY category_title ASC');
	$res = mysql_num_rows($query);

	$categories = "";

	if (mysql_num_rows($res) > 0){

		while ($row = mysql_fetch_assoc($res)){
			$id = $row['id'];
			$title = $row['category_title'];
			$desc = $row['category_desc'];
			$categories .= "<a href='#' class='cat_link'>".$title." - <font size='-1'>".$desc."</font></a>";

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