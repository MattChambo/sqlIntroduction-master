<?php
//genreList();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
    <title>Introduction to MySQL</title>
    <link rel="stylesheet" type="text/css" href="">
  </head>
  <body>
  	
  	
  	<h1><?=$singlemovie['title']?></h1>
  	<p>Release Year - <?=$singlemovie['release_date']?></p>
  	<p><?=$singlemovie['description']?></p>

  	<a href="./?page=edit&amp;id=<?=$singlemovie['id']?>">Edit Movie</a>
  	<br>
  	<a href="./?page=delete&amp;id=<?=$singlemovie['id']?>">Delete Movie</a>
  	<br>
  	<a href="./">Back to Movies List</a>

  </body>
</html>