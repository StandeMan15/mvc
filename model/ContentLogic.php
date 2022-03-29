<?php

require_once "model/DataHandler.php";

class ContentLogic
{
    public function __construct()
    {
      $this->DataHandler = new Datahandler("localhost", "mysql", "mvc", "root", "");
      //$this->FileUpload = new FileUpload();
    }

    public function __destruct()
    {

    }

    public function readContent($id){

        try{
    
          $sql = "SELECT * FROM `contacts` WHERE `id`='{$id}'";
          $results = $this->DataHandler->readData($sql);
          return $results;
    
        } catch (Exception $e){
          throw $e;
        }
    
    }

    public function createContent($contentName, $contentType, $contentHtml, $contentUrl, $contentActivity, $contentCreateDate, $contentUpdateDate)
    {
      try {
  
        $sql = "INSERT INTO `content` (`id`, `content_name`, `content_type`, `content_html`, `content_url`, `content_active`, `creation_date`, `update_date`) VALUES (NULL, '{$contentName}', '{$contentType}', '{$contentHtml}', '{$contentUrl}', '{$contentActivity}', '{$contentCreateDate}', '{$contentUpdateDate}')";
        $results = $this->DataHandler->createData($sql);
        return $results;
  
      } catch (Exception $e) {
        throw $e;
      }
    }

    public function readallContent()
    {
      try {
  
        $sql = 'SELECT * FROM content';
        $results = $this->DataHandler->readsData($sql);
        return $results;
  
      } catch (Exception $e) {
        throw $e;
      }
    }

    public function updateContact($id, $contentName, $contentType, $contentHtml, $contentUrl, $contentActivity, $contentCreateDate, $contentUpdateDate) {

        try{
    
          $sql = "UPDATE `content` SET `content_name`='{$contentName}', `content_type`='{$contentType}', `content_html`='{$contentHtml}', `content_url`='{$contentUrl}', `content_active`='{$contentActivity}', `creation_date`='{$contentCreateDate}', `update_date`='{$contentUpdateDate}' WHERE `id`='{$id}'";
          $results = $this->DataHandler->updateData($sql);
          return $results;
    
        } catch (Exception $e){
          throw $e;
        }
      }

    // public function getContent() {

    // }

}

?>