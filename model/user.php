<?php

class User extends BaseModel {
  public function __construct() {
    parent::__construct();
  }

  public function createUser($username, $password) {
    $passwordHash = md5($password);

    $stmt = $this->conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->execute([$username, $passwordHash]);
  }

  public function checkUser($username, $password) {
    $passwordHash = md5($password);

    $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->execute([$username, $passwordHash]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!is_null($user)) {
      return $user;
    } else {
      return false;
    }
  }

  public function isUserExists($username) {
    $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!is_null($user)) {
      return true;
    } else {
      return false;
    }
  }

  public function getUserById($id) {
    $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
