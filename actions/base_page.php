<?php

  class BasePage {
    protected $getData;
    protected $postData;
    protected $session;

    protected function notFound() {
      require_once './view/not_found.php';
    }

    protected function redirect($url) {
      header('location: ./?r=' . $url);
    }

    public function isLoggedIn() {
      if (isset($this->session['username'])) {
        return true;
      } else {
        return false;
      }
    }

    public function process($method, $getData, $postData, &$session) {
      $this->getData = $getData;
      $this->postData = $postData;
      $this->session =& $session;

      switch ($method) {
        case 'GET':
          $this->get();
          break;
        case 'POST':
          $this->post();
          break;
      }
    }
  }
