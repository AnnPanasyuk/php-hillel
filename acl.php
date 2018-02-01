<?php
class ACL {
  public $x = '<br>' . 'h2e2l2l2o!';
  private $userModel;
  private $whiteList = ['/register', '/login', '/', '/post'];

  public function __construct() {
      echo $this->x;
      $this->userModel = new User();
  }

  public function check($url, &$session) {
    if (isset($session['id'])) {
      $user = $this->userModel->getUserById($session['id']);

      if (!is_null($user)) {
        return true;
      }
    }


    if (in_array($url, $this->whiteList)) {
        return true;
    } else {
        $session['target_url'] = $url;
        return false;
    }
  }
}
