<?php
  session_start();

  if (isset($_SESSION['count'])) {
    $_SESSION['count']++;
  } else {
    $_SESSION['count'] = 1;
  }

  if ($_SESSION['count'] > 5) {
    session_destroy();
  }

  echo $_SESSION['count'];
