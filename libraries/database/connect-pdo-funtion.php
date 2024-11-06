<?php

class DBController
{
  // DB connection
  protected $host = 'localhost';
  protected $user = 'root';
  protected $password = '';
  protected $database = 'shopee';


  // Connection
  public $conn = null;

  // Call constructor
  public function __construct()
  {
    try {
      $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database;charset=utf8", $this->user, $this->password);
      // Set the PDO error mode to exception
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo 'Connection failed: ' . $e->getMessage();
    }
  }

  public function __destruct()
  {
    $this->closeConnection();
  }

  protected function closeConnection()
  {
    $this->conn = null;
  }
}

$db = new DBController();
