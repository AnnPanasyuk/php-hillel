<?php

  class AddPostPage extends BasePage {
    private $postModel;
    private $errors = [];

    public function __construct() {
      $this->postModel = new Post();
    }

    protected function get() {
      require_once './view/add_post.php';
    }

    protected function post() {
      $validateErrors = $this->postModel->validate($this->postData['title'],
                                                   $this->postData['body']);

      if (!empty($validateErrors)) {
        $oldValues = $this->postData;
        require_once './view/add_post.php';
        return;
      }

      $id = $this->postModel->addPost($this->postData['title'],
                                      $this->postData['body'],
                                      $this->session['id']);

      $this->redirect('/post&id=' . $id);
    }
  }
