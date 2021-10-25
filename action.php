<?php
    include 'db_con.php';


    class Process extends Database{

        public function verify_email($table,$email){
            $regexp = "/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/";
            if(!preg_match($regexp,$email)){
                echo "invalid";
            }else{
                echo "good";
            }
        }

        public function insert_record($table,$input){

        }

    }

    $obj = new Process;

    if(isset($_POST["check_email"])){
        $email = $_POST["email"];
        $obj->verify_email("patients",$email);
    }


?>