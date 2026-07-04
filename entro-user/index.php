<?php
include("../entro-admin/connection.php");

if (isset($_POST['submit'])) {
    $first_name = $_POST['firstname'];
    $surname = $_POST['surname'];
    $company_name = $_POST['companyname'];
    $phone_no = $_POST['phonenum'];
    $message = $_POST['message'];
    $status = "Pending";

    $sql = "INSERT INTO `messages`( `first_name`, `surname`, `company_name`, `phone_no`, `message` , `status`) VALUES ('$first_name','$surname','$company_name','$phone_no','$message',  '$status' )";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $success = true;
        header("location:index.php");
    } else {
        die(mysqli_error($con));
    };
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Deafult Meta Tag -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- OG Meta Tag -->
    <meta name="robots" content="index, follow">
    <meta name="og:title" content="Best EntroLaunch Onepage Bootstrap Templates - DesignToCodes">
    <meta name="og:description" content="Get ahead of the competition with EntroLaunch Onepage Bootstrap Template designed specifically for entrepreneurs. Start today!">
    <meta property="og:image" content="https://designtocodes.com/wp-content/uploads/2024/04/Best-EntroLaunch-Onepage-Bootstrap-Templates-DesignToCodes.jpg">
    <!-- Title -->
    <title>Entro Launch | Home</title>
    <!-- Favicon -->
    <link rel="icon" id="favicon" href="./assets/images/favicon.png" type="image/gif" sizes="16x16">
    <!-- Google Font Link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <!-- Font Awesome 5 CDN/ Icon Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Fancybox Image Gallery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <!-- Slider CSS Link -->
    <link rel="stylesheet" href="./lib/slick-1.8.1/slick/slick.css">
    <link rel="stylesheet" href="./lib/slick-1.8.1/slick/slick-theme.css">
    <!-- Bootstarp 5 CSS Link -->
    <link rel="stylesheet" href="./lib/bootstrap-5/css/bootstrap.min.css">
    <!-- Main CSS Link -->

    <!-- Responsive CSS Link -->
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <!-- Home Page Start -->

    <!-- Header Start -->
    <header class="site-navbar sticky-top">
        <div class="container">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg" id="main-nav">
                <!-- Logo -->
                <a class="navbar-brand" href="./index.php"><img src="./assets/images/logo.svg" class="w-100" alt="Logo"></a>
                <!-- Logo -->

                <!-- HamBurger -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span><i class="fas fa-bars"></i></span>
                </button>
                <!-- HamBurger -->

                <!-- Nav Item -->
                <div class="collapse navbar-collapse cloned-nav-source justify-content-between">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="./index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#services">services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#blog">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>

                        <li class="nav-item d-block d-lg-none">
                            <a class="nav-link" href="./pages/authentication/login.php">Login</a>
                        </li>
                        <li class="nav-item d-block d-lg-none">
                            <a class="nav-link" href="./pages/authentication/signup.php">Sign up</a>
                        </li>
                    </ul>
                    <div class="nav-auth-buttons d-none d-lg-block">
                        <a href="./pages/authentication/login.php" class="nav-link d-inline-block">Login</a>
                        <!-- <a href="./pages/authentication/signup.php" class="btn custom-purple-btn">Sign up</a> -->
                    </div>
                </div>
                <!-- Nav Item -->
            </nav>
            <!-- Navbar -->

            <!-- Tab And Mobile View -->
            <div class="collapse navbar-collapse mobile-nav-overlay" id="navbarSupportedContent">
                <div class="mobile-nav-panel container">
                    <div class="text-right">
                        <button class="navbar-toggler nav-close-btn p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span><i class="fa fa-times"></i></span>
                        </button>
                    </div>

                    <div class="navbar mobile-nav-overlay_body"></div>
                </div>
            </div>
            <!-- Tab And Mobile View -->
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Section Start -->
    <section class="hero-section text-center text-md-start">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4">
                    <h1 class="hero-heading position-relative">your gateway to <span>entrepreneurial</span> success</h1>
                    <p>Prospect humoured mistress to by proposal marianne attended. Simplicity the far admiration preference everything. Up help home head spot an he room in.</p>
                    <a href="#contact" class="btn btn-primary position-relative">Get Started</a>
                </div>
                <div class="col-md-6">
                    <div class="hero-image-bg">
                        <div class="image-container position-relative">
                            <img src="./assets/images/hero_img_right.jpg" class="w-100 h-100" alt="Hero Right Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Features Section Start -->
    <section class="features-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="feature-card text-center">
                        <img src="./assets/images/features_img_one.svg" class="img-fluid" alt="Features Image">
                        <div class="card-body-content">
                            <h4 class="card-heading">Entrepreneurial Coaching</h4>
                            <p class="mb-0">Details about coaching sessions for aspiring entrepreneurs systems in sessions</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="feature-card text-center">
                        <img src="./assets/images/features_img_two.png" class="img-fluid" alt="Features Image">
                        <div class="card-body-content">
                            <h4 class="card-heading">Business Plan Development</h4>
                            <p class="mb-0">Information on creating comprehensive business plans entrepreneurs</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 offset-md-3 offset-lg-0">
                    <div class="feature-card text-center">
                        <img src="./assets/images/features_img_three.svg" class="img-fluid" alt="Features Image">
                        <div class="card-body-content">
                            <h4 class="card-heading">Funding Assistance</h4>
                            <p class="mb-0">Assistance in securing funding for startups business plans entrepreneurs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features Section End -->

    <!-- About Section Start -->
    <section class="about-section section-decorative-bg position-relative" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="row">
                        <div class="col-md-6 col-lg-12 text-center text-md-start">
                            <h4 class="section-label">About Agency</h4>
                            <h2 class="section-title pe-0 pe-md-5">I Believe In Nurturing The Entrepreneurial Spirit at EntroLaunch</h2>
                            <p class="section-subtitle">Met defective are allowance two perceived listening consulted contained. It chicken oh colonel pressed excited suppose to shortly.</p>
                        </div>
                        <div class="col-md-6 col-lg-12">
                            <ul class="nav mb-3" id="pills-tab-one" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-mission-tab" data-bs-toggle="pill" data-bs-target="#pills-mission" type="button" role="tab" aria-controls="pills-mission" aria-selected="true">Mission</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-vission-tab" data-bs-toggle="pill" data-bs-target="#pills-vission" type="button" role="tab" aria-controls="pills-vission" aria-selected="false">Vission</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tab-oneContent">
                                <div class="tab-pane fade show active" id="pills-mission" role="tabpanel" aria-labelledby="pills-mission-tab">
                                    <p>Surprise not wandered speedily husbands although yet end. Are court tiled cease young built fat one man taken. We highest ye friends is exposed equally in. Ignorant had too strictly followed.</p>
                                    <ul>
                                        <li>
                                            <i class="fas fa-check"></i>
                                            Become successful & superior
                                        </li>
                                        <li>
                                            <i class="fas fa-check"></i>
                                            Provide quick & good solution for business
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="pills-vission" role="tabpanel" aria-labelledby="pills-vission-tab">
                                    <p>Surprise not wandered speedily husbands although yet end. Are court tiled cease young built fat one man taken. We highest ye friends is exposed equally in. Ignorant had too strictly followed.</p>
                                    <ul>
                                        <li>
                                            <i class="fas fa-check"></i>
                                            Become successful & superior
                                        </li>
                                        <li>
                                            <i class="fas fa-check"></i>
                                            Provide quick & good solution for business
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <a href="./pages/about.php" class="btn mt-md-3 mt-xl-4">see more</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <a href="https://www.youtube.com/@designtocodes" target="_blank" class="video-cta-box">
                        <i class="far fa-play-circle"></i>
                        <h6 class="mb-0">Watch Video</h6>
                    </a>
                </div>
            </div>
        </div>
        <div class="about-side-image">
            <img src="./assets/images/about_right_img.png" class="img-fluid" alt="About Image">
        </div>
    </section>
    <!-- About Section End -->

    <!-- Services Section Start -->
    <section class="services-section section-decorative-bg" id="services">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-12 col-xl-5 text-center text-xl-start">
                    <h4 class="section-label">Services</h4>
                    <h2 class="section-title">I Provide the Best Solutions to Improve Your Business.</h2>
                    <p class="section-subtitle">My highest ye friends is exposed equally in. Ignorant had too strictly followed. Astonished as travelling assistance or unreserved oh pianoforte.</p>
                    <a href="#" class="btn mb-4 mb-md-5 mb-xl-0">view all</a>
                </div>
                <div class="col-md-12 col-xl-7 col-xxl-6">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="feature-card text-center">
                                <img src="./assets/images/services_img_one.png" class="img-fluid" alt="Services Image">
                                <div class="card-body-content">
                                    <h4 class="card-heading">Entrepreneurial Coaching</h4>
                                    <p>Personalised coaching sessions tailored to your need</p>
                                    <a href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-0 mt-md-4 mb-4 mb-md-0">
                            <div class="feature-card text-center">
                                <img src="./assets/images/services_img_two.png" class="img-fluid" alt="Services Image">
                                <div class="card-body-content">
                                    <h4 class="card-heading">Business Plan Development</h4>
                                    <p>Create a roadmap for success with our comprehensive business</p>
                                    <a href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="feature-card text-center">
                                <img src="./assets/images/services_img_three.png" class="img-fluid" alt="Services Image">
                                <div class="card-body-content">
                                    <h4 class="card-heading">Funding Assistance</h4>
                                    <p>Navigate the complexities of funding options and secure</p>
                                    <a href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-0 mt-md-4">
                            <div class="feature-card text-center">
                                <img src="./assets/images/services_img_four.png" class="img-fluid" alt="Services Image">
                                <div class="card-body-content">
                                    <h4 class="card-heading">Marketing Strategies</h4>
                                    <p>Stand out in a competitive market with innovative marketing</p>
                                    <a href="./pages/single_service.php">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Counter Section Start -->
    <section class="counter-section">
        <div class="container">
            <div class="row">
                <div class="col-6 col-lg-3 text-center mb-4 mb-lg-0">
                    <div class="counter-box">
                        <h2><span class="count">15</span></h2>
                        <h4 class="mb-0">Years of experience</h4>
                    </div>
                </div>
                <div class="col-6 col-lg-3 text-center mb-4 mb-md-0">
                    <div class="counter-box counter-box-bordered">
                        <h2><span class="count">1250</span>+</h2>
                        <h4 class="mb-0">Happy Clients</h4>
                    </div>
                </div>
                <div class="col-6 col-lg-3 text-center">
                    <div class="counter-box">
                        <h2><span class="count">1</span>k+</h2>
                        <h4 class="mb-0">Project Done</h4>
                    </div>
                </div>
                <div class="col-6 col-lg-3 text-center">
                    <div class="counter-box">
                        <h2><span class="count">100</span>+</h2>
                        <h4 class="mb-0">Giving Consultancy</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Counter Section End -->



    <!-- Call To Action Section Start -->
    <section class="cta-section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 text-center">
                    <h2 class="section-title">Unlock Your Entrepreneurial Potential Today Take the First Step Towards Success!</h2>
                    <p class="section-subtitle px-0 px-md-5">Distrusts fulfilled happiness unwilling as explained of difficult. No landlord of peculiar ladyship attended if contempt ecstatic. Loud wish made on is am as hard. Court so avoid in plate hence.</p>
                    <a href="./pages/contact.php" class="btn btn-outline-white">Get Started Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Call To Action Section End -->

    <!-- Blog Section Start -->
    <section class="blog-section" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <h4 class="section-label">Blogs</h4>
                    <h2 class="section-title">Explore my blog</h2>
                    <p class="section-subtitle">Learn from industry experts and stay updated on the latest trends and developments in the startup ecosystem practical tips, actionable insights, and success stories.</p>
                </div>
            </div>
            <div class="row">
           
                <?php
                include('./pages/authentication/connection.php');

                $sql = "SELECT * FROM blog ORDER BY id DESC";
                $result = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_assoc($result)) {

                ?>

                    <div class="col-md-4  my-2 ">

                        <div class="feature-card h-100">

                            <div class="blog-date-badge">
                                <h6>
                                    <?php echo date("d M", strtotime($row['Date'])); ?>
                                </h6>
                            </div>

                            <span>
                                <?php echo $row['Typle']; ?>
                            </span>

                            <h4 class="card-heading">
                                <a href="./pages/blog_details.php?id=<?php echo $row['id']; ?>">
                                    <?php echo $row['Title']; ?>
                                </a>
                            </h4>

                            <p class="mb-0">
                                <?php echo substr($row['Content'], 0, 120); ?>...
                            </p>

                        </div>

                    </div>

                <?php
                }
                ?>
            </div>

        </div>
        </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <!-- Contact Section Start -->
    <section class="contact-section" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-4">
                    <div class="contact-info-panel">
                        <h4>Contact Information</h4>
                        <div class="contact-info-row d-flex align-items-center">
                            <a href="tel:1386688329" class="social-icon-btn"><i class="fas fa-phone-alt"></i></a>
                            <p class="mb-0">+1 386-688-3295</p>
                        </div>
                        <div class="contact-info-row d-flex align-items-center">
                            <a href="mailto:entrolaunch@info.com" class="social-icon-btn"><i class="fas fa-envelope"></i></a>
                            <p class="mb-0">entrolaunch@info.com</p>
                        </div>
                        <div class="contact-info-row d-flex align-items-center">
                            <a href="https://www.google.com/maps/search/8819+ohio+south+gate,+ca+90290/@37.6571581,-109.9648403,5z/data=!3m1!4b1?entry=ttu" target="_blank" class="social-icon-btn"><i class="fas fa-map-marker-alt"></i></a>
                            <p class="mb-0">8819 ohio south gate, ca 90290</p>
                        </div>
                        <h6>Social Media</h6>
                        <ul class="list-group list-group-horizontal mb-4 mb-md-0">
                            <li>
                                <a href="https://www.facebook.com/Designtocodes" target="_blank" class="social-icon-btn"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/DesignToCodes" target="_blank" class="social-icon-btn"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/company/designtocodes/" target="_blank" class="social-icon-btn"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/designtocodes/" target="_blank" class="social-icon-btn"><i class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-7 col-lg-8">
                    <div class="contact-form-panel">
                        <h4>Send Message</h4>
                        <p>Get in touch with me</p>
                        <form class="row needs-validation" method="post" novalidate>
                            <div class="col-md-6 mb-4">
                                <input type="text" class="form-control" id="validationCustomFirstName" autocomplete="off" placeholder="First Name" name="firstname" required>
                            </div>
                            <div class="col-md-6 mb-4 mb-md-0">
                                <input type="text" class="form-control" id="validationCustomLastName" autocomplete="off" placeholder="Last Name" name="surname" required>
                            </div>
                            <div class="col-md-6 mb-4 mb-md-0">
                                <input type="text" class="form-control" id="validationCustomCompany" autocomplete="off" placeholder="Company Name" name="companyname" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <input type="tel" class="form-control" id="validationCustomNumber" autocomplete="off" placeholder="Phone Number" name="phonenum" required>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" rows="4" id="validationCustomMessage" placeholder="Send a Message" name="message" required></textarea>
                                <button class="btn" type="submit" name="submit">Submit Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section Start -->
    <footer class="site-footer footer-wave-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-4 mb-4 mb-lg-0">
                    <a href="./index.php"><img src="./assets/images/footer_logo.svg" alt="Footer Logo"></a>
                    <p class="mb-0">Cuteness you exquisite ourselves now end forfeited. Enquire ye without it garrets himself. Interest our nor received followed was.</p>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                    <div class="footer-contact-info">
                        <h6>Get In Touch</h6>
                        <div class="contact-info-row d-flex align-items-center">
                            <a href="tel:1386688329" class="social-icon-btn"><i class="fas fa-phone-alt"></i></a>
                            <p class="mb-0">+1 386-688-3295</p>
                        </div>
                        <div class="contact-info-row d-flex align-items-center">
                            <a href="mailto:entrolaunch@info.com" class="social-icon-btn"><i class="fas fa-envelope"></i></a>
                            <p class="mb-0">entrolaunch@info.com</p>
                        </div>
                        <div class="contact-info-row d-flex align-items-center">
                            <a href="https://www.google.com/maps/search/8819+ohio+south+gate,+ca+90290/@37.6571581,-109.9648403,5z/data=!3m1!4b1?entry=ttu" target="_blank" class="social-icon-btn"><i class="fas fa-map-marker-alt"></i></a>
                            <p class="mb-0">8819 ohio south gate, ca 90290</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="footer-newsletter">
                        <h6>Social Media</h6>
                        <ul class="list-group list-group-horizontal">
                            <li>
                                <a href="https://www.facebook.com/Designtocodes" target="_blank" class="social-icon-btn"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/DesignToCodes" target="_blank" class="social-icon-btn"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/company/designtocodes/" target="_blank" class="social-icon-btn"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/designtocodes/" target="_blank" class="social-icon-btn"><i class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
                        <h6 class="mb-4">Newsletter</h6>
                        <form class="needs-validation" novalidate>
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Enter your email here" aria-describedby="newsletter_btn" autocomplete="on" required>
                                <button class="btn" type="submit" id="newsletter_btn"><i class="fas fa-paper-plane"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copy Right Start -->
        <div class="container">
            <div class="copyright-bar">
                <p class="mb-0 text-center">Copyright &copy; 2025 <a href="https://designtocodes.com/" target="_blank" class="footer-link">Hridayadhikari</a>. All Rights Reserved.</p>
            </div>
        </div>
        <!-- Copy Right End -->
    </footer>
    <!-- Footer Section End -->

    <!-- Scroll Button Start -->
    <div id="scrollBtn" class="scroll-top-btn">
        <a href="#">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <!-- Scroll Button  End -->

    <!-- Home Page End -->




    <!-- Main JS CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap 5 JS Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./lib/bootstrap-5/js/bootstrap.bundle.min.js"></script>
    <!-- Fancybox Image Gallery JS CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <!-- Slider JS Link -->
    <script src="./lib/slick-1.8.1/slick/slick.min.js"></script>
    <!-- Main JS Link -->
    <script src="./assets/js/main.js"></script>
</body>

</html>