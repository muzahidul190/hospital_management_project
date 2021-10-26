<?php
    include 'action.php';
    $d_id = 3;
    
    $patient_list = $obj->return_sql_result("appointments", 'd_id_app', $d_id, "app_id", "DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard| DBMS Hospital</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
    <script src="assets/js/jquery.min.js"></script>
    <script src="ajax.js"></script>
</head>
<body>
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
                        <li><a href="doctor_dashboard.php" class="active-main-nav">
                            <!-- View it only for patient -->
                            My Dashboard
                        </a></li>
                    </ul>
                </nav>
        </div>
    </div>

    <main>
        <div class="content_wrapper">
            <div class="wrapper">
                <div id="patient_view" class="doc_dashboard">
                    <nav class="secondary_nav">
                        <ul>
                            <li>
                                <a href="doctor.php">My Profile</a>
                            </li>
                            <li>
                                <a href="#patient_list">See your patient list</a>
                            </li>
                            <li><a href="#update_details">
                                Update your account details.
                            </a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <div class="conten_wrapper">
            <div class="wrapper">

                <div id="patient_list" class="patient_list_view form-item item_according_to_link">
                    <div id="doctor_approval">
                    <h2>Your patients</h2>

                    <table width="100%" style="transition:none;" id="patient_list_doc">
                        <tbody>
                            <tr>
                                <th>
                                    Names
                                </th>
                                <th>
                                    Appointment Date
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                            <?php
                                
                                while($row=mysqli_fetch_assoc($patient_list)){
                                    echo '<tr><td class="color_black">';

                                    $patient_name = $obj->return_sql_result("patients", 'p_id', $row['p_id_app']);
                                    ?>
                                    <a class="patient_name" href="patient.php?p_id=<?php echo $row['p_id_app']?>">   
                                        <?php
                                            $patient_name = mysqli_fetch_assoc($patient_name)['p_name'];
                                            echo $patient_name;
                                        ?>
                                    </a>

                                    <?php

                                    echo '</td><td class="color_black">';
                                    echo $obj->get_day($row['app_routine']);
                                    echo '</td><td class="color_black">';
                                ?>
                                    <a id="mark_done" href="#m" class="btn btn-success">
                                        Mark Done
                                    </a>
                                <?php  
                                    echo '</td></tr>';
                                
                                }
                            ?>
                        </tbody>
                    </table>
                    </div>
                    
                </div>

                <form action="" id="update_details" class="hide-single-item form-item doc-update-profile">
                    <legend><h2>Update your details</h2></legend>
                    <label for="d-address">
                        <h2>Your Address</h2>
                    </label>
                    <input type="text" name="d-address" id="d-address">
        
                    <label for="d-phpne"><h3>Phone No:</h3></label>
                    <input type="tel" name="d-phone" id="d-phone" pattern="{0-9}[11]">
                    
                    <label for="doc-edu">
                        <h3>Please enter your educational qualifications:</h3>
                    </label>
                    <div id="degrees">
                        <input type="text" name="deg1" id="degree"> <button id="add-another-degree">Add Another</button>
                    </div>



                    <label for="d-department">
                        <h3>Update your department:</h3>
                    </label>
                    <select name="department" id="department">
                        <option value="medicine">Medicine</option>
                        <option value="gyno">Gynocololy</option>
                        <option value="neural">Neural</option>
                        <option value="sergical">Sergical</option>
                        <option value="pathology">Pathology</option>
                    </select>


                    <label for="select_available_days">
                        <h2>Change your available days:</h2>
                    </label>
                    <br>
                    <input type="checkbox" id="sat" name="day_available[]" value="0"> <label for="sat">Saturday</label> <br>
                    <input type="checkbox" id="sun" name="day_available[]" value="1"> <label for="sun">Sunday</label> <br>
                    <input type="checkbox" id="mon" name="day_available[]" value="2"> <label for="mon">Monday</label> <br>
                    <input type="checkbox" id="tue" name="day_available[]" value="3"> <label for="tue">Tuesday</label> <br>
                    <input type="checkbox" id="wed" name="day_available[]" value="4"> <label for="wed">Wednesday</label> <br>
                    <input type="checkbox" id="thu" name="day_available[]" value="5"> <label for="thu">Thursday</label> <br>
                    <input type="checkbox" id="fri" name="day_available[]" value="6"> <label for="fri">Friday</label>


                    <label for="d-pass"><h3>Password</h3></label>
                    <input type="password" name="d-pass" id="d-pass">
            
                    <label for="d-cpass"><h3>Confirm Password</h3></label>
                    <input type="password" name="d-cpass" id="d-cpass">
                    <input type="submit" class="btn btn-submit">
                </form>
            </div>
        </div>
    </main>
    <?php
        include 'footer.php';
    ?>