<?php

class RegisterUserPage extends BasePage {
  private $userModel;
  private $errors = [];

  public function __construct() {
    $this->userModel = new User();
  }

  protected function get() {
    require_once './view/register.php';
  }

  protected function post() {
    $username = $this->postData['username'];
    $password = $this->postData['password'];
    $passwordApprove = $this->postData['password_approve'];

    if ($password != $passwordApprove) {
      $this->redirect('/register');
    }

    if ($this->userModel->isUserExists($username)) {
      $this->redirect('/register');
    }

    $this->userModel->createUser($username, $password);

    $this->redirect('/login');
  }
}
