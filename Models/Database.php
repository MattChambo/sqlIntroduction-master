<?php

class Database {
	public $dbc;

	public function getDatabaseConnection() {

		$dsn = "mysql:host=localhost;dbname=matts_db;charset=utf8";
		$dbc = new PDO($dsn, 'root', '');

		$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbc->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		return $dbc;
	}

	public function SelectAll() {

		$dbc = $this->getDatabaseConnection();

		$sql = "SELECT " . implode(",", $this->columns) . " FROM " . $this->tablename;

		$statement = $dbc->prepare($sql);

		$statement->execute();

		$Array = [];

		while($all = $statement->fetch(PDO::FETCH_ASSOC)){
		$Array[]= $all;
		}
		
		return $Array;

	}

	public function find() {
		$dbc = $this->getDatabaseConnection();

		$id = isset($_GET['id']) ? $_GET['id'] : null;

		$sql = "SELECT " . implode(",", $this->columns) . " FROM " . $this->tablename . " WHERE id=:id";

		$statement = $dbc->prepare($sql);

		$statement->bindValue(":id", $id);

		$statement->execute();

		$singlerecord = $statement->fetch(PDO::FETCH_ASSOC);

		return $singlerecord;
	}
}