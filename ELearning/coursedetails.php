<?php
include './dbConnection.php';
include './mainInclude/header.php';

if (!isset($_SESSION)) {
    session_start();
}

?>

<div class="container-fluid bg-dark">
  <!-- Course Page Banner -->
  <div class="row">
    <img src="./image/coursebanner.jpg" alt="courses" style="height:200px; width:100%; object-fit:cover; box-shadow:10px;" />
  </div>
</div>

<div class="container mt-5">
  <!-- Display Course Details -->
  <?php
  if (isset($_SESSION['is_login'])) {
    $stuEmail = $_SESSION['stuLogEmail'];
  } else {
    echo "<script> location.href='../index.php'; </script>";
  }
  
  $sql = "SELECT * FROM student WHERE stu_email='$stuEmail'";
  $result = $conn->query($sql);
  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $stuId = $row["stu_id"];
  }

  if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];
    $_SESSION['course_id'] = $course_id;
    $sql = "SELECT * FROM course WHERE course_id = '$course_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        // Display appropriate text based on course ID
        $courseTypeText = ($course_id == 8 || $course_id == 11 || $course_id == 13 || $course_id == 16) ? "<div class='text-center'><div style='font-size: 28px; font-weight: bold; color: #4CAF50; border: 2px solid #4CAF50; padding: 10px; display: inline-block; text-transform: uppercase;'>For Students</div></div>" : "<div class='text-center'><div style='font-size: 28px; font-weight: bold; color: #2196F3; border: 2px solid #2196F3; padding: 10px; display: inline-block; text-transform: uppercase;'>For Teachers</div></div>";
        echo $courseTypeText;
        
        echo '
          <div class="row">
            <div class="col-md-4">
              <img src="' . str_replace('..', '.', $row['course_img']) . '" class="card-img-top" alt="Course Image" />
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title text-center" style="font-size: 32px; color: #333;">' . $row['course_name'] . '</h5>
                <p class="card-text">Description: ' . $row['course_desc'] . '</p>
                <p class="card-text">Duration: ' . $row['course_duration'] . '</p>';
                
        // Check if student has already ordered this course
        $checkOrderSql = "SELECT * FROM courseorder WHERE stu_email='$stuEmail' AND course_id='$course_id'";
        $orderResult = $conn->query($checkOrderSql);
        if ($orderResult->num_rows > 0) {
          // Student has already ordered, show WhatsApp message
          echo '<p class="card-text text-success mt-3">To collect your Hard Copy Resource Book, contact with this WhatsApp number. Send your name and student ID to <a href="https://api.whatsapp.com/send?phone=+8801643211027">+8801643211027</a></p>';
          // Redirect to Moodle
          echo '<a href="http://localhost/moodle1" class="btn btn-primary text-white font-weight-bolder float-right">Watch Course</a>';
        } else {?>

            <form action="" method="post">
              <p class="card-text">Price: <small><del>&#2547 <?php echo $row['course_original_price']; ?> </del></small> <span class="font-weight-bolder">&#2547 <?php  echo $row['course_price'] ?></span></p>
              <input type="text" name="id" id="price" value='<?php  echo $row["course_price"] ?>'> 
              <input type="text"  id="course_id" value='<?php  echo $_GET["course_id"] ?>'> 
              <input type="text" name="studentEmail1" id="studentEmail" value='<?php  echo $_SESSION["stuLogEmail"] ?>'> 
              <button type="submit" class="btn btn-primary text-white font-weight-bolder float-right" 
                id="sslczPayBtn"
                        token="if you have any token validation"
                        postdata="your javascript arrays or objects which requires in backend"
                        order="If you already have the transaction generated for current order"
                        endpoint="ssl/checkout_ajax.php">Buy Now</button>
            </form>

            <?php
          // Show default message for those who haven't registered
          echo '<p class="card-text text-success mt-3">When you enroll in this course, you\'ll receive a complimentary hard copy of our Resource Book delivered to you via courier.</p>';
        }

        echo '</div>
            </div>
          </div>';
      }
    }
  }
  ?>
</div>

<div class="container mt-5">
  <!-- Display Lesson Videos -->
  <div class="row">
    <?php
    $sql = "SELECT * FROM lesson WHERE course_id = $course_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      echo '<div class="table-responsive">';
      echo '<table class="table table-bordered">';
      echo '<thead class="thead-light">';
      echo '<tr>';
      echo '<th scope="col">Lesson No.</th>';
      echo '<th scope="col">Lesson Name</th>';
      echo '<th scope="col">Action</th>';
      echo '</tr>';
      echo '</thead>';
      echo '<tbody>';
      $num = 0;
      while ($row = $result->fetch_assoc()) {
        $num++;
        echo '<tr>';
        echo '<td>' . $num . '</td>';
        echo '<td>' . $row["lesson_name"] . '</td>';
        echo '<td>';
        if (($course_id == 8 || $course_id == 9) && $num <= 3) {
          $video_links = ($course_id == 8) ? array(
            'https://www.youtube.com/embed/WM-yP8hWDgI?si=Rc96W3c8Pt28bLMo',
            'https://www.youtube.com/embed/6k3Az8k88yA?si=MjSyjAFQAmhrscl9',
            'https://www.youtube.com/embed/S2ls-KQDqsE?si=CHVG-eQTASjFL-_i'
          ) : array(
            'https://www.youtube.com/embed/82YKeI784YU',
            'https://www.youtube.com/embed/FVqSiFUVX78',
            'https://www.youtube.com/embed/kpRmyUNDmwc'
          );
          echo '
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#videoModal' . $num . '">
              Watch Video Free
            </button>
            <div class="modal fade" id="videoModal' . $num . '" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel' . $num . '" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-body">
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="' . $video_links[$num - 1] . '" allowfullscreen></iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div>';
        } else {
          echo '<button type="button" class="btn btn-primary" onclick="showAlert()"><span>&#x1F512;</span> Locked</button>';
        }
        echo '</td>';
        echo '</tr>';
      }
      echo '</tbody>';
      echo '</table>';
      echo '</div>';
    }
    ?>
  </div>
</div>

<style>
  .text-center {
    text-align: center;
  }
</style>

<script>
  function showAlert() {
    alert("You have to enroll in this course by making payment to navigate through the whole course.");
  }
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


<!-- If you want to use the popup integration, -->
<script>
    var obj = {};
    obj.cus_email = $('#studentEmail').val();
    obj.cus_addr1 = $('#course_id').val();
    obj.amount = $('#price').val();
    obj.course_id = $('#course_id').val();

    $('#sslczPayBtn').prop('postdata', obj);

    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // NOTE: USE THIS FOR SANDBOX
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>
<?php
include './mainInclude/footer.php';
?>
