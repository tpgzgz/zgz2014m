<?php
namespace Application\controllers;

Class Home{
    public $layout ='home.phtml';
    
    public function select()
    {
        
    }
    
    public function login()
    {
        header("Location: /authentication/login");
    }
    
}

