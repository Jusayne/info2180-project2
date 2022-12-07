<?php

class Contact{
        private $title;
		private $fname;
        private $lname;
        private $email;
        private $telephone;
        private $company;
        private $type;
        private $assigned_to;
    
        function __construct($title, $fname, $lname, $email, $telephone, $company, $type, $assigned_to){
            $this->title = $title;
            $this->fname = ucfirst($fname);
            $this->lname = ucfirst($lname);
            $this->email = $email;
            $this->telephone = $telephone;
            $this->company = $company;
            $this->type = $type;
            $this->assigned_to = $assigned_to;
        }

        function get_title(){
            return $this->title;
        }
        function get_fname(){
            return $this->fname;
        }
        function get_lname(){
            return $this->lname;
        }
        function get_email(){
            return $this->email;
        }
        function get_telephone_number(){
            return $this->telephone;
        }
        function get_company(){
            return $this->company;
        }
        function get_type(){
            return $this->type;
        }
        function get_assigned_to(){
            return $this->assigned_to;
        }

        function get_contactID(){
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'dolphin_crm';

            $link = mysqli_connect($host, $username, $password, $dbname);
            if($link === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            else{
                $sql_check = "SELECT id FROM contacts WHERE firstname = '$this->fname' AND lastname = '$this->lname'" ;
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

        function addContact(){
            
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'dolphin_crm';

            $link = mysqli_connect($host, $username, $password, $dbname);
            if($link === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            else{
                $sql_check = "SELECT id FROM contacts WHERE firstname = '$this->fname'AND lastname = '$this->lname'" ;
                $result = mysqli_query($link,$sql_check);

                if ($result->num_rows == 1){
                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
    
                    $sql_check = "UPDATE contacts SET title = '$this->title',firstname = '$this->fname',lastname = '$this->lname',email = '$this->email', telephone = '$this->telephone', company = '$this->company', type = '$this->type', assigned_to = '$this->assigned_to', updated_at=Now() WHERE id = '$id'" ;
                
                    if (mysqli_query($link,$sql_check)) {
                        echo "<h4>Contact updated successfully</h4>";
                    } else {
                        echo "Error updating record: " ;
                    }

                        
                }
                else{   	

                    $sql = "INSERT INTO contacts (title, firstname, lastname, email, telephone, company, type,  assigned_to) VALUES
                    ('$this->title','$this->fname', '$this->lname', '$this->email', '$this->telephone', '$this->company', '$this->type', '$this->assigned_to')";

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