<?php

require_once "model/DataHandler.php";

class AuthLogic
{
  public function __construct()
  {
    $this->DataHandler = new Datahandler("localhost", "mysql", "mvc", "root", "");
  }

  public function __destruct()
  {
  }

  public function handleLogin($username,$password)
  {
    try {
      $sql = "SELECT * FROM `user` WHERE `username` = '{$username}'";
      $results = $this->DataHandler->readData($sql);
      return $results;

    } catch (Exception $e) {
      throw $e;
    }
  }

}
