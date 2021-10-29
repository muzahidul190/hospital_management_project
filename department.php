
<?php

    include 'action.php';
    if(isset($_GET["dep_id"])){
        $id = $_GET["dep_id"];
    }else{
        $id = 1;
    }
    $sql = "SELECT * FROM departments WHERE dep_id = $id LIMIT 1";

    $result = mysqli_query($conn,$sql);
    $info = mysqli_fetch_assoc($result);

    if($result){
        $count = mysqli_num_rows($result);
    }else{
        $count = 0;
    }
    if($count > 0){
        $name = "Details for: ".$info["dep_name"];
    }else{
        $name = "Department Not Found";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Details | DBMS Hospital</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
    <script src="assets/js/jquery.min.js"></script>
    <script src="ajax.js"></script>
</head>
<body>
    <?php
    
        include 'nav.php';
    
    ?>
    <main>
        <div class="content_wrapper">
            <div class="wrapper">
            <div class="patient_details">
                <h2 style="text-align:center; padding:10px;display:block; font-size:2em;"><span class="patient">
                    <?php echo $name;?>
                </span></h2>
                <?php  if($count>0){ ?>
                <table id="patient-details" border="2px">
                    <tbody>
                        <tr>
                            <th>Department</th>
                            <td><?php echo $info["dep_name"]; ?></td>
                        </tr>
                        <tr>
                            <th>Details</th>
                            <td><?php echo $info["dep_details"]; ?></td>
                        </tr>
                        <tr>
                            <th>Seat</th>
                            <td><?php echo $info["dep_seat"]; ?></td>
                        </tr>
                        <tr>
                            <th>Seat Cost</th>
                            <td><?php echo $info["seat_cost"]; ?></td>
                        </tr>
                    </tbody>
                </table>
                <?php } ?>
            </div>
        </div>
    </main>

    <?php if($count>0 && isset($_SESSION["type"])){
        if($_SESSION["type"] == "admin"){
        ?>

    <!-- Only View Able by Management -->
    <nav>
        
        <ul id="manage_patient">
            <li><a href="#delete">
                Delete This Dept.
            </a></li>
            <li><a href="#edit">
                Edit this Dept.
            </a></li>
        </ul>
    </nav>
    <?php
    }
    }
        include 'footer.php';
    ?>