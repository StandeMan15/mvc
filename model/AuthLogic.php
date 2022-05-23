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

  public function readAuth($username,$password)
  {
    try {
      $sql = "SELECT * FROM `user` WHERE `username` = '{$username}'";
      $res = $this->DataHandler->readData($sql);

      if ($res ->rowCount() > 0) {
        $row = $res->fetch(PDO::FETCH_ASSOC);
        $_SESSION['currentuser'] = $row['uname'];
        $_SESSION['loggedin'] = true;
      } else {
        $res = "Invalid password";
      }

      return $res;

    } catch (Exception $e) {
      throw $e;
    }
  }

}
