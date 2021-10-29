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
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, sed aperiam magnam dignissimos vitae quod optio officiis vero. Atque eveniet amet nobis minima blanditiis, aspernatur ipsa velit, nemo asperiores, est quidem ullam necessitatibus. Vero voluptatem quis necessitatibus dicta voluptatibus ducimus. Nam possimus perspiciatis facere illo, veniam voluptas vitae architecto reiciendis.
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
                    </span>
                </div>
                <div id="departments">
                <span id="department_text">
                        See our DEPARTMENTs:
                    </span>
                </div>
            </section>
        </div>
    </div>
    <?php
        include 'footer.php';
    ?>
