<?php
require_once 'controller/ProductsController.php';
require_once 'controller/ContactsController.php';
require_once 'controller/ContentController.php';
require_once 'controller/OrderController.php';

class MainController {
    public function __construct() {
        $this->ContactsController = new ContactsController();
        $this->ProductsController = new ProductsController();
        $this->ContentController = new ContentController();
        $this->OrderController = new OrderController();
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
                    $this->ContentController->handleRequest();
                    break;

                case 'order':
                    $this->OrderController->handleRequest();
                    break;
                
                default:
                    # code...
                    $this->ProductsController->handleRequest();
                    break;
            }

        } catch (Exception $e) {
            throw $e;
        }
    }


}