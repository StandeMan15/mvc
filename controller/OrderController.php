<?php

require_once 'model/ProductsLogic.php';
require_once 'model/OrderLogic.php';
require_once 'model/Display.php';

class OrderController {
    public function __construct() {
        $this->ProductsLogic = new ProductsLogic();
        $this->OrderLogic = new OrderLogic();
        $this->Display = new Display();
    }
    public function __destruct() {}
    public function handleRequest() {
        try{

            
            isset($_GET['con']) === 'order' ? $_GET['con'] : $_GET['con'] = 'order';

            $op = isset($_GET['op']) ? $_GET['op'] : '';

            switch ($op) {
                case 'InsertIntoCart':
                    $this->CollectAddToCart();
                    break;

                case 'order':
                    $this->CollectReadProducts();
                    break;

                default:
                    # code...
                    $this->CollectReadProducts();
                    break;
            }

        } catch (Exception $e) {
            throw $e;
        }
    }

    public function CollectReadProducts() {

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;      
        $perPage = 5;
        $limit = ($page > 1) ? ($page * $perPage) - $perPage : 0;

        // $pages = $this->ProductsLogic->pagenav($perPage);

        $res = $this->ProductsLogic->readallProducts($limit,$perPage);

        
        $pages = $res[0];
        $nav = $this->Display->PageNavigation($pages,$page,false);
        $html = $this->Display->createTable($res[1], false, true);

        include 'view/Products.php';
    }

    public function CollectAddToCart() {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

        $order = array("", "");

        $order[0] .= $id;
        $order[1] .= 4; 

        echo "<pre>";
        var_dump($order);
        echo "</pre>";
    }

}
