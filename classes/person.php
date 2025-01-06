<?php
namespace classes;

use PDO;

class person {
    protected $name;
    protected $email;
    protected $password;
    protected $role;

    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }
    public function login($email, $password) {

        $dbConnection = dbConnaction::getConnection();
        $stetment = $dbConnection->prepare("SELECT * FROM users WHERE user_email = :email");
        $stetment->bindParam(':email', $email);
        $stetment->execute();
        $result = $stetment->fetch(PDO::FETCH_ASSOC);

        var_dump($result);
        var_dump(password_verify($password, $result['user_password']));
            if (password_verify($password, $result['user_password']))
            {
                    session_start();
                    $_SESSION['id'] = $result['user_id'];
                    $_SESSION['name'] = $result['user_name'];
                    $_SESSION['email'] = $result['user_email'];
                    $_SESSION['role'] = $result['user_role'];
                    if ($result['user_role'] == 1) {
                        header('Location: Dashboard.php');
                        exit();
                    }else{
                        header('Location: UserPage.php');
                        exit();
                    }
            }else{
                header('Location: Login.php');
            }
    }


    public static function EmailExists($email){
        $db = dbConnaction::getConnection();
        $statement = $db->prepare("SELECT * FROM users WHERE user_email = :email");
        $statement->bindParam(':email', $email);
        $statement->execute();
        $result = $statement->fetch();
        if($statement->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

}
