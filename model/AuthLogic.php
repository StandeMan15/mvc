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
      $sql = "SELECT * FROM `user` WHERE `username` = '{$username}' AND `psw` = '{$password}'";
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

  public function createAuth($firstname, $lastname, $username, $password, $email)
  {
    try {
      $sql = "INSERT INTO `user` (firstname, lastname, username, psw, email) "; 
      $sql .= "VALUES ('{$firstname}', '{$lastname}', '{$username}', '{$password}', '{$email}')";
      $res = $this->DataHandler->createData($sql);

      if (!isset($_SESSION)) {
        $_SESSION['currentuser'] = $username;
        $_SESSION['loggedin'] = true;
      }

      return $res;

    } catch (Exception $e) {
      throw $e;
    }
  }

  public function editAuth($firstname, $lastname, $username, $password, $email)
  {
    try {
      $sql = "UPDATE `user` ";
      $sql .= "firstname = $firstname, lastname = $lastname, username = $username, psw = $password, email = $email";
      $sql .= "WHERE username = $username AND email = $email"; 
      $res = $this->DataHandler->createData($sql);

      if (!isset($_SESSION)) {
        $_SESSION['currentuser'] = $username;
        $_SESSION['loggedin'] = true;
      }

      return $res;

    } catch (Exception $e) {
      throw $e;
    }
  }

  public function deleteUser($username)
  {
    try {

      $sql = "DELETE FROM `user` WHERE username = $username";
      $res = $this->DataHandler->deleteData($sql);

      return $res;

    } catch (Exception $e) {
      throw $e;
    }
  }

}
