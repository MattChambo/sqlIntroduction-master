<?php


require "Views/MoviesView.php";
require "Views/MovieFormView.php";

class MoviesController extends Controller {

	public function show() {

		$id = isset($_GET['id']) ? ($_GET['id']) : null;

		$singlemovie = new Movie($id);

		$view = new MoviesView(compact('singlemovie'));
		$view->render();
	}

	public function edit() {
		
		$id = isset($_GET['id']) ? ($_GET['id']) : null;

		$singlemovie = new Movie($id);


		$view = new MovieFormView(compact('singlemovie'));
		$view->render();
	}

	public function update() {

		$movie = new Movie($_POST);
		$movie->update();

		header("location: ./?page=movie&id=" . $movie->id);

	}

	public function delete() {
		
		Movie::delete($_GET['id']);
		header("location:./");
	}

	public function add() {
		$singlemovie = new Movie;
		$view = new MovieFormView(compact('singlemovie'));
		$view->render();

	}

	public function insert() {

		$movie = new Movie($_POST);
		$movie->insert();

		header("Location: ./?page=movie&id=" . $movie->id);

	}
}