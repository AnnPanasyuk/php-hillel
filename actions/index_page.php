<?php

  class IndexPage extends BasePage {
    private $postModel;

    public function __construct() {
      $this->postModel = new Post();
    }

    protected function get() {
      $posts = $this->postModel->getPostsWithCommentsCount();
      if (isset($this->session['username'])) {
        echo 'Hello, ' . $this->session['username'] . '!';
      }

      require_once './view/index.php';
    }
  }
