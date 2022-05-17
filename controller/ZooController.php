<?php

require_once 'model/ZooLogic.php';
require_once 'model/Display.php';

class ZooController {
    public function __construct() {
        $this->ZooLogic = new ZooLogic();
        $this->Display = new Display();
    }
    public function __destruct() {}
    public function handleRequest() {
        try{

            isset($_GET['con']) === 'zoo' ? $_GET['con'] : '';

            $op = isset($_GET['op']) ? $_GET['op'] : '';

            switch ($op) {

                case 'calculateCosts':
                    $this->CalculateCostsZoo();
                    break;
            
                default:
                    # code...
                    $this->ZooPage();
                    break;
            }

        } catch (Exception $e) {
            throw $e;
        }
    }

        public function ZooPage(){
            include 'view/zoo/form.php';
        }

        public function CalculateCostsZoo(){
            $result = $this->ZooLogic->calculateCosts();
            include 'view/zoo/zooresult.php';
        }

}