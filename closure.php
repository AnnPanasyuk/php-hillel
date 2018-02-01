<?php

class Str {
  private $s;

  public function __construct($str) {
    $this->s = $str;
  }

  public function getS() {
    return $this->s;
  }
}

function result(Inter $str) {
  return $str->getS() . '!';
}

echo result(new Str('hello'));
