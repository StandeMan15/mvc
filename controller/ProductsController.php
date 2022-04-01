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
            $html = $this->Display->CreateCardProduct($res);

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
            $perPage = 5;
            $limit = ($page > 1) ? ($page * $perPage) - $perPage : 0;

            // $pages = $this->ProductsLogic->pagenav($perPage);

            $res = $this->ProductsLogic->readallProducts($limit,$perPage);

            
            $pages = $res[0];
            $nav = $this->Display->PageNavigation($pages,$page);
            $html = $this->Display->createTable($res[1], true);
            
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
            
            $html = $this->ProductsLogic->deleteProduct($id);

            $msg = $html;
        }

        $html = $this->ProductsLogic->readProducts($id);
        $html = $html->fetch(PDO::FETCH_ASSOC);

        include 'view/products/delete.php';
    }

    public function collectExportProducts() {


        $html = $this->ProductsLogic->exportProducts();
        $csv = $html->fetchall(PDO::FETCH_ASSOC);

        echo "<pre>";
        var_dump($csv);

        if (count($csv) > 0) {
            $delimiter = ","; 
            $filename = "members-data_" . date('Y-m-d') . ".csv"; 
             
            $f = fopen('php://memory', 'w');

            $fields = array('ID', 'product naam', 'product prijs', 'supplier id', 'product type code', 'other details'); 
            fputcsv($f, $fields, $delimiter); 

            while($row = count($csv)) {

                $lineData = array($row['product_id'], $row['product_price'], $row['supplier_id'], $row['product_type_code'], $row['other_product_details']); 
                fputcsv($f, $lineData, $delimiter); 
            } 
            
            fseek($f, 0); 
            
            header('Content-Type: text/csv'); 
            header('Content-Disposition: attachment; filename="' . $filename . '";'); 
            
            fpassthru($f);
        }
        
        include 'view/products/createCSV.csv';
    }

}