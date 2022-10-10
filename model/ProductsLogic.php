<?php

require_once "model/DataHandler.php";
require_once "model/FileUpload.php";


class ProductsLogic
{
  public function __construct()
  {
    $this->DataHandler = new Datahandler("localhost", "mysql", "mvc", "root", "");
    $this->FileUpload = new FileUpload();
  }

  public function __destruct(){}


  public function searchProduct($search){

    try{
      $sql = "SELECT * FROM products
      WHERE (id LIKE '%$search%'
          OR Product_type_code LIKE '%$search%'
          OR product_name LIKE '%$search%'
          OR product_price LIKE '%$search%'
          OR other_product_details LIKE '%$search%'
          OR product_price LIKE '%$search%')";
      $results = $this->DataHandler->readsData($sql);
      return $results;

    } catch (Exception $e){
      throw $e;
    }

  }

  public function pagenav(){

    try {

      $sql = "SELECT FOUND_ROWS() as total FROM products";
      $results = $this->DataHandler->countPages($sql);
      return $results;

    } catch (Exception $e) {
      throw $e;
    }

  }

  public function createProducts($product_name, $product_price, $supplier_id, $product_type_code, $other_product_details) {
    try {

      $sql = "INSERT INTO `products` (`id`, `product_name`, `product_price`, `other_product_details`, `supplier_id`, `product_type_code`) VALUES (NULL, '{$product_name}', '{$product_price}', '{$other_product_details}', '{$supplier_id}', '{$product_type_code}')";
      $results = $this->DataHandler->createData($sql);
      return $results;

    } catch (Exception $e) {
      throw $e;
    }
  }

  public function readProducts($id){

    try{

      $sql = "SELECT * FROM `products` WHERE `id`='{$id}'";
      $results = $this->DataHandler->readData($sql);
      return $results;

    } catch (Exception $e){
      throw $e;
    }

  }
  public function readallProducts($page) {

    try {
      // $sql = "SELECT FOUND_ROWS() as total FROM products";
      // $result1 = $this->DataHandler->countPages($sql, $perPage);

      // // $sql = "SELECT id as id, product_name, product_price, supplier_id, product_type_code, other_product_details FROM products LIMIT $limit, $perpage";
      // $sql = "SELECT id as id, product_name, Replace(Replace(Concat('€ ', Format(`product_price`, 2)), ',', ''), '.', ',') AS `product_price`, supplier_id, product_type_code, other_product_details FROM products LIMIT $limit, $perPage";
      // $results = $this->DataHandler->readsData($sql);

      // $arry = [$result1, $results];
      // return $arry;

      //---------------------------------------
      $offset = ($page-1)*ITEMS_PER_PAGE;
      $sql = 'SELECT * FROM products LIMIT '.$offset.','.ITEMS_PER_PAGE;
      $paginationsql = "SELECT id, product_name, Replace(Replace(Concat('€ ', Format(`product_price`, 2)), ',', ''), '.', ',') AS `product_price`, supplier_id, product_type_code, other_product_details FROM products";

      $results = $this->DataHandler->countPages($paginationsql);
      $results2 = $this->DataHandler->readsData($sql);

      $results = [$results, $results2];

      return $results;

    } catch (Exception $e) {
      throw $e;
    }
  }

  public function updateProduct($id,$product_name,$product_price,$other_product_details) {
    try{

      $sql = "UPDATE `products` SET `product_name`='{$product_name}', `other_product_details`='{$other_product_details}', `product_price`='{$product_price}' WHERE `id`='{$id}'";
      $results = $this->DataHandler->updateData($sql);
      return $results;

    } catch (Exception $e){

      throw $e;
    }
  }
  public function deleteProduct($id) {
    try{

      $sql = "DELETE FROM `products` WHERE `id`='{$id}'";
      $results = $this->DataHandler->deleteData($sql);
      return $results;

    } catch (Exception $e){
      throw $e;
    }
  }

  public function exportProducts() {

  }
}
