<?php

// include "database.php";
require "Models/Database.php";
require "Models/Movie.php";

// instantiate an object for Movie

// $singlemovie = $movie->find();

// $movies = getMovieList();
// $singlemovie = getSingleMovie(); 

// if (isset($_GET['page'])) {
// 	$page = $_GET['page'];
// } else {
// 	$page ="home";
// }

require "routes.php";

?>
