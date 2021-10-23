<?php


    $DB_HOST = "localhost";
    $DB_USER = "root";
    $DB_PASS = "";
    $DB_NAME = "dbms_hospital";

    $conn = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);

    // if(!mysqli_connect_error($conn)){
    //     echo "Successfully connected!";
    // }else{
    //     echo "Failed!";
    // }
?>