<?php
require_once 'controller/ProductsController.php';
require_once 'controller/ContactsController.php';
require_once 'controller/ContentsController.php';
require_once 'controller/ZooController.php';
require_once 'controller/AuthController.php';

class MainController {
    public function __construct() {
        $this->ContactsController = new ContactsController();
        $this->ProductsController = new ProductsController();
        $this->ContentsController = new ContentsController();
        $this->ZooController = new ZooController();
        $this->AuthController = new AuthController();
    }
    public function __destruct() {}
    public function handleRequest() {
        try{

            $controller = isset($_GET['con']) ? $_GET['con'] : '';
            
            switch ($controller) {
                case 'contacts':
                    $this->ContactsController->handleRequest();
                    break;

                case 'products':
                    $this->ProductsController->handleRequest();
                    break;
                
                case 'content':
                    $this->ContentsController->handleRequest();
                    break;
                
                case 'zoo':
                    $this->ZooController->handleRequest();
                    break;

                case 'login':
                    $this->AuthController->handleRequest();
                    break;
                
                default:
                    # code...
                    $this->AuthController->handleRequest();
                    break;
            }

        } catch (Exception $e) {
            throw $e;
        }
    }


}