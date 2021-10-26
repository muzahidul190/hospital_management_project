<?php


    define("DB_HOST","localhost");
    define("DB_USER","root");
    define("DB_PASS","");
    define("DB_NAME","dbms_hospital");

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