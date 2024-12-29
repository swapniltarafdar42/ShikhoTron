<?php
include('./dbConnection.php');
// Header Include from mainInclude 
include('./mainInclude/header.php'); 
?>  

<!-- Start Video Background-->
<div class="container-fluid remove-vid-marg position-relative">
  <div class="vid-parent">
    <video playsinline autoplay muted loop>
      <source src="video/banvid.mp4" />
    </video>
    <div class="vid-overlay"></div>
  </div>
  <div class="vid-content">
    <h1 class="my-content">Welcome to ShikhoTron</h1>
    <small class="my-content">Knowledge into Action</small><br />
    <?php    
      if(!isset($_SESSION['is_login'])){
        echo '<a class="btn btn-danger mt-3" href="loginorsignup.php" style="background-color: purple; color: #fff;">Get Started</a>';
      } else {
        echo '<a class="btn btn-primary mt-3" href="student/studentProfile.php">My Profile</a>';
      }
    ?> 
  </div>
  <img src="http://localhost/shikhotron/ELearning/image/ss.png" class="logo" alt="EduGan Logo" style="position: absolute; top: 10px; right: 10px; width: 200px; transition: transform 0.5s ease-in-out; z-index: 1000;" onmouseover="this.style.transform = 'scale(1.2)'" onmouseout="this.style.transform = 'scale(1)'" />

</div>
 <!-- End Video Background -->

<div class="container-fluid bg-danger txt-banner">
  <div class="row bottom-banner" style="text-align: center;">
    <div class="col-sm mx-auto">
      <h5><i class="fas fa-book-open mr-3"></i> Interactive Online Courses</h5>
    </div>
    <div class="col-sm mx-auto">
      <h5><i class="fas fa-users mr-3"></i> Expert Instructors</h5>
    </div>
    <div class="col-sm mx-auto">
      <h5><i class="fas fa-keyboard mr-3"></i>Lifetime Access</h5>
    </div>
    <div class="col-sm mx-auto">
      <h5><i class="fas fa-graduation-cap mr-3"></i> LMS Based Learning</h5>
    </div>
  </div>
</div>

<style>
  .bottom-banner {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
  }
  .logo {
    position: absolute;
    top: 10px;
    right: 10px;
    width: 150px;
    transition: transform 0.5s ease-in-out;
  }
  .logo:hover {
    transform: scale(1.1);
  }
</style>

<div class="container mt-5"> <!-- Start Most Popular Course -->

  <!-- Start Headline -->
  <div class="container-fluid bg-dark text-white py-3 mb-4">
  <div class="container">
    <marquee behavior="scroll" direction="left" class="font-weight-bold" scrollamount="10" style="border: 1px solid #8b0000; padding: 5px; border-radius: 5px; font-family: 'Times New Roman', serif;">
      ShikhoTron is offering Asynchronous Online Learning.   And currently we're just offering 2 courses 'After SSC English' and 'Instructional Technology'. 
    </marquee>
  </div>
</div>



  <!-- End Headline -->

  <h1 class="text-center" style="animation: danceAndChange 4s infinite;">
    Popular Courses
  </h1>

  <div class="card-deck mt-4"> <!-- Start Most Popular Course 1st Card Deck -->
    <?php
    $sql = "SELECT * FROM course LIMIT 3";
    $result = $conn->query($sql);
    if($result->num_rows > 0){ 
      while($row = $result->fetch_assoc()){
        $course_id = $row['course_id'];
        echo '
        <a href="'.(!isset($_SESSION['is_login']) ? 'loginorsignup.php' : 'coursedetails.php?course_id='.$course_id).'" class="btn" style="text-align: left; padding:0px; margin:0px;">
          <div class="card">
            <img src="'.str_replace('..', '.', $row['course_img']).'" class="card-img-top" alt="Guitar" />
            <div class="card-body">
              <h5 class="card-title">'.$row['course_name'].'</h5>
              <p class="card-text">'.$row['course_desc'].'</p>
            </div>
            <div class="card-footer">
              <p class="card-text d-inline">Price: <small><del>&#2547 '.$row['course_original_price'].'</del></small> <span class="font-weight-bolder">&#2547 '.$row['course_price'].'<span></p> <a class="btn btn-primary text-white font-weight-bolder float-right" href="'.(!isset($_SESSION['is_login']) ? 'loginorsignup.php' : 'coursedetails.php?course_id='.$course_id).'">Enroll</a>
            </div>
          </div>
        </a>  ';
      }
    }
    ?>   
  </div>  <!-- End Most Popular Course 1st Card Deck -->   
  <div class="card-deck mt-4"> <!-- Start Most Popular Course 2nd Card Deck -->
    <?php
    $sql = "SELECT * FROM course LIMIT 3,3";
    $result = $conn->query($sql);
    if($result->num_rows > 0){ 
      while($row = $result->fetch_assoc()){
        $course_id = $row['course_id'];
        echo '
          <a href="'.(!isset($_SESSION['is_login']) ? 'loginorsignup.php' : 'coursedetails.php?course_id='.$course_id).'"  class="btn" style="text-align: left; padding:0px;">
            <div class="card">
              <img src="'.str_replace('..', '.', $row['course_img']).'" class="card-img-top" alt="Guitar" />
              <div class="card-body">
                <h5 class="card-title">'.$row['course_name'].'</h5>
                <p class="card-text">'.$row['course_desc'].'</p>
              </div>
              <div class="card-footer">
                <p class="card-text d-inline">Price: <small><del>&#2547 '.$row['course_original_price'].'</del></small> <span class="font-weight-bolder">&#2547 '.$row['course_price'].'<span></p> <a class="btn btn-primary text-white font-weight-bolder float-right" href="'.(!isset($_SESSION['is_login']) ? 'loginorsignup.php' : 'coursedetails.php?course_id='.$course_id).'">Enroll</a>
              </div>
            </div>
          </a>  ';
      }
    }
    ?>
  </div>   <!-- End Most Popular Course 2nd Card Deck --> 
  <div class="text-center m-2">
    <a class="btn btn-danger btn-sm" href="courses.php">View All Course</a> 
  </div>
