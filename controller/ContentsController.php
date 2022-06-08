<?php

require_once 'model/ContentsLogic.php';
require_once 'model/Display.php';

class ContentsController 
{
    public function __construct() {
        $this->ContentLogic = new ContentLogic();
        $this->Display = new Display();
    }
    public function __destruct() {}
    public function handleRequest() {
        try{

            
            isset($_GET['con']) === 'content' ? $_GET['con'] : $_GET['con'] = 'content';

            $op = isset($_GET['op']) ? $_GET['op'] : '';

            switch ($op) {
                case 'create':
                    $this->collectCreateContents();
                    break;

                case 'update':
                    $this->collectUpdateContents($_REQUEST['id']);
                    break;

                case 'read':
                    $this->collectReadContents($_REQUEST['id']);
                    break;

                default:
                    # code...
                    $this->collectReadAllContents();
                    break;
            }

        } catch (Exception $e) {
            throw $e;
        }
    }

        public function collectReadAllContents(){
            $res = $this->ContentLogic->readallContent();
            $html = $this->Display->createTable($res, true, true);
            
            // $contacts = $this->ContactsLogic->readallContacts();
            include 'view/content.php';
        }

        public function collectReadContents(){

            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

            $result = $this->ContentLogic->readContent($id);
            //var_dump($result);
            $html = $this->Display->CreateCard($result);

            include 'view/content/read.php';
        }

        public function collectCreateContents(){

            $contentName = isset($_REQUEST['content_name']) ? $_REQUEST['content_name'] : null;
            $contentType = isset($_REQUEST['content_type']) ? $_REQUEST['content_type'] : null;
            $contentHtml = isset($_REQUEST['content_html']) ? $_REQUEST['content_html'] : null;
            $contentUrl = isset($_REQUEST['content_url']) ? $_REQUEST['content_url'] : null;
            $contentActivity = isset($_REQUEST['content_active']) ? $_REQUEST['content_active'] : null;
            $contentCreateDate = isset($_REQUEST['creation_date']) ? $_REQUEST['creation_date'] : null;
            $contentUpdateDate = isset($_REQUEST['update_date']) ? $_REQUEST['update_date'] : null;

            if (isset($_POST['submit'])) {

                $html = $this->ContactsLogic->createContent($contentName, $contentType, $contentHtml, $contentUrl, $contentActivity, $contentCreateDate, $contentUpdateDate);

                $msg = $html;
                
            }

            include 'view/content/create.php';
        
        }

        public function collectUpdateContents()
        {

            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] :null;
            $contentName = isset($_REQUEST['content_name']) ? $_REQUEST['content_name'] : null;
            $contentType = isset($_REQUEST['content_type']) ? $_REQUEST['content_type'] : null;
            $contentHtml = isset($_REQUEST['content_html']) ? $_REQUEST['content_html'] : null;
            $contentUrl = isset($_REQUEST['content_url']) ? $_REQUEST['content_url'] : null;
            $contentActivity = isset($_REQUEST['content_active']) ? $_REQUEST['content_active'] : null;
            $contentCreateDate = isset($_REQUEST['creation_date']) ? $_REQUEST['creation_date'] : null;
            $contentUpdateDate = isset($_REQUEST['update_date']) ? $_REQUEST['update_date'] : null;
    
            if (isset($_POST['submit'])) {
                
                $res = $this->ContentLogic->updateContent($id, $contentName, $contentType, $contentHtml, $contentUrl, $contentActivity, $contentCreateDate, $contentUpdateDate);
    
                $msg = $res;
    
                $html = $this->ContentLogic->readContent($id);
                $html = $this->Display->CreateCard($html);
    
                include 'view/content/read.php';
            }
    
            $html = $this->ContentLogic->readContent($id);
            $html = $html->fetch(PDO::FETCH_ASSOC);
    
            include 'view/content/update.php';
        }

}