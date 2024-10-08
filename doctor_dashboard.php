<?php
    include 'action.php';
    $d_id = "";
    if(isset($_SESSION["type"])){
        $d_id = $_SESSION["id"];
        if($_SESSION["type"] != "doctors"){
            header("location:index.php");
        }
    }else{
        header("location:index.php");
    }
    
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
    <?php
    
        include 'nav.php';
    
    ?>

    <main>
        <?php
            include 'navigation.php';
        ?>

        <div class="content_wrapper">
            <div class="wrapper">

                <div id="patient_list" class="patient_list_view form-item item_according_to_link">
                    <div id="doctor_approval">
                    <h2 style="font-size:2em;">Your Appointments</h2>

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
            $count = 0;            
            while($row=mysqli_fetch_assoc($patient_list)){
                if(!$row['app_status']){
                    $count++;
                    echo '<tr><td class="color_black">';
                    $patient_name = $obj->return_sql_result("patients", 'p_id', $row['p_id_app']);
                    ?>
                        <a class="patient_name" href="patient.php?p_id=<?php echo $row['p_id_app']?>" data-appid="<?php echo $row['app_id']?>">   
                            <?php
                                $patient_name = mysqli_fetch_assoc($patient_name)['p_name'];
                                echo $patient_name;
                            ?>
                        </a>
                    </td>

                    <td class="color_black">
                        <?php echo $obj->get_day($row['app_routine']);?>
                    </td>

                    <td class="color_black">
                    <a href="#m" class="btn btn-success mark_done">
                        Mark Done
                    </a>
                </td>
            </tr>
                
                <?php
                    }
                }
                if($count == 0) {
                    echo "<tr> <td  colspan='3'>No upcoming appointments for you. </td></tr>";
                }

                ?>
                        </tbody>
                    </table>
                    </div>
                    
                </div>

                <form onsubmit="return false" id="update_details" class="hide-single-item form-item doc-update-profile">
                    <legend><h2>Update your details</h2>
                    <span class="text-warning">(Leave fields blank if you don't wanna update them)</span>
                </legend>
                    <label for="doc-name"><h3 style="margin-top: 30px;">Update Full Name:</h3></label>
                    <input type="text" name="doc-name" id="doc-name">

                    <label for="d-address">
                        <h3>New Address</h3>
                    </label>
                    <input type="text" name="d-address" id="d-address">
        
                    <label for="d-phone"><h3>New Phone No:</h3></label>
                    <input type="tel" name="d-phone" id="d-phone" pattern="{0-9}[11]">
                    
                    <label for="doc-edu">
                        <h3>Please enter your new educational qualifications:</h3>
                    </label>
                    <div id="d-degrees">
                        <input type="text" name="deg[]" class="doc-degree">
                    </div>
                    <a id="add-another-degree" class="btn btn-add-another-field">
                        Add Another
                    </a>



                    <label for="d-department">
                        <h3>Update your department:</h3>
                    </label>
                    <select name="department" id="department">
                        <option value="medicine">Medicine</option>
                        <option value="gyno">Gynecology</option>
                        <option value="neural">Neural</option>
                        <option value="sergical">Surgical</option>
                        <option value="pathology">Pathology</option>
                    </select>


                    <label id="change_available_days_text">
                        <h3>Change your available days:</h3>
                    </label>
                    <br>
                    <div id="change_available_days" >
                        <input type="checkbox" id="sat" name="day_available[]" value="0"> <label for="sat">Saturday</label> <br>
                        <input type="checkbox" id="sun" name="day_available[]" value="1"> <label for="sun">Sunday</label> <br>
                        <input type="checkbox" id="mon" name="day_available[]" value="2"> <label for="mon">Monday</label> <br>
                        <input type="checkbox" id="tue" name="day_available[]" value="3"> <label for="tue">Tuesday</label> <br>
                        <input type="checkbox" id="wed" name="day_available[]" value="4"> <label for="wed">Wednesday</label> <br>
                        <input type="checkbox" id="thu" name="day_available[]" value="5"> <label for="thu">Thursday</label> <br>
                        <input type="checkbox" id="fri" name="day_available[]" value="6"> <label for="fri">Friday</label>
                    </div>


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