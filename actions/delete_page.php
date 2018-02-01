<?php

  class DeletePostPage extends BasePage {
    private $postModel;

    public function __construct() {
      $this->postModel = new Post();
    }

    protected function post() {
      $this->postModel->deletePost($this->postData['id']);
      $this->redirect('/');
    }
  }
