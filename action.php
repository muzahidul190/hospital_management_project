<?php
    include 'db_con.php';


    class Process extends Database{

        public function verify_email($table,$email,$term){
            $regexp = "/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/";
            if(!preg_match($regexp,$email)){
                return "Invalid email";
            }
            $sql = "SELECT * FROM ".$table." WHERE ".$term." = '$email' LIMIT 1";
            $query = mysqli_query($this->conn,$sql);
            $count = mysqli_num_rows($query);
            if($count == 1){
                return "Already Exists!";
            }else{
                return "Good";
            }

        }
        public function verify_phone($table,$phone,$term){
            $regexp = "/^(?:\+88|01|1)?(?:\d{11}|\d{13}|\d{10})$/";
            if(!preg_match($regexp,$phone)){
                return "Invalid phone";
            }
            $sql = "SELECT * FROM ".$table." WHERE ".$term." = '$phone' LIMIT 1";
            $query = mysqli_query($this->conn,$sql);
            $count = mysqli_num_rows($query);
            if($count == 1){
                return "Already Exists!";
            }else{
                return "Good";
            }

        }

        public function insert_record($table,$input){
            $sql = "";
            $sql .= "INSERT INTO ".$table." ";
            $sql .= "(".implode(",",array_keys($input)).") VALUES ";
            $sql .= "('".implode("','", array_values($input))."')";
            
            $query = mysqli_query($this->conn,$sql);
            $last_id = mysqli_insert_id($this->conn);
            if($query){
                return $last_id;
            }
        }

    }

    $obj = new Process;

    if(isset($_POST["check_email_p"])){
        $email = $_POST["email_p"];
        $term = "p_email";
        $data = $obj->verify_email("patients",$email,$term);
        echo $data;
        exit();
    }
    if(isset($_POST["check_email_d"])){
        $email = $_POST["email_d"];
        $term = "d_email";
        $data = $obj->verify_email("doctors",$email,$term);
        echo $data;
        exit();
    }
    if(isset($_POST["check_phone_p"])){
        $phone = $_POST["phone_p"];
        $term = "p_phone";
        $data = $obj->verify_phone("patients",$phone,$term);
        echo $data;
        exit();
    }

    if(isset($_POST["verify_pass_p"])){
        $pass = $_POST["check_pass_p"];
        $cpass = $_POST["check_cpass_p"];
        if(strlen($pass)<6){
            echo "Short Pass!";
            exit();
        }else if($pass === $cpass){
            echo "Password Matched.";
            exit();
        }else{
            echo "Password Mismached!";
            exit();
        }
    }

    if(isset($_POST["verify_pass_d"])){
        $pass = $_POST["check_pass_d"];
        $cpass = $_POST["check_cpass_d"];
        if(strlen($pass)<6){
            echo "Short Pass!";
            exit();
        }else if($pass === $cpass){
            echo "Password Matched.";
            exit();
        }else{
            echo "Password Mismached!";
            exit();
        }
    }


    //Registering Patients...
    if(isset($_POST["p-email"])){
        $email = $_POST["p-email"];
        $name = $_POST["p-name"];
        $phone = $_POST["p-phone"];
        $gender = $_POST["gender"];
        $dob = $_POST["p-dob"];
        $addrs = $_POST["p-addrs"];
        $pass = $_POST["p-pass"];
        $cpass = $_POST["p-cpass"];

        $data = $obj->verify_email("patients",$email,"p_email");
        if($data == "Already Exists!"){
            echo "Email Already Exists!";
            exit();
        }else if($data == "Invalid email"){
            echo "Email Format Invalid!";
            exit();
        }

        if(strlen($pass)<6){
            echo "Short Pass!";
            exit();
        }else if($pass !== $cpass){
            echo "Password Mismatched!";
            exit();
        }

        if(empty($email) || empty($name) || empty($phone) || empty($gender) || empty($dob) || empty($pass) || empty($cpass)){
            echo "Fields Are Emplty!";
            exit();
        }else{
            $insrt = array("p_email"=>$email,"p_name"=>$name,"p_dob"=>$dob,"p_gender"=>$gender,"p_address"=>$addrs,"p_phone"=>$phone,"p_password"=>$pass);
            $id = $obj->insert_record("patients",$insrt);
            echo $id;
            exit();
        }

    }


?>