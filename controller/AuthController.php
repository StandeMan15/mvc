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
                case 'registreer':
                    $this->collectCreateAuth();
                    break;

                case 'login':
                    $this->collectReadAuth();
                    break;

                case 'logout':
                    $this->destoryLogin();
                    break;
                
                case 'showlogin':
                    $this->ReadLogin();
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

    public function collectReadAuth() 
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
            //$encptpsw = md5($password);
        }

        $res = $this->AuthLogic->readAuth($username,$password);
        include 'view/auth/read.php';
    }

    public function destoryLogin() 
    {
        include 'view/auth/logout.php';
    }
}