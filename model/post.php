<?php

  class Post extends BaseModel {
    public function __construct() {
      parent::__construct();
    }

    public function validate($title, $body) {
      $errors = [];

      if (strlen($title) < 5) {
        $errors[] = 'Title string is too short!';
      }

      if (empty($body)) {
        $errors[] = 'Body should not be empty!';
      }

      return $errors;
    }

    public function getPosts() {
      $res = $this->conn->query('SELECT p.id, p.title, p.body, u.username as author
                                 FROM posts as p
                                 JOIN users as u ON p.user_id = u.id');
      return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPostsWithCommentsCount() {
      $res = $this->conn->query('SELECT p.id, u.username as author,
                                 p.title, p.body, COUNT(c.id) as comments_count
                                 FROM posts as p
                                 JOIN users as u ON p.user_id = u.id
                                 LEFT JOIN comments as c ON p.id = c.post_id
                                 GROUP BY p.id');
      return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPost($id) {
      $stmt = $this->conn->prepare('SELECT p.id, p.title, p.body, u.username as author
                                    FROM posts as p
                                    JOIN users as u ON p.user_id = u.id
                                    WHERE p.id = ?');
      $stmt->execute([$id]);

      return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addPost($title, $body, $user_id) {
      $stmt = $this->conn->prepare('INSERT INTO posts (title, body, user_id) VALUES (?, ?, ?)');
      $stmt->execute([$title, $body, $user_id]);

      return $this->conn->lastInsertId();
    }

    public function deletePost($id) {
      $stmt = $this->conn->prepare('DELETE FROM posts WHERE id = ?');
      $stmt->execute([$id]);
    }
  }
