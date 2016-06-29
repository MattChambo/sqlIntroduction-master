<?php
class MoviesView extends View {

	public function render() {
		extract($this->data);
		include "templates/movie.php";
	}
}