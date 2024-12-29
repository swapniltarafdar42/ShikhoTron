<?php
include './dbConnection.php';

$transaction_id = $_POST['transactionId'];
$course_id = $_POST['course_id'];
$stu_id = $_POST['stu_id'];

echo "<div style='font-family: Arial, sans-serif; padding: 20px;'>";
echo "<div style='text-align: center;'>Thanks for inserting your Transaction ID.</div><br>";

// Database operations
$sql = "SELECT * FROM user_transaction WHERE stu_id='$stu_id' AND transaction_id='$transaction_id'";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    $sql = "INSERT INTO user_transaction(stu_id, course_id, transaction_id) VALUES ('$stu_id','$course_id','$transaction_id')";
    if ($conn->query($sql) == TRUE) {
        echo "<div style='text-align: center;'>An Email will be sent to you for confirmation.</div><br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql2 = "SELECT * FROM stu_transation_view WHERE stu_id='$stu_id'";
    $result = $conn->query($sql2);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $course_name = $row["course_name"];
        echo $course_name;
    }
} else {
    echo "Duplicate entry";
}

echo "</div>";
?>

<!-- Stylish Navigation Links -->
<style>
    .custom-nav-item {
        margin: 0 10px;
    }

    .custom-nav-item a {
        text-decoration: none;
        color: #ffffff;
        background-color: #007bff;
        padding: 10px 20px;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .custom-nav-item a:hover {
        background-color: #0056b3;
    }
</style>

<div style="margin-top: 20px;">
    <ul style="list-style: none; padding: 0; text-align: center;">
        <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link"> Go Back to Home</a></li>
        
    </ul>
</div>