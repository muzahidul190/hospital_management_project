<?php


    define("DB_HOST","50.3.237.168");
    define("DB_USER","muzahidu_dbms");
    define("DB_PASS","dbms@1234!");
    define("DB_NAME","muzahidu_dbms_hospital");

    class Database{
        public $conn;
        function __construct()
        {
            $this->conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        }
    }

    $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    // if(!mysqli_connect_error($conn)){
    //     echo "Successfully connected!";
    // }else{
    //     echo "Failed!";
    // }
?>