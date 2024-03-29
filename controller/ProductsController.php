<?php

require_once 'model/ProductsLogic.php';
require_once 'model/Display.php';

class ProductsController {
    public function __construct() {
        $this->ProductsLogic = new ProductsLogic();
        $this->Display = new Display();
    }
    public function __destruct() {}
    public function handleRequest() {
        try{

            isset($_GET['con']) === 'products' ? $_GET['con'] : '';

            $op = isset($_GET['op']) ? $_GET['op'] : '';

            switch ($op) {
                case 'create':
                    $this->collectCreateProduct();
                    break;

                case 'delete':
                    $this->collectDeleteProduct($_REQUEST['id']);
                    break;

                case 'update':
                    $this->collectUpdateProduct($_REQUEST['id']);
                    break;

                case 'read':
                    $this->collectReadProduct($_REQUEST['id']);
                    break;

                case 'search':
                    $this->collectSearchProduct();
                    break;

                case 'export':
                    $this->collectExportProducts();
                    break;

                default:
                    # code...
                    $this->collectReadallProducts();
                    break;
            }

        } catch (Exception $e) {
            throw $e;
        }
    }


        public function collectSearchProduct(){

            $search = isset($_REQUEST['search']) ? $_REQUEST['search'] : null;

            if(isset($_POST['searchSubmit'])){

                $html = $this->ProductsLogic->searchProduct($search);
                $html = $this->Display->createTable($html, false);

            }

            include 'view/products/search.php';
        }

        public function collectReadProduct(){

            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

            $res = $this->ProductsLogic->readProducts($id);
            $html = $this->Display->CreateCard($res);

            include 'view/products/read.php';
        }


        public function collectCreateProduct(){


            $product_name = isset($_REQUEST['product_name']) ? $_REQUEST['product_name'] : null;
            $product_price = isset($_REQUEST['product_price']) ? $_REQUEST['product_price'] : null;
            $supplier_id = isset($_REQUEST['supplier_id']) ? $_REQUEST['supplier_id'] : null;
            $product_type_code = isset($_REQUEST['product_type_code']) ? $_REQUEST['product_type_code'] : null;
            $other_product_details = isset($_REQUEST['other_product_details']) ? $_REQUEST['other_product_details'] : null;

            if (isset($_POST['submit'])) {

                $html = $this->ProductsLogic->createProducts($product_name, $product_price, $supplier_id, $product_type_code, $other_product_details);

                $msg = $html;

            }

            include 'view/products/create.php';

        }

        public function collectReadallProducts(){

            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

            $res = $this->ProductsLogic->readAllProducts($page);

            $pages = $res[0];
            $nav = $this->Display->PageNavigation($pages,$page);
            $html = $this->Display->createTable($res[1], true, true);

            include 'view/Products.php';
        }

    public function collectUpdateProduct(){
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] :null;
        $product_name = isset($_REQUEST['product_name']) ? $_REQUEST['product_name'] : null;
        $product_price = isset($_REQUEST['product_price']) ? $_REQUEST['product_price'] : null;
        $other_product_details = isset($_REQUEST['other_product_details']) ? $_REQUEST['other_product_details'] : null;

        if (isset($_POST['submit'])) {

            $res = $this->ProductsLogic->updateProduct($id, $product_name, $product_price, $other_product_details);

            $msg = $res;

            $html = $this->ProductsLogic->readProducts($id);
           // $html = $this->Display->CreateCardProducts($html);

            include 'view/products/read.php';
        }

        $html = $this->ProductsLogic->readProducts($id);
        $html = $html->fetch(PDO::FETCH_ASSOC);

        include 'view/products/update.php';
    }


    public function collectDeleteProduct(){

        $id = isset($_REQUEST['product_id']) ? $_REQUEST['product_id'] :null;

        if (isset($_POST['submit'])) {

            $html = $this->ProductsLogic->deleteContact($id);

            $msg = $html;
        }

        $html = $this->ProductsLogic->readProducts($id);
        $html = $html->fetch(PDO::FETCH_ASSOC);

        include 'view/products/delete.php';
    }

    public function collectExportProducts() {



    }
}