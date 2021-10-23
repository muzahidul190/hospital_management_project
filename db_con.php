<?php


    $DB_HOST = "localhost";
    $DB_USER = "root";
    $DB_PASS = "";
    $DB_NAME = "dbms_hospital";

    $conn = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);

    if(!mysqli_connect_error($conn)){
        echo "Successfully connected!";
    }else{
        echo "Failed!";
    }


    $sql = "SELECT * FROM patients WHERE p_email = 'abul'";

    $result = mysqli_query($conn,$sql);
?>
    <table style="border: 2px solid teal;">


    <?php
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$row["p_id"]."</td><td>".$row["p_name"]."</td><td>".$row["p_email"]."</td><td>".$row["p_phone"]."</td>";
            echo "</tr>";
        }
    }else{
        echo '<tr><td style="text-align:center;" colspan="4">0 results</td></tr>';
    }
    ?>

    </table>