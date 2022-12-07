<?php

class UserLogin{

    private $email;
    private $password;

    function __construct($email,$password){
        $this->email = $email;
        $this->password = $password;
    }

    function isValidLogin(){
        $servername = "localhost";
        $email = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=dolphin_crm", $email, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $admins_sql = "SELECT * FROM users WHERE email = '{$this->email}' and password = '{$this->password}'";
            $result = $conn->query($admins_sql);
            $row = $result->rowCount();
            if ($row == 1){
                return TRUE;
            }
            else{
                return FALSE;
            }
        } 
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return FALSE;
        }

    }
    function currentLogin(){
        return $this->email;
    }

}


?>