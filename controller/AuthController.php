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

                case 'showregister':
                    $this->ReadRegister();
                    break;

                case 'showeditregister':
                    $this->showeditregister();
                    break;

                case 'editregister':
                    $this->editregister();
                    break;

                case 'deletewarning':
                    $this->deletewarning();
                    break;

                case 'delete':
                    $this->deleteuser();
                    break;
                
                case 'triggerforgotpsw':
                    $this->triggerforgotpsw();
                        
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

    public function ReadRegister()
    {
        include 'view/auth/register.php';
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

    public function collectCreateAuth() 
    {
        if(empty(trim($_POST["fname"]))){
            $firstname_err = "Please enter your firstname.";
        } else{
            $firstname = trim($_POST["fname"]);
        }

        if(empty(trim($_POST["lname"]))){
            $lastname_err = "Please enter your lastname.";
        } else{
            $lastname = trim($_POST["lname"]);
        }

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

        if(empty(trim($_POST["email"]))){
            $email_err = "Please enter your email.";
        } else{
            $email = trim($_POST["email"]);
        }

        $res = $this->AuthLogic->createAuth($firstname, $lastname, $username, $password, $email);
        include 'view/auth/read.php';
    }

    public function showeditregister()
    {
        include 'view/auth/update.php';
    }

    public function editregister()
    {
        if(empty(trim($_POST["fname"]))){
            $firstname_err = "Please enter your firstname.";
        } else{
            $firstname = trim($_POST["fname"]);
        }

        if(empty(trim($_POST["lname"]))){
            $lastname_err = "Please enter your lastname.";
        } else{
            $lastname = trim($_POST["lname"]);
        }

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

        if(empty(trim($_POST["email"]))){
            $email_err = "Please enter your email.";
        } else{
            $email = trim($_POST["email"]);
        }

        $res = $this->AuthLogic->editAuth($firstname, $lastname, $username, $password, $email);
        include 'view/auth/update.php';
    }

    public function deletewarning() 
    {
        include 'view/auth/deletewarning.php';
    }

    public function deleteuser() 
    {
        $username = $_SESSION['currentuser'];
        $res = $this->AuthLogic->deleteUser($username);
        include 'view/auth/read.php';
    }

    public function destoryLogin() 
    {
        include 'view/auth/logout.php';
    }

    public function triggerforgotpsw()
    {
        $to = 'recipients@email-address.com';
        $subject = 'Hello from XAMPP!';

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Create email headers
        $from = "the big mailhog";
        $headers .= 'From: '.$from."\r\n".
            'Reply-To: '.$from."\r\n" .
            'X-Mailer: PHP/' . phpversion();

        // Compose a simple HTML email message
        $message = '<html><body>';
        $message .= '<h1 style="color:#f40;">Hi User!</h1>';
        $message .= '<p style="color:#080;font-size:18px;">This is your only chance to redeem yourself</p>';
        $message .= '<a href="">click here to redeem yourself </a>';
        $message .= '</body></html>';

        if (mail($to, $subject, $message, $headers)) {
          echo "SUCCESS";
        } else {
          echo "ERROR";
        }
    }
}