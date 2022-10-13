<?php

require_once "model/DataHandler.php";
require_once "model/FileUpload.php";


class ContactsLogic
{
    public function __construct()
    {
      $this->DataHandler = new Datahandler("localhost", "mysql", "mvc", "root", "");
      $this->FileUpload = new FileUpload();
    }

    public function __destruct()
    {
    }
  public function createContact($name, $phone, $email, $address)
  {
    try {

      $image = $this->FileUpload->AvatarUpload($_FILES['file']['name']);

      $sql = "INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `location`, `avatar`) VALUES (NULL, '{$name}', '{$phone}', '{$email}', '{$address}', '{$image}')";
      $results = $this->DataHandler->createData($sql);
      return $results;

    } catch (Exception $e) {
      throw $e;
    }
  }

  public function readContacts($id){

    try{

      $sql = "SELECT * FROM `contacts` WHERE `id`='{$id}'";
      $results = $this->DataHandler->readData($sql);
      return $results;

    } catch (Exception $e){
      throw $e;
    }

  }
  public function readallContacts()
  {

    try {

      $sql = 'SELECT id,name,phone,email,location FROM contacts';
      $results = $this->DataHandler->readsData($sql);
      return $results;

    } catch (Exception $e) {
      throw $e;
    }
  }

  public function updateContact($id,$name,$phone,$email,$location) {

    try{

      $image = $this->FileUpload->AvatarUpload($_FILES['file']['name']);

      $sql = "UPDATE `contacts` SET `name`='{$name}', `phone`='{$phone}', `email`='{$email}', `location`='{$location}', `avatar`='{$image}' WHERE `id`='{$id}'";
      $results = $this->DataHandler->updateData($sql);
      return $results;

    } catch (Exception $e){
      throw $e;
    }
  }
  public function deleteContact($id)
  {
    try{

      $sql = "DELETE FROM `contacts` WHERE `id`='{$id}'";
      $results = $this->DataHandler->deleteData($sql);
      return $results;

    } catch (Exception $e){
      throw $e;
    }
  }
}
