<?php

if isset($_SESSION) {
    if isset($_SESSION['logged']) {
      $msg = "Welkom";
    } else {
      session_start('logged');
    }
  }

?>