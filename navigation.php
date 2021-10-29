<?php

if(isset($_SESSION["type"])){
    if($_SESSION["type"] == "doctors"){
        ?>
        <div class="content_wrapper">
            <div class="wrapper">
                <div id="patient_view" class="doc_dashboard">
                    <nav class="secondary_nav">
                        <ul>
                            <li>
                                <a href="doctor.php">My Profile</a>
                            </li>
                            <li>
                                <a href="#patient_list">See your appointments</a>
                            </li>
                            <li><a href="#update_details">
                                Update your account details.
                            </a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <?php
        
    }else if($_SESSION["type"] == "patients"){
        ?>

<div class="content_wrapper">
        <div class="wrapper">
        <div id="patient_view">
            <nav class="secondary_nav">
                <ul>
                    <li>
                        <a href="patient.php">My Profile</a>
                    </li>
                    <li>
                        <a href="#appointment">Make an Appointment</a>
                    </li>
                    <li><a href="#book_seat">
                        Book a seat
                    </a></li>
                    <li><a href="#update_account">
                        Update your account details.
                    </a></li>
                </ul>
            </nav>
        </div>
    </div>
    </div>
        <?php
    }
}




?>