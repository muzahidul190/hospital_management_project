<?php

    include 'action.php';
    $ad_id = "";
    if(isset($_SESSION["type"])){
        $ad_id = $_SESSION["id"];
        if($_SESSION["type"] != "admin"){
            header("location:index.php");
        }
    }else{
        header("location:index.php");
    }

    $unap_doc_sql = $obj->return_sql_result("doctors", "d_approved", "0");
    $unapproved_doc_count = mysqli_num_rows($unap_doc_sql);

    $dep_sql = $obj->return_sql_result("departments", "", "", "dep_name", "ASC");
    $total_dept = mysqli_num_rows($dep_sql);

    $pat_sql = $obj->return_sql_result("patients");
    $total_patients = mysqli_num_rows($pat_sql);

    $doc_sql = $obj->return_sql_result("doctors","d_approved", 1);
    $doc_count = mysqli_num_rows($doc_sql);

    $booked_seat = $obj->return_sql_result("seat_booking", 'seat_status', 0);
    $booked_seat_count = mysqli_num_rows($booked_seat);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Dashboard | DBMS Hospital</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
    <script src="assets/js/jquery.min.js"></script>
    <script src="ajax.js"></script>
</head>

<body>
    <?php
    
        include 'nav.php';
    
    ?>
    <div class="content_wrapper">
        <div class="wrapper">
            <hr>
            <section class="management_view">
                <nav class="secondary_nav">
                <ul>
                    <li><a href="#doctor_approval">
                        Approve New Doctors(<span id="unapproved_doctor_count"><?php echo $unapproved_doc_count; ?></span>)</a>
                    </li>
                    <li>
                        <a href="#departments">
                            Total Department(<?php echo $total_dept; ?>)
                        </a>
                    </li>
                    <li>
                        <a href="#all_patitents">
                            Total Patients(<?php echo $total_patients; ?>)
                        </a>
                    </li>
                    <li>
                        <a href="#approved_doctors">
                            Total Approved Doctors(<span id="approved_doctor_count"><?php echo $doc_count; ?></span>)
                        </a>
                    </li>
                    <li>
                        <a id="seat_management_tab" href="#seat_list_management">
                            Manage Seats (<span id="booked_seat_count"><?php echo $booked_seat_count; ?></span>)
                        </a>
                    </li>
                    <li>
                        <a href="#add_another_dept">
                            Add another department
                        </a>
                    </li>
                </ul>
                </nav>


            <div class="item_according_to_link">
                <div id="doctor_approval" class="single-item-design">
                    <?php
                        if($unapproved_doc_count != 0){
                    ?>
                    <h2>Doctor Needs Approval</h2>
                    <span class="text-warning" style="color:black">To see doctor details click on doctors name.</span>
                    <table id="doctor_approval_list">
                        <tbody>
                            <tr>
                                <th>
                                    Doctor Name
                                </th>
                                <th colspan="2">
                                    Action
                                </th>
                            </tr>
                                
                            <?php
                                while($row = mysqli_fetch_assoc($unap_doc_sql)){
                                    
                                echo "<tr id='doc_id_".$row["d_id"]."';>";
                                    echo '<td><a href="doctor.php?doc_id=';
                                    echo $row["d_id"];
                                    echo '">'.$row["d_name"].'</a></td>';

                                    echo "<td><a href='#approve' class='btn btn-success approve' data-doc-id=".$row["d_id"].">Approve</a></td>";

                                    echo "<td><a href='#delete' class='btn btn-danger delete_doc' data-doc-id=".$row["d_id"].">Delete</a></td>";
                                }
                                echo "</tr>";
                            ?>
                            
                        </tbody>
                    </table>
                    <?php 
                    }else{
                        echo "<h1 style='padding:150px 0', width='100%'>No new doctor requests.</h1>";
                    }
                    
                    ?>
                </div>

                <div id="departments" class="single-item-design hide-single-item">
                    <h2>All Departments</h2>
                    <ul class="all_departments">
                        <?php
                            while($row = mysqli_fetch_assoc($dep_sql)){
                                echo '<li><a href="department.php?dep_id=';
                                echo $row["dep_id"];
                                echo '">'.$row["dep_name"].'</a></li>';
                            }
                        ?>
                    </ul>
                </div>

                <div id="all_patitents" class="single-item-design hide-single-item">
                    <h2>All patients</h2>
                    <ul class="all_patitents_list">
                        <?php
                            while($row = mysqli_fetch_assoc($pat_sql)){
                                echo '<li><a href="patient.php?p_id=';
                                echo $row["p_id"];
                                echo '">'.$row["p_name"].'</a></li>';
                            }
                        ?>
                    </ul>
                </div>

                <div id="approved_doctors" class="single-item-design hide-single-item">
                    <h2>Approved Doctors</h2>
                    <ul id="approved_doctors_list">
                        <?php
                            while($row = mysqli_fetch_assoc($doc_sql)){
                                echo '<li><a href="doctor.php?doc_id=';
                                echo $row["d_id"];
                                echo '">'.$row["d_name"].'</a></li>';
                            }
                        ?>
                    </ul>
                </div>
                
                <div id="seat_list_management" class="single-item-design hide-single-item">
                    <div id="doctor_approval">
                    <h2>Your patients</h2>

        <table width="100%" style="transition:none;">
            <tbody id="booked_seat_list_table">
                <tr>
                    <th>
                        Patient Names
                    </th>
                    <th>
                        Department
                    </th>
                    <th>
                        Booking Date
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
        <?php
            $count = $booked_seat_count;            
            while($row=mysqli_fetch_assoc($booked_seat)){

                if(!empty($row['p_id'])){
                    echo '<tr><td class="color_black">';
                    $patient_name = $obj->return_sql_result("patients", 'p_id', $row['p_id']);

                    ?>
                        <a class="patient_name" href="patient.php?p_id=<?php echo $row['p_id']?>">   
                            <?php
                                $patient_name = mysqli_fetch_assoc($patient_name)['p_name'];
                                echo $patient_name;
                            ?>
                        </a>
                    </td>
                    <td>
                    <?php
                        $department_name = $obj->return_sql_result("departments", 'dep_id', $row['dep_id']);
                    ?>
                    <a class="patient_name" href="department.php?dep_id=<?php echo $row['dep_id']?>"> 
                    <?php  
                        $department_name = mysqli_fetch_assoc($department_name)['dep_name'];
                                echo $department_name;
                    ?>
                    </a>
                    
                    </td>
                    <td class="color_black">
                        <?php echo $row['booking_time'];?>
                    </td>

                    <td class="color_black">

                    <a href="#m" class="btn btn-success mark_done" data-book-and-dep-id="<?php echo $row['booking_id'].','.$row['dep_id']?>">
                        Release Patient
                    </a>
                </td>
            </tr>
                
                <?php
                    }
                }
                if($count == 0) {
                    echo "<tr> <td  colspan='4'>No Booked Seat. </td></tr>";
                }

                ?>
                </tbody>
            </table>
            </div>
            
        </div>
                
                <div id="add_another_dept" class="single-item-design hide-single-item">
                    <h2>Add Another Department</h2>
                    <form onsubmit="return false" method="POST" id="add_new_dep">
                        <label for="dep-name">Enter new department name:</label> <br>
                        <input type="text" name="dep-name" id="dep-name">
                        
                        <label for="dep-seats">Total Seat in this department:</label><br>
                        <input type="number" name="dep-seats" id="dep-seats">

                        <label for="dep-per-sit-cost">
                            Cost of per sit in this department:
                        </label><br>
                        <input type="number" name="dep-per-sit-cost" id="dep-per-sit-cost">

                        <label for="dep-details">Enter brief details of the department:</label><br>
                        <textarea name="dep-details" id="dep-details" cols="50" rows="6"></textarea>
                        <br>
                        <input type="submit" value="Add Department" class="btn btn-submit">
                    </form>
                </div>
            </div>
            </section>
            <hr>
        </div>
        </div>
    </div>
    <?php
        include 'footer.php';
    ?>