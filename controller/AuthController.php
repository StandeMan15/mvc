<?php

require_once 'model/AuthLogic.php';
require_once 'model/Display.php';

class AuthController {
    public function __construct() {
        $this->AuthLogic = new AuthLogic();
        $this->Display = new Display();
    }
    public function __destruct() {}
    public function handleRequest() {
        try{

            
            isset($_GET['con']) === 'auth' ? $_GET['con'] : $_GET['con'] = 'auth';

            $op = isset($_GET['op']) ? $_GET['op'] : '';

            switch ($op) {
                case 'register':
                    $this->collectCreateAuth();
                    break;

                case 'login':
                    $this->collectCreateAuth();
                    break;
                
                default:
                    # code...
                    $this->ReadLogin();
                    break;
            }

        } catch (Exception $e) {
            throw $e;
        }
    }

    public function ReadLogin() 
    {
        include 'view/login.php';
    }

    public function collectCreateAuth() 
    {
        if(empty(trim($_POST["uname"]))){
            $username_err = "Please enter username.";
        } else{
            $username = trim($_POST["uname"]);
        }

        if(empty(trim($_POST["psw"]))){
            $password_err = "Please enter your password.";
        } else{
            $password = trim($_POST["psw"]);
        }

        $res = $this->AuthLogic->readAuth($username,$password);
        include 'view/auth/create.php';
    }
}