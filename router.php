<?php

class Router {
  const ROUTE_KEY = 'r';

  private $getArray;
  private $postArray;
  private $session;
  private $acl;

  private $actionArray = [];

  public function __construct($getArray, $postArray, &$session, $server, $acl) {
    $this->getArray = $getArray;
    $this->postArray = $postArray;
    $this->session =& $session;
    $this->server = $server;
    $this->acl = $acl;
  }

  public function attach($actionName, $action) {
    $this->actionArray[$actionName] = $action;
  }

  public function serve() {
    if (!$this->acl->check($this->getArray[self::ROUTE_KEY], $this->session)) {
      header('location: ./index.php?r=/login');
      return;
    }

    switch ($this->getArray[self::ROUTE_KEY]) {
      case '/':
        $this->actionArray['indexPage']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;
      case '/post':
        $this->actionArray['postPage']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;
      case '/addPost':
        $this->actionArray['addPostPage']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;
      case '/deletePost':
        $this->actionArray['deletePostPage']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;
      case '/register':
        $this->actionArray['registerPage']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;
      case '/login':
        $this->actionArray['loginPage']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;
      case '/logout':
        $this->actionArray['logoutPage']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;

      default:
        echo $this->getArray[self::ROUTE_KEY];
        header('location: ./index.php?r=/');
        break;
    }
  }

  public function dump() {
    var_dump($this);
  }

}
