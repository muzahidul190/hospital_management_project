<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In or Sign Up | DBMS Hospital</title>
</head>
<body>
    <div class="conten_wrapper">
        <div class="wrapper">
            <header>
                <div class="logo">
                    <h2>DBMS Hospital</h2>
                    <h3>Your favourite place for treatment</h3>
                </div>
                <nav id="main_nav">
                    <ul class="nav_buttons">
                        <li><a href="#">Home
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
            </header>
        </div>
    </div>
    </div>
    <div class="wrapper">
        <button id="goback" class="hide-form-sign">Go Back</button>
            <div id="signinORsignup">
                <ul>
                    <li><button id="signinbtn" class="signin">Sign In</button></li>
                    <li>OR</li>
                    <li><button id="signupbtn" class="signup">Sign Up</button></li>
                </ul>
            </div>
    
            <div class="signInForm">
                <form method="POST" id="signin" 
                class="sign"> 
                <fieldset>
                    <legend>Login</legend>
                <label for="text"><h3>Username or Email:</h3></label>
                    <input type="text" name="email" id="email" placeholder="Mr.x/ mrx@xyz.com">
                    <label for="pass"><h3>Password</h3></label>
                    <input type="password" name="pass" id="pass" placeholder="Password">
                    <input type="checkbox" name="rememberme" checked="">
                    <span>Remember Me</span>
                    <input type="submit" value="Sign In" name="signin">
                </fieldset>    
                </form>

                    <label for="profession">
                        <h2>Choose account type:</h2>
                    </label>
                    <input type="radio" name="profession" id="profession" value='doctor'> Doctor
                    <input type="radio" name="profession" id="profession" value='patient' checked> Patient
            <form method="POST" id="signup-patient" class="sign"> 
                <fieldset>
                    <legend>Register Patient</legend>
                    <label for="email"><h3>Email:</h3></label>
                    <input type="email" name="p-email" id="p-email" placeholder="yourmail@xyz.com" required="">
    
    
                    <label for="name"><h3>Full Name:</h3></label>
                    <input type="text" name="p-name" id="p-name" placeholder="Mr. X" required="">
    
                    <label for="p-phpne"><h3>Phone No:</h3></label>
                    <input type="tel" name="p-phone" id="p-phone" pattern="{0-9}[11]">

                    <label for="name"><h3>Enter your address:</h3></label>
                    <input type="text" name="p-addrs" id="p-addrs" placeholder="I live in Outer World" required="">

                    <label for="p-pass"><h3>Password</h3></label>
                    <input type="password" name="p-pass" id="p-pass">
    
                    <label for="p-cpass"><h3>Confirm Password</h3></label>
                    <input type="password" name="p-cpass" id="p-cpass">
    
                    <input type="submit" name="signup" value="Register">
                </fieldset>
                </form>
                <form method="POST" id="signup-doc" class="sign"> 
                    <fieldset>
                        <legend>Register Doctor</legend>
                        <label for="email"><h3>Email:</h3></label>
                        <input type="email" name="p-email" id="p-email" placeholder="yourmail@xyz.com" required="">
        
        
                        <label for="name"><h3>Full Name:</h3></label>
                        <input type="text" name="p-name" id="p-name" placeholder="Mr. X" required="">
        
                        <label for="p-phpne"><h3>Phone No:</h3></label>
                        <input type="tel" name="p-phone" id="p-phone" pattern="{0-9}[11]">
                        
                        <label for="d-department">
                            <h3>Select your department:</h3>
                        </label>
                        <select name="department" id="department">
                            <option value="medicine">Medicine</option>
                            <option value="gyno">Gynocololy</option>
                            <option value="neural">Neural</option>
                            <option value="sergical">Sergical</option>
                            <option value="pathology">Pathology</option>
                        </select>
                        <label for="doc-edu">
                            <h3>Please enter your educational qualifications:</h3>
                        </label>
                        <div id="degrees">
                            <input type="text" name="deg1" id="degree"> <button id="add-another-degree">Add Another</button>
                        </div>
                        
                        <br>
                    <label for="select_available_days">
                        <h2>Select your available days:</h2>
                    </label>
                    <br>
                    <input type="checkbox" name="day_available[]" id="routine" value="0"> Saturday <br>
                    <input type="checkbox" name="day_available[]" id="routine" value="1"> Sunday <br>
                    <input type="checkbox" name="day_available[]" id="routine" value="2"> Monday <br>
                    <input type="checkbox" name="day_available[]" id="routine" value="3"> Tuesday <br>
                    <input type="checkbox" name="day_available[]" id="routine" value="4"> Wednessday <br>
                    <input type="checkbox" name="day_available[]" id="routine" value="5"> Thursday <br>
                    <input type="checkbox" name="day_available[]" id="routine" value="6"> Friday
                        

                        <label for="p-pass"><h3>Password</h3></label>
                        <input type="password" name="p-pass" id="p-pass">
        
                        <label for="p-cpass"><h3>Confirm Password</h3></label>
                        <input type="password" name="p-cpass" id="p-cpass">
        
                        <input type="submit" name="signup" value="Register">
                    </fieldset>
                    </form>
            </div>
        </div>
</body>
</html>