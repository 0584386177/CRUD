<?php

 require_once '../models/user.php';
 
 class UserController{
    private $db;
    private $user;

    public function __construct(){
        $this->db = (new Database())->connect();
        $this->user = new User($this->db);
    }


 }