<?php
/**
 * Created by PhpStorm.
 * User: Radosav
 * Date: 28.2.2016.
 * Time: 16.21
 */
	class Database {
		protected $link;
		private $host,$username,$password,$database;

		// Constructor for class Database
		// This creates a link to the database and allows the user to execute a query
		public function __construct($host,$username,$password,$database){
			$this->host        = $host;
			$this->username    = $username;
			$this->password    = $password;
			$this->database    = $database;
			
			$this->link = new PDO('mysql:host='.$host. ';dbname='. $database, $username, $password)
				OR die("There was a problem connecting to the database.");

			$this->link->query('use '.$database)
				OR die("There was a problem selecting the database.");

			return true;
		}

		// Destorys the link to the database in order to free the connection to the Database
		public function __destruct() {
			$this->link = null;
		}

		// Executes a query to the Database, this method should only be used inside of model classes
		protected function query($query) {
			$link = $this->link;
			$result = $link->query($query);

			if (!$result) die('Invalid query: ' . mysql_error());
			return $result;
		}
	}
