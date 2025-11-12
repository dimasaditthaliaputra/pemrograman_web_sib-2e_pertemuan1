<?php
class Database {
    private $host = "localhost";
    private $username = "postgres"; 
    private $password = "";
    private $database = "prakwebdb";
    public $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $this->conn = pg_connect("host=$this->host dbname=$this->database user=$this->username password=$this->password");

        if (!$this->conn) {
            die("Connection failed: " . pg_last_error());
        }
    }
}
?>