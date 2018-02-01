<?php

class Comment extends BaseModel {
  public function __construct() {
    parent::__construct();
  }

  public function getCommentByPostId($id) {
    $stmt = $this->conn->prepare("SELECT c.author, c.body FROM comments as c WHERE c.post_id = ?");
    $stmt->execute([$id]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
