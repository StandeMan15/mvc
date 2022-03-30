<?php

require_once "model/DataHandler.php";

class OrderLogic
{
    public function __construct()
    {
      $this->DataHandler = new Datahandler("localhost", "mysql", "mvc", "root", "");
      //$this->FileUpload = new FileUpload();
    }

    public function __destruct()
    {

    }

    public function readOrder($id){

        try{
    
          $sql = "SELECT * FROM `contacts` WHERE `id`='{$id}'";
          $results = $this->DataHandler->readData($sql);
          return $results;
    
        } catch (Exception $e){
          throw $e;
        }
    
    }


}

?>