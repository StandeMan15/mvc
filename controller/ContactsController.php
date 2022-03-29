<?php

require_once 'model/ContactsLogic.php';
require_once 'model/Display.php';

class ContactsController {
    public function __construct() {
        $this->ContactsLogic = new ContactsLogic();
        $this->Display = new Display();
    }
    public function __destruct() {}
    public function handleRequest() {
        try{

            
            isset($_GET['con']) === 'contacts' ? $_GET['con'] : $_GET['con'] = 'contacts';

            $op = isset($_GET['op']) ? $_GET['op'] : '';

            switch ($op) {
                case 'create':
                    $this->collectCreateContact();
                    break;

                case 'delete':
                    $this->collectDeleteContact($_REQUEST['id']);
                    break;

                case 'update':
                    $this->collectUpdateContact($_REQUEST['id']);
                    break;

                case 'read':
                    $this->collectReadContact($_REQUEST['id']);
                    break;
                
                default:
                    # code...
                    $this->collectReadallContacts();
                    break;
            }

        } catch (Exception $e) {
            throw $e;
        }
    }


        public function collectReadContact(){

            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

            $res = $this->ContactsLogic->readContacts($id);
            $html = $this->Display->CreateCardContact($res);

            include 'view/contacts/read.php';
        }


        public function collectCreateContact(){


            $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
            $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
            $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
            $location = isset($_REQUEST['location']) ? $_REQUEST['location'] : null;
            $target_file = isset($_REQUEST['file']) ? $_REQUEST['file'] : null;

            if (isset($_POST['submit'])) {



                $html = $this->ContactsLogic->createContact($name, $phone, $email, $location, $target_file);

                $msg = $html;
                
            }

            include 'view/contacts/create.php';
        
        }
        public function collectReadallContacts(){
            $res = $this->ContactsLogic->readallContacts();
            $html = $this->Display->createTable($res, true);
            
            // $contacts = $this->ContactsLogic->readallContacts();
            include 'view/contacts.php';
        }

    public function collectUpdateContact(){
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] :null;
        $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
        $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
        $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
        $location = isset($_REQUEST['location']) ? $_REQUEST['location'] : null;
        $target_file = isset($_REQUEST['file']) ? $_REQUEST['file'] : null;

        if (isset($_POST['submit'])) {
            
            $res = $this->ContactsLogic->updateContact($id, $name, $phone, $email, $location, $target_file);

            $msg = $res;

            $html = $this->ContactsLogic->readContacts($id);
            $html = $this->Display->CreateCard($html);

            include 'view/contacts/read.php';
        }

        $html = $this->ContactsLogic->readContacts($id);
        $html = $html->fetch(PDO::FETCH_ASSOC);

        include 'view/contacts/update.php';
    }
    public function collectDeleteContact(){

        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] :null;

        if (isset($_POST['submit'])) {
            
            $html = $this->ContactsLogic->deleteContact($id);

            $msg = $html;
        }

        $html = $this->ContactsLogic->readContacts($id);
        $html = $html->fetch(PDO::FETCH_ASSOC);

        include 'view/contacts/delete.php';
    }
}