<?php

abstract class Database {
	protected $dbc;

	protected $data = [];

		public function __construct($input = null) {
			if(static::$columns) {
				foreach (static::$columns as $column) {
					$this->$column = null;
				}
			}

			if(is_numeric($input)) {
				$this->find($input);

			}

			if(is_array($input)) {
				foreach (static::$columns as $column) {
					$this->$column = $input[$column];
				}
			}
		}

	protected static function getDatabaseConnection() {

		$dsn = "mysql:host=localhost;dbname=matts_db;charset=utf8";
		$dbc = new PDO($dsn, 'root', '');

		$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbc->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		return $dbc;
	}

	public function SelectAll() {

		$dbc = static::getDatabaseConnection();

		$sql = "SELECT " . implode(",", static::$columns) . " FROM " . static::$tablename;

		$statement = $dbc->prepare($sql);

		$statement->execute();

		$Array = [];

		while($all = $statement->fetch(PDO::FETCH_ASSOC)){
		$Array[]= $all;
		}
		
		return $Array;

	}

	public function find() {

		$dbc = static::getDatabaseConnection();

		$id = isset($_GET['id']) ? $_GET['id'] : null;

		$sql = "SELECT " . implode(",", static::$columns) . " FROM " . static::$tablename . " WHERE id=:id";

		$statement = $dbc->prepare($sql);

		$statement->bindValue(":id", $id);

		$statement->execute();

		$singlerecord = $statement->fetch(PDO::FETCH_ASSOC);

		$this->data = $singlerecord;
		// var_dump($this->data);
	}

	public function insert() {

		$dbc = static::getDatabaseConnection();

		$columns = static::$columns;

		unset($columns[array_search('id', $columns)]);

		$sql = "INSERT INTO ". static::$tablename.
		" (". implode(',', $columns).") VALUES (";
		
		$insertColumns =[];
		foreach ($columns as $column) {
			array_push($insertColumns, ":" .$column);
		}


		$sql .= implode(',', $insertColumns);	
		$sql .=")";

	}

	public static function deleteMovie() {

		$dbc = static::getDatabaseConnection();

		$id = isset($_GET['id']) ? $_GET['id'] : null;

		$sql = "DELETE FROM " . static::$tablename . " WHERE id = :id";

		$statement = $dbc->prepare($sql);

		$statement->bindValue(":id", $id);

		$statement->execute();

		header("location:./");

	}

	// public function __set($name, $value) {

	// 	if(! in_array($name, static::$columns))
	// 	{
	// 	$this->data[$name] = $value;
	// 	}
	public function __get($name){

		if(in_array($name, static::$columns)) {
			return $this->data[$name];
		} else {
			echo "property '$name' is not found in the data variable";
		}

	}

}