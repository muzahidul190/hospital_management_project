<?php

include 'action.php';
$id = 0;
if(isset($_GET["doc_id"])){
    $id = $_GET["doc_id"];
}else{
    if(isset($_SESSION["type"])){
        if($_SESSION["type"] == "doctors"){
            $id = $_SESSION["id"];
        }
    }
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
    <meta property="og:title" content="About Group 4">
    <meta property="og:type" content="website">
    <meta property="og:url" content="about.php">
    <meta property="og:description" content="This page is about the group members and the DBMS hospital project.">
    <meta property="og:site_name" content="DBMSHospital">
    <meta property="og:image" content="assets/images/screenshot.png">
    
    <title>About Us | DBMS Hospital</title>
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
        <div class="wrapper">
        <div class="about">
            <h2 style="text-align: center;">&nbsp;&nbsp;Purpose:&nbsp;&nbsp;</h2>
            <p>This small project on hospital management system has been developed to meet the DBMS Lab project by <a target="" about="_blank">Pritam Khan</a> Sir. We learned lot of new things and gathers huge experiences while working with this project.</p>
            <h2>&nbsp;&nbsp;Pages:&nbsp;&nbsp;</h2>
            <p>Here is the hierarchy diagram of the <a href="pages.txt" target="_blank">pages</a> included in this web-based project.</p><br>
            <ol type="1">
                <li>Home Page</li>
                    <span>__Accessible for ALL.</span>
                <li>Sign Up/Registration</li>
                    <span>__Accessible for ALL while LOGGED OUT.</span>
                <li>Login</li>
                    <span>__Accessible for ALL while LOGGED OUT.</span>
                <li>Patient Dashboard</li>
                    <span>__Accessible for LOGGED IN PATIENT ONLY.</span>
                <li>Doctor Dashboard</li>
                    <span>__Accessible for LOGGED IN DOCTOR ONLY.</span>
                <li>Management/Administrator Dashboard</li>
                    <span>__Accessible for ADMIN ONLY.</span>
                <li>Department</li>
                    <span>__Accessible for ALL.</span>
                <li>Doctor</li>
                    <span>__Accessible for ALL.</span>
                <li>Patient</li>
                    <span>__Accessible for ADMINS and DOCTORS ONLY</span>
                <li>About</li>
                    <span>__Accessible for ALL.</span>
            </ol>
            <p>We are very sorry that we couldn't make it cross device responsive due to shortage of time.And couldn't add more fascinating features as well.</p>
            <h2>&nbsp;&nbsp;Team Members:&nbsp;&nbsp;&nbsp;&nbsp;</h2>
            <p>We were in <strong>Group 4</strong>. The team members contributed in different fields as we worked as a team and worked on different parts by each individual. We used github to gather all parts in together. The team members are as follows:</p>
            <br>
            <ol>
                <li>SM. Tamim Mahmud - 336</li>
                    <span>__Frot End, UI, Connection.</span>
                <li>Prithvi Biswas - 320</li>
                    <span>__Front End, UI.</span>
                <li>Muzahidul Isalm - 329</li>
                    <span>__Back End, Connection, Project Plan</span>
                <li>Aduri Akter - 266</li>
                    <span>__Contributor</span>
                <li>Shuvro Deb Sarker - 303</li>
                    <span>__Contributor</span>
                <li>Minhazul Abedin - 317</li>
                    <span>__Contributor</span>
            </ol>
            <h2>&nbsp;&nbsp;Conclusion:&nbsp;&nbsp;&nbsp;&nbsp;</h2>
            <p>As this was the very first project for us, we tried our best to make the project full, but some functionalities which we though about couldn't be added. But we've learned lot of new things and have gathered new experiences like <strong>TeamWork, Patience, Planning</strong> etc. which we hope will help us in real life projects later on. We are very thankful to our dear sir for arranging such a project for us.</p>
        </div>
        </div>
    </main>

    <?php
        include 'footer.php';
    ?>