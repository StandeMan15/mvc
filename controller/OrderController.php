<?php

require_once 'model/OrderLogic.php';
require_once 'model/Display.php';

class OrderController {
    public function __construct() {
        $this->OrderLogic = new OrderLogic();
        $this->Display = new Display();
    }
    public function __destruct() {}
    public function handleRequest() {
        try{

            
            isset($_GET['con']) === 'order' ? $_GET['con'] : $_GET['con'] = 'order';

            $op = isset($_GET['op']) ? $_GET['op'] : '';

            switch ($op) {
                case 'order':
                    $this->collectCreateContact();
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
}