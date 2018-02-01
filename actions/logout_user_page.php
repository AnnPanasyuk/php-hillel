<?php

class LogoutUserPage extends BasePage {
  protected function get() {
    
  }

  protected function post() {
    session_destroy();
    $this->redirect('/');
  }
}
