<?php

$dbc = new mysqli('localhost', 'root','','matts_db');

function getMovieList() {

	global $dbc;

	$sql = "SELECT id, title, description, release_date FROM movies";

	$result = $dbc->query($sql);

	$movieArray = [];

	while($allMovies = $result->fetch_assoc()){
		$movieArray[]= $allMovies;
	}
	
	return $movieArray;

}

function getSingleMovie() {
	global $dbc;

	if(isset($_GET['id'])){
		$id = $_GET['id'];
	} else {
		$id = null;
	}

	$sql = "SELECT id, title, description, release_date, duration FROM movies WHERE id ='$id'";

	$result = $dbc->query($sql);

	$singlemovie = $result->fetch_assoc();
	return $singlemovie;

}

function deleteMovie() {
	global $dbc;
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	} 

	$sql = "DELETE FROM movies WHERE id = '$id'";

	$result = $dbc->query($sql);
	header("Location:./");
}

function editMovie() {

	global $dbc;

	// Obtain all information from $_POST
	$id = $_POST['id'];
	$title=$_POST['title'];
	$description=$_POST['description'];
	$rating=$_POST['rating'];
	$duration=$_POST['duration'];
	$date=$_POST['release_date'];

	$sql = "UPDATE movies SET title='$title', description='$description', rating='$rating', release_date='$date', duration='$duration' WHERE id='$id'";
	$result = $dbc->query($sql);
	header("Location:./?page=movie&id=$id");
}

function addMovie() {
	global $dbc;

	// Obtaining all values from the $_POST array
	$title=$_POST['title'];
	$description=$_POST['description'];
	$rating=$_POST['rating'];
	$duration=$_POST['duration'];
	$date=$_POST['release_date'];

	$sql = "INSERT INTO `movies`(title, description, rating, duration, release_date) 
			VALUES ('$title','$description','$rating','$duration','$date')";

			$dbc->query($sql);
			header("Location:./?page=home");
}

function genreList() {
	global $dbc;

	$id = isset($_GET['id']) ? $_GET['id'] : null;

	$sql="SELECT id, genres FROM genres JOIN movie_genre ON id=genre_id WHERE movie_id = '$id'";

	$result = $dbc->query($sql);

	$allGenres = $result->fetch_all();

	var_dump($allGenres);
}



?>