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
      $sql = "SELECT * FROM `user` WHERE `username` = '{$username}' AND `password` = '{$password}'";
      $res = $this->DataHandler->readData($sql);

      if ($res ->rowCount() > 0) {
        $row = $res->fetch(PDO::FETCH_ASSOC);
        $_SESSION['currentuser'] = $row['username'];
        $_SESSION['loggedin'] = true;
        return "<h3>U bent succesvol ingelogd</h3>";

      } else {
        $res = "Incorrecte gegevens";
      }

      return $res;

    } catch (Exception $e) {
      throw $e;
    }
  }

}
