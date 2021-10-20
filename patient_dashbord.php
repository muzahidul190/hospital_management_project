<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard|DBMS Hospital</title>
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
                        <li><a href="#">
                            <!-- View it only for management -->
                            Management
                        </a></li>
                        <li><a href="#">
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
                <nav>
                    <ul>
                        <li>
                            <a href="#">Make an Appointment</a>
                        </li>
                        <li><a href="%#">
                            Book a seat
                        </a></li>
                        <li><a href="#">
                            Update your account details.
                        </a></li>
                    </ul>
                </nav>
            </header>
        </div>
    </div>
    <main>
        <div class="appointment">
            <form action="">
                <legend><h2>Make an Appointment</h2></legend>
                <label for="department">
                    <h3>Please select your department:</h3>
                </label>
                <select name="department" id="department">
                    <option value="medicine">Medicine</option>
                    <option value="gyno">Gynocololy</option>
                    <option value="neural">Neural</option>
                    <option value="sergical">Sergical</option>
                    <option value="pathology">Pathology</option>
                </select>
                <br>

                <select name="select_doc" id="select_doc">
                    <option value="doc-1">
                        Dr. Mutasim
                    </option>
                    <option value="doc-2">
                        Dr. Zulkar Nayeem
                    </option>
                </select>

                <div class="seleced_doc_availability">
                    <h2>Dr. X is available for the followind days:</h2>
                    <ul>
                        <li><span>Sunday</span></li>
                        <li><span>Monday</span></li>
                        <li><span>Thursday</span></li>
                    </ul>
                </div>

                <input type="submit" value="Appointment this doctor" class="btn btn-submit">

            </form>
            

        </div>
        <div class="seat_booking">
            <form action="">
                <legend><h2>Book a seat</h2></legend>
                <label for="department">
                    <h3>Please select your department:</h3>
                </label>
               <h2>Seat is available</h2>
               <h2>This seat will cost you: 1000tk</h2>
                <input type="submit" value="Book seat" class="btn btn-submit">

            </form>
            

        </div>
        <form action="">
            <legend><h2>Update your details</h2></legend>
            <label for="p-address">
                <h2>Your Address</h2>
            </label>
            <input type="text" name="p-address" id="p-address">

            <label for="p-phpne"><h3>Phone No:</h3></label>
            <input type="tel" name="p-phone" id="p-phone" pattern="{0-9}[11]">

            

            <label for="p-pass"><h3>Password</h3></label>
            <input type="password" name="p-pass" id="p-pass">
    
            <label for="p-cpass"><h3>Confirm Password</h3></label>
            <input type="password" name="p-cpass" id="p-cpass">
        </form>
    </main>
</body>
</html>