<?php
namespace classes;


class user extends person
{
    public function __construct($name, $email, $password, $roleId)
    {
        parent::__construct($email, $password);
    }

    public function singup($name,$email, $password){
        $roleId = 2;
        $db = dbConnaction::getConnection();
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stement = $db->prepare("INSERT INTO users(user_name,user_email, user_password, user_role) VALUES(:name,:email, :password, :role)");
        $stement->bindParam(':email', $email);
        $stement->bindParam(':password', $password);
        $stement->bindParam(':name', $name);
        $stement->bindParam(':role', $roleId);
        $stement->execute();
       header('Location: /Drive-Loc/login.php');
       exit();
    }
    public static function userCount(){
        $db = dbConnaction::getConnection();
        $statement = $db->query("SELECT COUNT(*) as result FROM users");
        $result = $statement->fetch();
        return $result["result"];
    }
}
