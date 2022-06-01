<?php

require_once 'model/HeaderLogic.php';
require_once 'model/Display.php';

require 'view/assets/loggedinheader.json';
require 'view/assets/loggedoutheader.json';
require 'view/assets/dropdownheader.json';

class HeaderController {
    public function __construct() {
        $this->HeaderLogic = new HeaderLogic();
        $this->Display = new Display();
    }
    public function __destruct() {}
    public function handleRequest() {
        try{

            
            isset($_GET['con']) === 'header' ? $_GET['con'] : $_GET['con'] = 'header';

            $op = isset($_GET['op']) ? $_GET['op'] : '';

            switch ($op) {
                case 'loggedin':
                    $this->LoggedInHeader();
                    break;

                case 'loggedout':
                    $this->LoggedoutHeader();
                    break; 

                case 'dropdown':
                    $this->DropdownHeader();
                    break;     
                       
                default:
                    # code...
                    $this->LoggedOutHeader();
                    break;
            }

        } catch (Exception $e) {
            throw $e;
        }
    }

    public function LoggedOutHeader($loggedout)
    {
        foreach ($loggedout as $key=>$value) {
            return "<a href=" . $value->url . ">" . $value->name . "</a>"; 
          } 
    }

    public function LoggedInHeader($loggedin)
    {
        foreach ($loggedin as $key=>$value) {
            return "<a href=" . $value->url . ">" . $value->name . "</a>"; 
          } 
    }

    public function DropdownHeader($dropdown)
    {
        foreach ($dropdown as $key=>$value) {
            return "<a href=" . $value->url . ">" . $value->name . "</a>"; 
          } 
    }
}