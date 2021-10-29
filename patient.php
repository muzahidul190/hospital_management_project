
<?php

include 'action.php';
$id = 0;
if(isset($_SESSION["type"])){
    if($_SESSION["type"] != "patients"){
        if( isset($_GET["p_id"])){
            $id = $_GET["p_id"];
        }
    }else{
        $id = $_SESSION["id"];
    }
}
$sql = "SELECT * FROM patients WHERE p_id = $id LIMIT 1";

$result = mysqli_query($conn,$sql);
$info = mysqli_fetch_assoc($result);

if($result){
    $count = mysqli_num_rows($result);
}else{
    $count = 0;
}
if($count > 0){
    $name = "Details for: ".$info["p_name"];
}else{
    $name = "Patient Not Found";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details | DBMS Hospital</title>
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
        <?php
            include 'navigation.php';
        ?>
        <div class="content_wrapper">
            <div class="wrapper">
            <div class="patient_details">
                <h2 style="text-align:center; padding:10px;display:block; font-size:2em;"><span class="patient"><?php echo $name;?></span>
                </h2>
                <?php if($count>0){ ?>
                <table id="patient-details" border="2px">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <td><?php echo $info["p_name"]; ?></td>
                        </tr>
                        <tr>
                            <th>Date of Birth</th>
                            <td><?php echo $info["p_dob"]; ?></td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td><?php 
                            if($info["p_gender"] == 'm')
                                echo "male";
                            else if($info["p_gender"] == 'f')
                                echo "female";
                            else if($info["p_gender"] == 'n')
                                echo "3rd Gender";
                            
                            ?></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><?php echo $info["p_address"]; ?></td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td><?php echo $info["p_phone"]; ?></td>
                        </tr>
                    </tbody>
                </table>
                <?php } 
                    if($count>0){       //edit condition after login page done
                ?>
                <nav>
                    <ul id="manage_patient">
                        <li><a href="#delete">
                            Delete This Patient
                        </a></li>
                        <li><a href="#edit">
                            Edit this patient
                        </a></li>
                    </ul>
                </nav>
                <?php } ?>
            </div>
            </div>
        </div>
    </main>

    <?php
        include 'footer.php';
    ?>