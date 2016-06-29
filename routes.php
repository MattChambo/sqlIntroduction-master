<?php 

require "Controllers/Controller.php";
require "Controllers/HomeController.php";
require "Controllers/MoviesController.php";
// ternary operator to get page information

$page = isset($_GET['page']) ? $_GET['page'] : "home";

// switch to the page according to values in url

switch ($page) {
	case 'home':
		$controller = new HomeController;
		$controller->show();
		break;
	case 'movie':
		$controller = new MoviesController;
		$controller->show();
		break;
	case 'add':
		addMovie();
		break;
	case 'edit':
		$controller = new MoviesController;
		$controller->edit();
		break;
	case 'delete':
		$controller = new MoviesController;
		$controller->delete();
		break;
	default:
		echo "Error 404! Page not found.";
		break;
}
