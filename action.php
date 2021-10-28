<?php
    include 'db_con.php';


    class Process extends Database{

        public function verify_email($table,$email,$term){
            $email = strtolower($email);
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
            $regexp = "/^(?:\+88|01)?(?:\d{11}|\d{13})$/";
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

        public function verify_if_exist($table,$content,$term){
            $sql = "SELECT * FROM ".$table." WHERE ".$term." = '$content' LIMIT 1";
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

        public function return_sql_result($table,$term, $content, $order_by_term="", $order_by_type="",$limit=""){
            $sql = "SELECT * FROM $table WHERE $term =".$content;

            if($order_by_type!= "" && $order_by_term!=""){
                $sql.= " ORDER BY ".$order_by_term." ".$order_by_type;
            }
            if(!empty($limit)){
                $sql .= " LIMIT ".$limit;
            }
            
            return mysqli_query($this->conn, $sql);
        }
        
        public function get_day($day_number){
            switch($day_number){
                case 0: return "Saturday";
                case 1: return "Sunday";
                case 2: return "Monday";
                case 3: return "Tuesday";
                case 4: return "Wednesday";
                case 5: return "Thursday";
                case 6: return "Friday";
            }
        }

        public function update_table_values($table,$this_field, $with_this_value, $that_field, $this_value){
            $sql = "UPDATE ".$table." SET `".$this_field."`= ".$with_this_value." WHERE `".$that_field."` =".$this_value;
            return mysqli_query($this->conn, $sql);
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
            if($id){
                echo $name.", Signup Successful. Your id is: ".$id;
                exit();
            }else{
                echo "Registration unsuccessful!";
                exit();
            }
        }

    }


    //Registering Doctors...
    if(isset($_POST["d-email"])){
        $email = $_POST["d-email"];
        $name = $_POST["d-name"];
        $phone = $_POST["d-phone"];
        $depart = $_POST["d-department"];
        $edu_arr = $_POST["deg"];
        if(isset($_POST["day_available"])){
            $routine_arr = $_POST["day_available"];
        }else{
            $routine_arr = array();
        }
        $pass = $_POST["d-pass"];
        $cpass = $_POST["d-cpass"];

        $data = $obj->verify_email("doctors",$email,"d_email");
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

        $education = "";
        $count = COUNT($edu_arr);
        for($i=0;$i<$count;$i++){
            $item = $edu_arr[$i];
            if(!empty($item)){
                $education .= $item."`";
            }
        }
        $education = substr($education, 0, -1);

        $routine = "";
        $count = COUNT($routine_arr);
        for($i=0;$i<$count;$i++){
            $item = $routine_arr[$i];
            if(!empty($item)){
                $routine .= $item.",";
            }
        }
        $routine = substr($routine, 0, -1);

        if(empty($email) || empty($name) || empty($phone) || empty($pass) || empty($cpass)){
            echo "Fields Are Emplty!";
            exit();
        }else{
            $insrt = array("d_email"=>$email,"d_name"=>$name,"d_contact"=>$phone,"d_education"=>$education,"d_routine"=>$routine,"d_password"=>$pass,"d_department_id"=>$depart);
            $id = $obj->insert_record("doctors",$insrt);
            if($id){
                echo $name.", Signup Successful. Your id is: ".$id;
                exit();
            }else{
                echo "Registration unsuccessful!";
                exit();
            }
        }

    }


    //Add new department...
    if(isset($_POST["dep-name"])){
        $name = $_POST["dep-name"];
        $seat = $_POST["dep-seats"];
        if(empty($seat)){
            $seat = 0;
        }
        $seat_cost = $_POST["dep-per-sit-cost"];
        if(empty($seat_cost)){
            $seat_cost = 0;
        }
        $details = $_POST["dep-details"];
        if(empty($details)){
            $details = "No details.";
        }

        if(empty($name)){
            echo "Enter Department Name.";
            exit();
        }else{
            $data = $obj->verify_if_exist("departments",$name,"dep_name");
            if($data == "Good"){
                $insrt = array("dep_name"=>$name,"dep_details"=>$details,"dep_seat"=>$seat,"seat_cost"=>$seat_cost);
                $id = $obj->insert_record("departments",$insrt);
                if($id){
                    header("Content-Type: application/json");
                    echo json_encode(array('id' => $id,'isAdded'=>1,'name'=>$name));
                    exit();
                }else{
                    echo "Creation Unsuccessful";
                    exit();
                }
            }
            echo $data;
            exit();
        }
    }

    // Mark a patient appointment as done
    if(isset($_POST['mark_done_clicked']) && isset($_POST['appointment_id'])){

        $obj->update_table_values("appointments", "app_status", 1, "app_id", $_POST['appointment_id']);
        echo "Marked this appointment as done.";
        exit();
    }


    if(isset($_POST["seat_booking"])){
        $id = $_POST["id"];
        $data = $obj->return_sql_result("departments","dep_id",$id,"","",1);
        $value = mysqli_fetch_assoc($data);
        $seat_cost = $value["seat_cost"];
        $dep_seat = $value["dep_seat"];
        $booked = $value["dep_seat_booked"];
        header("Content-Type: application/json");
        echo json_encode(array('cost' => $seat_cost,'total_seat'=>$dep_seat,'booked'=>$booked));
        exit();
    }