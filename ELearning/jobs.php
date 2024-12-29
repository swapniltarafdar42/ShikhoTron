<?php
  include('./dbConnection.php');
  // Header Include from mainInclude 
  include('./mainInclude/header.php'); 
?>  
    <div class="container-fluid bg-dark"> <!-- Start Course Page Banner -->
      <div class="row">
        <img src="./image/job.jpg" alt="courses" style="height:300px; width:100%; object-fit:cover; box-shadow:10px;"/>
      </div> 
    </div> <!-- End Course Page Banner -->

    </div> 
</div> <!-- End Course Page Banner -->
<!-- Job Circular Image -->

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <img src="./image/job.png" alt="Job Circular" class="img-fluid job-circular" style="max-width: 450px; height: auto; animation: fadeIn 1s ease forwards;">
        </div>
    </div>
</div>

<div class="container">
    <div class="row mt-5">
        <div class="col-md-8">
            <h2 class="mb-4">Join Our Team</h2>
            <p>We are looking for passionate individuals to join our team and help shape the future of online education. If you are enthusiastic about teaching and technology, we want to hear from you!</p>

            <div class="accordion" id="jobAccordion">
                <!-- Job Listings -->
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Online Course Instructor - Programming
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#jobAccordion">
                        <div class="card-body">
                            We are seeking an experienced programming instructor to develop and teach online courses for our platform. Candidates should have a strong background in programming and a passion for teaching.
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                Webmaster
                            </button>
                        </h5>
                    </div>

                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#jobAccordion">
                        <div class="card-body">
                            We are looking for a skilled webmaster to manage our website and ensure its smooth operation. The ideal candidate should have experience in web development, server management, and troubleshooting.
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                Database Administrator
                            </button>
                        </h5>
                    </div>

                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#jobAccordion">
                        <div class="card-body">
                            We are seeking a skilled database administrator to manage and optimize our databases. Candidates should have expertise in database management systems and be proficient in SQL.
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                Marketing Staff
                            </button>
                        </h5>
                    </div>

                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#jobAccordion">
                        <div class="card-body">
                            We are looking for dynamic marketing staff to promote our online courses and attract more students. Candidates should have excellent communication skills and a creative approach to marketing.
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header" id="headingFive">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                Graphic Designer
                            </button>
                        </h5>
                    </div>

                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#jobAccordion">
                        <div class="card-body">
                            We are seeking a talented graphic designer to create visually appealing graphics and promotional materials for our online courses. Candidates should have proficiency in graphic design software and a strong portfolio.
                        </div>
                    </div>
                </div>
                
            </div>

            <p>If you are interested in any of the positions listed above or would like to inquire about other opportunities, please send your resume and cover letter to <a href="mailto:shikhotron@gmail.com">shikhotron@gmail.com</a>.</p>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Why Join Us?</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Opportunity to make a difference in education.</li>
                        <li class="list-group-item">Competitive salaries and benefits.</li>
                        <li class="list-group-item">Flexible working hours.</li>
                        <li class="list-group-item">Dynamic and supportive work environment.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>




<?php 
// Footer Include from mainInclude 
include('./mainInclude/footer.php'); 
?>
