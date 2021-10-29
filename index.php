<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DBMS Hospital</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
    <script src="assets/js/jquery.min.js"></script>
    <script src="ajax.js"></script>
</head>
<body>

    <!-- <div class="conten_wrapper">
        <div class="wrapper">
            
        </div>
    </div> -->
    <?php
    include 'action.php';
    include 'nav.php';

?>
    <div class="content_wrapper">
        <div class="wrapper">
            <main>
                <div class="welcome_home">
                    <h2>Welcome to DBMS Hospital's official website.</h2>
                    <p>
                        This project pages has been designed by <strong style="color: #8078ff;"> SM.Tamim Mahmud, Prithvi Biswas, Muzahidul Isalm, Aduri Akter, Shuvro Deb Sarker and Minhazul Abedin</strong>. This site is a proto site for a hospital where doctors, patients and hospital management staffs can open their account and can conduct operations over their respective roles. Here patients can create appointments selecting a doctor under a specific department and can book a seat in hospital as well. The doctors can see their patients list and their profile. The management staffs can release patients from hospital seat, approve new doctors and can delete the application as well.
                    </p>
                </div>
            </main>
        </div>
    </div>
    <div class="content_wrapper">
        <div class="wrapper">
            <h3 id="browse_doc_dept">Browse our Departments and Doctors profiles.</h3>
            <section id="deptAndDoctors">
                <div id="doctors">
                    <span id="doctor_text">
                        See our qualified DOCTORs:
                    <div id="doc_list" style="display: none;">
                        <ul>
                            
                        <?php
                        
                        $doc_sql = $obj->return_sql_result("doctors","d_approved", 1);
                            while($row = mysqli_fetch_assoc($doc_sql)){
                                echo '<li><a href="doctor.php?doc_id=';
                                echo $row["d_id"];
                                echo '">'.$row["d_name"].'</a></li>';
                            }
                        ?>
                        </ul>
                    </div>
                    </span>
                </div>
                <div id="departments">
                <span id="department_text">
                        See our DEPARTMENTs:
                    <div id="dep_list" style="display: none;">
                        <ul>
                            <?php
                            $dep_sql = $obj->return_sql_result("departments", "", "", "dep_name", "ASC");
                            
                            while($row = mysqli_fetch_assoc($dep_sql)){
                                echo '<li><a href="department.php?dep_id=';
                                echo $row["dep_id"];
                                echo '">'.$row["dep_name"].'</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                    </span>
                </div>
            </section>
        </div>
    </div>
    <?php
        include 'footer.php';
    ?>
