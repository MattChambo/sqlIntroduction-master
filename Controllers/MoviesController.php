<?php


require "Views/MoviesView.php";
require "Views/MovieFormView.php";

class MoviesController extends Controller {

	public function show() {
		$movie = new Movie;
		$singlemovie = $movie->find();

		$view = new MoviesView(compact('singlemovie'));
		$view->render();
	}

	public function edit() {
		
		$view = new MoviesFormView;
		$view->render();
	}

	public function delete() {
		
		Movie::deleteMovie();
		header("location:./");
	}
}