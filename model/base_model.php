<?php

class BaseModel {
  protected $conn;

  protected $user = 'b25cbb3c2a67e8';
  protected $pass = '27a19b26';
  protected $host = 'eu-cdbr-west-02.cleardb.net';
  protected $dbName = 'heroku_6581c8c11289bc0';

  public function __construct() {
    $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbName,
                          $this->user,
                          $this->pass);
  }
}
