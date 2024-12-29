<?php
if (!isset($_SESSION)) {
    session_start();
}
include('../dbConnection.php');

if (isset($_SESSION['is_login'])) {
    $stuEmail = $_SESSION['stuLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Watch Course</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/stustyle.css">
    <style>
        .lesson-text {
            margin-top: 20px;
            padding: 10px;
            background-color: whitesmoke;
            border-radius: 5px;
        }

        .lesson-text h4 {
            margin-bottom: 10px;
        }

        .join-moodle-btn {
            margin-top: 20px;
        }

        .resource-book {
            margin-top: 20px;
            padding: 10px;
            background-color: lightblue;
            border-radius: 5px;
        }

        .resource-book h4 {
            margin-bottom: 10px;
        }

        .whatsapp-link {
            font-weight: bold;
            color: blue;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="container-fluid bg-success p-2">
        <h3>Welcome to E-Learning</h3>
        <a class="btn btn-danger" href="./myCourse.php">My Courses</a>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 border-right">
                <h4 class="text-center">Lessons</h4>
                <ul id="playlist" class="nav flex-column">
                    <?php
                    if (isset($_GET['course_id'])) {
                        $course_id = $_GET['course_id'];
                        $sql = "SELECT * FROM lesson WHERE course_id = '$course_id'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<li class="nav-item border-bottom py-2" movieurl=' . $row['lesson_link'] . ' style="cursor: pointer;">' . $row['lesson_name'] . '</li>';
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="col-sm-8">
                <div class="lesson-text">
                    <h4>Join Moodle to complete your course</h4>
                    <p>This course is hosted on Moodle. Click below to join and complete your course.</p>
                    <a href="http://moodle.test/" class="btn btn-primary join-moodle-btn">Join Moodle</a>
                </div>

                <div class="resource-book">
                    <h4>To collect your Hard Copy Resource Book, contact with this WhatsApp number</h4>
                    <p>Send your name and student ID to <a href="https://wa.me/8801643211027" class="whatsapp-link" target="_blank">+8801643211027</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery and Boostrap JavaScript -->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <!-- Font Awesome JS -->
    <script type="text/javascript" src="../js/all.min.js"></script>
    <!-- Ajax Call JavaScript -->
    <!-- <script type="text/javascript" src="..js/ajaxrequest.js"></script> -->
    <!-- Custom JavaScript -->
    <script type="text/javascript" src="../js/custom.js"></script>
</body>

</html>
