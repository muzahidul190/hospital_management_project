
<?php
    
include 'action.php';
$p_id = "";
if(isset($_SESSION["type"])){
    $p_id = $_SESSION["id"];
    if($_SESSION["type"] != "patients"){
        header("location:index.php");
    }
}else{
    header("location:index.php");
}

$sql = "SELECT * FROM departments ORDER BY dep_name ASC";

$dep_list = mysqli_query($conn,$sql);
$dep_list2 = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard|DBMS Hospital</title>
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
    <div class="content_wrapper">
        <div class="wrapper">
            <section class="patient_view">
            <div class="item-according-to-link">
            <div id="appointment" class="single-item-design form-item" >
                <form onsubmit="return false" id="make_appointment">
                    <legend><h2>Make an Appointment</h2></legend>
                    <label for="p_department_app">
                        <h3>Please select your department:</h3>
                    </label>
                    <select name="p_department_appointment" id="p_department_app">
                        <option value="0">Select a department</option>
                        <?php
                            while($row = mysqli_fetch_assoc($dep_list2)){
                                echo '<option value="'.$row["dep_id"].'">'.$row["dep_name"].'</option>';
                            }
                        ?>
                    </select>
                    <br>

                    <select name="select_doc" id="select_doc" style="display: none;">
                        
                    </select>

                    <div id="selected_doc_availability"style="display:none;">
                        <h2>Dr. X is available for the following days:</h2>
                        <select id="doc-available-day" name="doc-available-day">
                        </select>
                    </div>

                    <button id="btn-appointment" type="submit" class="btn btn-submit" disabled>
                        Appoint this doctor    
                    </button>

                </form>
                

            </div>
            <div id="book_seat" class="single-item-design hide-single-item form-item" style="padding: 0 50px;">
                <form onsubmit="return false" id="seat_booking_form">
                    <legend><h2>Book a seat</h2></legend>
                    <label for="p_department_seat">
                        <h3>Please select your department:</h3>
                    </label>
                    <select name="department" id="p_department_seat">
                        <?php
                            while($row = mysqli_fetch_assoc($dep_list)){
                                echo '<option value="'.$row["dep_id"].'">'.$row["dep_name"].'</option>';
                            }
                        ?>
                    </select>
                    <!-- Update patient id after login -->
                    <input type="hidden" name="patient_id_appoint_seat" value="2">

                    <h2 id="seat_availability">Select a department</h2>
                    <h2 id="seat_cost"></h2>

                    
                    <button type="submit" id="seat_book_button" class="btn btn-submit" disabled>Book seat</button>

                </form>
                

            </div>
            <div id="update_account" class="single-item-design hide-single-item form-item">
                <form action="">
                    <legend><h2>Update your details</h2></legend>
                    <label for="p-address">
                        <h3>Your Address</h3>
                    </label>
                    <input type="text" name="p-address" id="p-address">

                    <label for="p-phpne"><h3>Phone No:</h3></label>
                    <input type="tel" name="p-phone" id="p-phone" pattern="[0-9]{11}">

                    <label for="p-pass"><h3>Password</h3></label>
                    <input type="password" name="p-pass" id="p-pass">
            
                    <label for="p-cpass"><h3>Confirm Password</h3></label>
                    <input type="password" name="p-cpass" id="p-cpass">
                    <input type="submit" class="btn btn-submit">
                </form>
            </div>
            </div>
        </section>
        </div>
    </div>
    </main>
    <?php
        include 'footer.php';
    ?>