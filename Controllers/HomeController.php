<?php

require "Views/View.php";
require "Views/HomeView.php";


class HomeController extends Controller {

	public function show() {
		$movie = new Movie;
		$movies = $movie->SelectAll();
		
		$view = new HomeView(compact('movies'));
		$view->render();
	}

	
}