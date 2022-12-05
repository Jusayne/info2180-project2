<?php

class User{
		private $fname;
        private $lname;
        private $userPassword;
        private $email;
        private $role;
        private $created_at;
    
        function __construct($fname, $lname, $userPassword, $email, $role){
            $this->fname = ucfirst($fname);
            $this->lname = ucfirst($lname);
            $this->userPassword = $userPassword;
            $this->email = $email;
            $this->role = $role;
  
        }

        function get_fname(){
            return $this->fname;
        }
        function get_lname(){
            return $this->lname;
        }
        function get_userPassword(){
            return $this->userPassword;
        }
        function get_email(){
            return $this->email;
        }
        function get_role(){
            return $this->role;
        }
        function get_created_at(){
            return $this->created_at;
        }

        function get_userID(){
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'dolphin_crm';

            $link = mysqli_connect($host, $username, $password, $dbname);
            if($link === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            else{
                $sql_check = "SELECT id FROM users WHERE firstname = '$this->fname' AND lastname = '$this->lname'" ;
                $result = mysqli_query($link,$sql_check);
                
                if ($result->num_rows == 1){
                    $row = $result->fetch_assoc();
                    return $row['id'];
                }
                else{
                    return -1;
                }
                
            }
            mysqli_close($link);
        }

        function addUser(){
            
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'dolphin_crm';

            $link = mysqli_connect($host, $username, $password, $dbname);
            if($link === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            else{
                $sql_check = "SELECT id FROM users WHERE firstname = '$this->fname'AND lastname = '$this->lname'" ;
                $result = mysqli_query($link,$sql_check);

                if ($result->num_rows == 1){
                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
    
                    $sql_check = "UPDATE users SET firstname = '$this->fname', lastname = '$this->lname', password = '$this->userPassword', email = '$this->email', role = '$this->role' WHERE id = '$id'" ;
                
                    if (mysqli_query($link,$sql_check)) {
                        echo "<h4>User updated successfully</h4>";
                    } else {
                        echo "Error updating record: " . mysqli_error($conn);
                    }

                        
                }
                else{   	

                    $sql = "INSERT INTO users (firstname, lastname, password, email, role) VALUES
                    ('$this->fname', '$this->lname', '$this->userPassword', '$this->email', '$this->role')";

                    if(mysqli_query($link, $sql)){
                        echo "<h4>$this->fname was added successfully.</h4>";
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
                }
                
            }
            mysqli_close($link);
        }
    }
?>