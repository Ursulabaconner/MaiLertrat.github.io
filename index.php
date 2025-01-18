<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>My Portfolio--Songkran Lertrat</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<?php
// เริ่ม session เพื่อเก็บสถานะภาษา
session_start();

// กำหนดภาษาเริ่มต้น
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'en';
}

// ตรวจสอบว่ามีการส่ง request เพื่อเปลี่ยนภาษา
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    $_SESSION['lang'] = $lang; // เปลี่ยนภาษาที่เลือกใน session
}

// โหลดไฟล์ภาษาที่เลือก
$langFile = 'lang_' . $_SESSION['lang'] . '.php';
$lang = include($langFile);
?>

<body data-spy="scroll" data-target=".navbar" data-offset="51">
    <!-- Navbar Start -->
    <nav class="navbar fixed-top shadow-sm navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-lg-5">
        <a href="index.html" class="navbar-brand ml-lg-3">
            <h1 class="m-0 display-5"><span class="text-primary">My</span>Portfolio</h1>
        </a>
            <a href="?lang=en" class="btn btn-outline-primary">English</a>  
            <a href="?lang=th" class="btn btn-outline-primary">ภาษาไทย</a>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse px-lg-3" id="navbarCollapse">
            <div class="navbar-nav m-auto py-0">
                <a href="#home" class="nav-item nav-link active"><?php echo $lang['home']; ?></a>
                <a href="#about" class="nav-item nav-link"><?php echo $lang['about']; ?></a>
                <a href="#qualification" class="nav-item nav-link"><?php echo $lang['quality']; ?></a>
                <a href="#skill" class="nav-item nav-link"><?php echo $lang['skills']; ?></a>
                <a href="#service" class="nav-item nav-link"><?php echo $lang['service']; ?></a>
                <a href="#portfolio" class="nav-item nav-link"><?php echo $lang['portfolio']; ?></a>
                <a href="#contact" class="nav-item nav-link"><?php echo $lang['contact']; ?></a>
            </div>
            <!-- <a href="?lang=en" class="btn btn-outline-primary d-none d-lg-block">English</a>  
            <a href="?lang=th" class="btn btn-outline-primary d-none d-lg-block">ภาษาไทย</a> -->
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Video Modal Start -->
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->

    <!-- Header Start -->
    <div class="container-fluid bg-primary d-flex align-items-center mb-5 py-5" id="home" style="min-height: 100vh;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 px-5 pl-lg-0 pb-5 pb-lg-0">
                    <img class="img-fluid w-100 rounded-circle shadow-sm" src="img/profile.jpg" alt="">
                </div>
                <div class="col-lg-7 text-center text-lg-left">
                    <h3 class="text-white font-weight-normal mb-3">I'm</h3>
                    <h1 class="display-3 text-uppercase text-primary mb-2" style="-webkit-text-stroke: 2px #ffffff;"><?php echo $lang['welcome']; ?></h1>
                    <h1 class="typed-text-output d-inline font-weight-lighter text-white"></h1>
                    <div class="typed-text d-none">Web Developer, PHP Developer, IT Admin</div>
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5">
                        <a href="" class="btn btn-outline-light mr-5">Download CV</a>
                        <button type="button" class="btn-play" data-toggle="modal" 
                                data-src="https://www.youtube.com/embed/oUI_tVU77cw" 
                                data-target="#videoModal" 
                                onclick="setVideoSrc(this)">
                            <span></span>
                        </button>

                        <h5 class="font-weight-normal text-white m-0 ml-4 d-none d-sm-block">Play Video</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->



    <!-- About Start -->
    <div class="container-fluid py-5" id="about">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">About</h1>
                <h1 class="position-absolute text-uppercase text-primary"><?php echo $lang['about_head']; ?></h1>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5 pb-4 pb-lg-0">
                    <img class="img-fluid rounded w-100" src="img/about.jpg" alt="">
                </div>
                <div class="col-lg-7">
                    <h3 class="mb-4">IT Admin & Web Developer</h3>
                    <p><?php echo $lang['detail']; ?></p>
                    <div class="row mb-3">
                        <div class="col-sm-6 py-2"><h6>Name: <span class="text-secondary"><?php echo $lang['name']; ?></span></h6></div>
                        <div class="col-sm-6 py-2"><h6>Birthday: <span class="text-secondary"><?php echo $lang['birthday']; ?></span></h6></div>
                        <div class="col-sm-6 py-2"><h6>Degree: <span class="text-secondary"><?php echo $lang['degree']; ?></span></h6></div>
                        <div class="col-sm-6 py-2"><h6>Experience: <span class="text-secondary">1 <?php echo $lang['experience']; ?></span></h6></div>
                        <div class="col-sm-6 py-2"><h6>Phone: <span class="text-secondary">+66938929953</span></h6></div>
                        <div class="col-sm-6 py-2"><h6>Email: <span class="text-secondary">mai_wolffox@hotmail.com</span></h6></div>
                        <div class="col-sm-6 py-2"><h6>Address: <span class="text-secondary"><?php echo $lang['address']; ?></span></h6></div>
                        <div class="col-sm-6 py-2"><h6>Freelance: <span class="text-secondary"><?php echo $lang['freelance']; ?></span></h6></div>
                    </div>
                    <a href="" class="btn btn-outline-primary">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Qualification Start -->
    <div class="container-fluid py-5" id="qualification">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Quality</h1>
                <h1 class="position-absolute text-uppercase text-primary"><?php echo $lang['education_expericence_head']; ?></h1>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h3 class="mb-4"><?php echo $lang['education_head']; ?></h3>
                    <div class="border-left border-primary pt-2 pl-4 ml-2">
                        <div class="position-relative mb-4">
                            <i class="far fa-dot-circle text-primary position-absolute" style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1"><?php echo $lang['gradelevel1']; ?></h5>
                            <p class="mb-2"><strong><?php echo $lang['where1']; ?></strong> | <small><?php echo $lang['year1']; ?></small></p>
                            <p><?php echo $lang['education_detail1']; ?></p>
                        </div>
                        <div class="position-relative mb-4">
                            <i class="far fa-dot-circle text-primary position-absolute" style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1"><?php echo $lang['gradelevel2']; ?></h5>
                            <p class="mb-2"><strong><?php echo $lang['where2']; ?></strong> | <small><?php echo $lang['year2']; ?></small></p>
                            <p><?php echo $lang['education_detail2']; ?></p>
                        </div>
                        <div class="position-relative mb-4">
                            <i class="far fa-dot-circle text-primary position-absolute" style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1"><?php echo $lang['gradelevel3']; ?></h5>
                            <p class="mb-2"><strong><?php echo $lang['where3']; ?></strong> | <small><?php echo $lang['year3']; ?></small></p>
                            <p><?php echo $lang['education_detail3']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3 class="mb-4"><?php echo $lang['experience_head']; ?></h3>
                    <div class="border-left border-primary pt-2 pl-4 ml-2">
                        <div class="position-relative mb-4">
                            <i class="far fa-dot-circle text-primary position-absolute" style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1"><?php echo $lang['experience1']; ?></h5>
                            <p class="mb-2"><strong><?php echo $lang['company1']; ?></strong> | <small><?php echo $lang['year4']; ?></small></p>
                            <p><?php echo $lang['experience_detail1']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Qualification End -->


    <!-- Skill Start -->
    <div class="container-fluid py-5" id="skill">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Skills</h1>
                <h1 class="position-absolute text-uppercase text-primary">My Skills</h1>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">HTML</h6>
                            <h6 class="font-weight-bold">95%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">CSS</h6>
                            <h6 class="font-weight-bold">85%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">PHP</h6>
                            <h6 class="font-weight-bold">90%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">SQL</h6>
                            <h6 class="font-weight-bold">95%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">Javascript</h6>
                            <h6 class="font-weight-bold">60%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">Java</h6>
                            <h6 class="font-weight-bold">60%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Skill End -->


    <!-- Services Start -->
    <div class="container-fluid pt-5" id="service">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Service</h1>
                <h1 class="position-absolute text-uppercase text-primary"><?php echo $lang['service_head']; ?></h1>
            </div>
            <div class="row pb-3">
                <div class="col-lg-4 col-md-6 text-center mb-5">
                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <i class="fa fa-2x fa-laptop-code service-icon bg-primary text-white mr-3"></i>
                        <h4 class="font-weight-bold m-0"><?php echo $lang['service1']; ?></h4>
                    </div>
                    <p><?php echo $lang['service_detail1']; ?></p>
                </div>
                <div class="col-lg-4 col-md-6 text-center mb-5">
                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <i class="fa fa-2x fa-laptop service-icon bg-primary text-white mr-3"></i>
                        <h4 class="font-weight-bold m-0"><?php echo $lang['service2']; ?></h4>
                    </div>
                    <p><?php echo $lang['service_detail2']; ?></p>
                </div>
                <div class="col-lg-4 col-md-6 text-center mb-5">
                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <i class="fa fa-2x fa-gears service-icon bg-primary text-white mr-3"></i>
                        <h4 class="font-weight-bold m-0"><?php echo $lang['service3']; ?></h4>
                    </div>
                    <p><?php echo $lang['service_detail3']; ?></p>
                </div>
                <div class="col-lg-4 col-md-6 text-center mb-5">
                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <i class="fa fa-2x fa-database service-icon bg-primary text-white mr-3"></i>
                        <h4 class="font-weight-bold m-0"><?php echo $lang['service4']; ?></h4>
                    </div>
                    <p><?php echo $lang['service_detail4']; ?></p>
                </div>
                <div class="col-lg-4 col-md-6 text-center mb-5">
                    <div class="d-flex align-items-center justify-content-center mb-5">
                        <i class="fa fa-2x fa-search service-icon bg-primary text-white mr-3"></i>
                        <h4 class="font-weight-bold m-0"><?php echo $lang['service5']; ?></h4>
                    </div>
                    <p><?php echo $lang['service_detail5']; ?></p>
                </div>
                <div class="col-lg-4 col-md-6 text-center mb-5">
                    <div class="d-flex align-items-center justify-content-center mb-5">
                        <i class="fa fa-2x fa-regular fa-closed-captioning service-icon bg-primary text-white mr-3"></i>
                        <h4 class="font-weight-bold m-0"><?php echo $lang['service6']; ?></h4>
                    </div>
                    <p><?php echo $lang['service_detail6']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->


    <!-- Portfolio Start -->
    <div class="container-fluid pt-5 pb-3" id="portfolio">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Gallery</h1>
                <h1 class="position-absolute text-uppercase text-primary"><?php echo $lang['portfolio_head']; ?></h1>
            </div>
            <div class="row">
                <div class="col-12 text-center mb-2">
                    <ul class="list-inline mb-4" id="portfolio-flters">
                        <li class="btn btn-sm btn-outline-primary m-1 active"  data-filter="*">All</li>
                        <li class="btn btn-sm btn-outline-primary m-1" data-filter=".first">Design</li>
                        <li class="btn btn-sm btn-outline-primary m-1" data-filter=".second">Development</li>
                        <li class="btn btn-sm btn-outline-primary m-1" data-filter=".third">Marketing</li>
                    </ul>
                </div>
            </div>
            <div class="row portfolio-container">
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item first">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid rounded w-100" src="img/rw-6.png" alt="">
                        <!-- <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="img/portfolio-1.jpg" data-lightbox="portfolio">
                                <i class="fa fa-plus text-white" style="font-size: 60px;"></i>
                            </a>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item second">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid rounded w-100" src="img/rw-5.png" alt="">
                        <!-- <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="img/portfolio-2.jpg" data-lightbox="portfolio">
                                <i class="fa fa-plus text-white" style="font-size: 60px;"></i>
                            </a>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item third">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid rounded w-100" src="img/rw-1.png" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item first">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid rounded w-100" src="img/rw-2.png" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item second">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid rounded w-100" src="img/rw-3.png" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item third">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid rounded w-100" src="img/rw-4.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio End -->

    


    <!-- Contact Start -->
    <div class="container-fluid py-5" id="contact">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Contact</h1>
                <h1 class="position-absolute text-uppercase text-primary"><?php echo $lang['contact_head']; ?></h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form text-center">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate">
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <input type="text" class="form-control p-4" id="name" placeholder="<?php echo $lang['name_sead']; ?>"
                                        required="required" data-validation-required-message="Please enter your name" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <input type="email" class="form-control p-4" id="email" placeholder="<?php echo $lang['email_sead']; ?>"
                                        required="required" data-validation-required-message="Please enter your email" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control p-4" id="subject" placeholder="<?php echo $lang['subject_sead']; ?>"
                                    required="required" data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control py-3 px-4" rows="5" id="message" placeholder="<?php echo $lang['message_sead']; ?>"
                                    required="required"
                                    data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn btn-outline-primary" type="submit" id="sendMessageButton">Send
                                    Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-primary text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="container text-center py-5">
            <div class="d-flex justify-content-center mb-4">
                <a class="btn btn-light btn-social mr-2" href="https://www.facebook.com/profile.php?id=100010346024463"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-light btn-social mr-2" href="https://github.com/Ursulabaconner"><i class="fab fa-github"></i></a>
                <a class="btn btn-light btn-social" href="https://www.instagram.com/songkranlertrat/"><i class="fab fa-instagram"></i></a>
            </div>
            <!-- <div class="d-flex justify-content-center mb-3">
                <a class="text-white" href="#">Privacy</a>
                <span class="px-3">|</span>
                <a class="text-white" href="#">Terms</a>
                <span class="px-3">|</span>
                <a class="text-white" href="#">FAQs</a>
                <span class="px-3">|</span>
                <a class="text-white" href="#">Help</a>
            </div> -->
            <p class="m-0">&copy; <a class="text-white font-weight-bold" href="#">Domain Name</a>. All Rights Reserved. Designed by <a class="text-white font-weight-bold" href="https://htmlcodex.com">HTML Codex</a>
            </p>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Scroll to Bottom -->
    <i class="fa fa-2x fa-angle-down text-white scroll-to-bottom"></i>

    <!-- Back to Top -->
    <a href="#" class="btn btn-outline-dark px-0 back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/typed/typed.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>