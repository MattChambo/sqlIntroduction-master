<?php

class Movie extends Database {

	public $tablename = "movies";
	public $columns = ['id', 'title', 'description', 'rating', 'duration', 'release_date'];
}