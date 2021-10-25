
<?php

    include 'db_con.php';
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
</head>
<body>
<div class="content_wrapper"></div>
        <div class="wrapper">
            <header>
                <div class="logo">
                    <h2>DBMS Hospital</h2>
                    <h3>Your favourite place for treatment</h3>
                </div>
                <nav id="main_nav">
                    <ul class="nav_buttons">
                        <li><a href="index.php">Home
                        </a></li>
                        <li><a href="management_dashboard.php">
                            <!-- View it only for management -->
                            Management
                        </a></li>
                        <li><a href="sign-in-or-sign-up.php">
                            <!-- View it only for non logged users -->
                            Login / Sign Up 
                        </a></li>
                        <li><a href="patient_dashbord.php">
                            <!-- View it only for patient -->
                            My Dashboard
                        </a></li>
                        <li><a href="doctor_dashboard.php">
                            <!-- View it only for patient -->
                            My Dashboard
                        </a></li>
                    </ul>
                </nav>
            </header>
        </div>
    </div>
    <main>
        <div class="conten_wrapper">
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

    <?php if($count>0){ ?>

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
        include 'footer.php';
    ?>