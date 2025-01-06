<?php
namespace classes;


class admin extends person {

    public function __construct($name, $email, $password, $roleId){
        parent:: __construct($email, $password);
    }

}