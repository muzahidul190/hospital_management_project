
    <div class="content_wrapper">
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
                        <?php
                            if(isset($_SESSION["type"])){
                        ?>
                        <li><a href="<?php 
                            if(isset($_SESSION["type"])){
                                if($_SESSION["type"] == "doctors"){
                                    echo "doctor_dashboard.php";
                                }else if($_SESSION["type"] == "patients"){
                                    echo "patient_dashbord.php";
                                }else if($_SESSION["type"] == "admin"){
                                    echo "management_dashboard.php";
                                }
                            }
                        ?>">
                            <!-- View it only for patient -->
                            My Dashboard
                        </a></li>
                        <?php
                            }
                        ?>
                        <?php
                            if(isset($_SESSION["id"])){
                        ?>
                        <li><a href="#" id="logout">
                            <!-- View it only for non logged users -->
                            Log Out
                        </a></li>
                        <?php
                            }else{
                        ?>
                        <li><a href="sign-in-or-sign-up.php">
                            <!-- View it only for non logged out users -->
                            Login / Sign Up 
                        </a></li>
                        <?php
                            }
                        ?>
                        li
                    </ul>
                </nav>
            </header>
        </div>
    </div>