</div>  <!-- End Most Popular Course -->

<?php 
// Contact Us
include('./contact.php'); 
?>  

<!-- Start Students Testimonial -->
<div class="container-fluid mt-5" style="background-color: #4B7289" id="Feedback">
  <h1 class="text-center testyheading p-4"> Student's Feedback </h1>
  <div class="row">
    <div class="col-md-12">
      <div id="testimonial-slider" class="owl-carousel">
      <?php 
        $sql = "SELECT s.stu_name, s.stu_occ, s.stu_img, f.f_content FROM student AS s JOIN feedback AS f ON s.stu_id = f.stu_id";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
          while($row = $result->fetch_assoc()){
            $s_img = $row['stu_img'];
            $n_img = str_replace('../','',$s_img)
      ?>
        <div class="testimonial">
          <p class="description">
          <?php echo $row['f_content'];?>  
          </p>
          <div class="pic">
            <img src="<?php echo $n_img; ?>" alt=""/>
          </div>
          <div class="testimonial-prof">
            <h4><?php echo $row['stu_name']; ?></h4>
            <small><?php echo $row['stu_occ']; ?></small>
          </div>
        </div>
        <?php }} ?>
      </div>
    </div>
  </div>
</div>  <!-- End Students Testimonial -->

<div class="container-fluid bg-danger"> <!-- Start Social Follow -->
  <div class="row text-white text-center p-1">
    <div class="col-sm">
      <a class="text-white social-hover" href="http://localhost/moodle1"><i class="fas fa-graduation-cap"></i> Moodle</a>
    </div>
    <div class="col-sm">
      <a class="text-white social-hover" href="https://www.facebook.com/blaze.swapnil.swapno/"><i class="fab fa-facebook-f"></i> Facebook</a>
    </div>
    <div class="col-sm">
      <a class="text-white social-hover" href="https://youtube.com/@GyanTech-wq3pu?si=15_8lFVWGshC6Svm"><i class="fab fa-youtube"></i> YouTube</a>
    </div>
    <div class="col-sm">
      <a class="text-white social-hover" href="https://wa.me/8801643211027"><i class="fab fa-whatsapp"></i> WhatsApp</a>
    </div>
  </div>
</div> <!-- End Social Follow -->

<!-- Start About Section -->
<div class="container-fluid p-4" style="background-color:#E9ECEF">
  <div class="container" style="background-color:#E9ECEF">
  <div class="row text-center">
      <div class="col-sm">
        <h5>About Us</h5>
        <p>ShikhoTron is more than just courses. It's a vibrant community of learners and educators who come together to share knowledge, collaborate on projects & support each other's success. Whether you're looking to boost your career, pursue a new passion, or simply expand your horizons, ShikhoTron offers the perfect platform for lifelong learning.</p>
      </div>
      <div class="col-sm">
        <h5>Category</h5>
        <a class="text-dark" href="#">Educational Technology</a><br />
        <a class="text-dark" href="#">English for Beginners</a><br />
        <a class="text-dark" href="#">Educational Research</a><br />
        <a class="text-dark" href="#">Computer Technology</a><br />
        <a class="text-dark" href="#">Graphics & Editing</a><br />
        <a class="text-dark" href="#">Programming & Development</a><br />
      </div>
      <div class="col-sm">
        <h5>Contact Us</h5>
        <p>ShikhoTron<br> Kaliakair, Gazipur <br> Bangladesh <br> Phone: +880 1643-211027 <br> shikhotron@gmail.com </p>
      </div>
      <div class="col-sm">
        <h5>Location</h5>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d93064.87824883043!2d90.3697389471944!3d23.81033244766224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755f740ac38570d%3A0x9f8cbdfc7b8a22e8!2sGazipur!5e0!3m2!1sen!2sbd!4v1644002205371!5m2!1sen!2sbd" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>
  </div>
</div> <!-- End About Section -->

<?php 
// Footer Include from mainInclude 
include('./mainInclude/footer.php'); 
?>
