<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once 'controller/MainController.php';

$main = new MainController();
$main->handleRequest();