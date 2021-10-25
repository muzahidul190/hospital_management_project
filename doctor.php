<?php

include 'db_con.php';
if(isset($_GET["doc_id"])){
    $id = $_GET["doc_id"];
}else{
    $id = 1;    //This line will be edited later
}
$sql = "SELECT * FROM doctors WHERE d_id = $id LIMIT 1";

$result = mysqli_query($conn,$sql);
$info = mysqli_fetch_assoc($result);

if($result){
    $count = mysqli_num_rows($result);
}else{
    $count = 0;
}
if($count > 0){
    $name = "Details for: ".$info["d_name"];
}else{
    $name = "Doctor Not Found";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Details | DBMS Hospital</title>
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
                <?php if($count>0){ ?>
                <table id="patient-details" border="2px">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <td><?php echo $info["d_name"]; ?></td>
                        </tr>
                        <tr>
                            <th>Phone No:</th>
                            <td><?php echo $info["d_contact"]; ?></td>
                        </tr>
                        <tr>
                            <th>Department</th>
                            <td><?php echo $info["d_department_id"]; ?></td>
                        </tr>
                        <tr>
                            <th>Availability</th>
                            <td><?php echo $info["d_name"]; ?></td>
                        </tr>
                        <tr>
                            <th>Education</th>
                            <td>
                                <ul style="list-style-type:numeric;">
                                    <li>ad as asd asd a</li>
                                    <li>ad as asd asd a</li>
                                    <li>ad as asd asd a</li>

                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php } ?>
            </div>
        </div>
    </main>

    <?php
        if($count>0){       //Edit condition after login page
    ?>
    <!-- Only View Able by Management -->
    <nav>
        
        <ul id="manage_patient">
            <li><a href="#delete">
                Delete This Doctor
            </a></li>
            <li><a href="#edit">
                Edit this Doctor
            </a></li>
        </ul>
    </nav>
    <?php
        }
        include 'footer.php';
    ?>