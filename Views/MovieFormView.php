<?php
class MovieFormView extends View {

	public function render() {
		extract($this->data);
		include "templates/movieform.php";
	}
}