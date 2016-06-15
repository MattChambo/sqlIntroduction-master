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
		$id = 2;
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
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
	}

	// Obtain all information from $_POST
	$title=$_POST['title'];
	$description=$_POST['description'];
	$rating=$_POST['rating'];
	$duration=$_POST['duration'];
	$date=$_POST['release_date'];

	$sql = "UPDATE movies SET title='$title', description='$description', rating='$rating', release_date='$date', duration='$duration' WHERE id='$id'";
	$result = $dbc->query($sql);
	header("Location:./?page=movie&id=$id");
}




?>