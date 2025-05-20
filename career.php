<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Digital AR | Career</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php
    include 'includes/cdn.php';
    ?>

</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>

        <!-- Navbar -->
        <div class="container-xxl position-relative p-0">
            <?php
            include 'includes/navbar.php';
            ?>

            <div class="container-xxl py-5 bg-primary hero-header">
                <div class="container my-5 py-5 px-lg-5">
                    <div class="row g-5 py-5">
                        <div class="col-12 text-center">
                            <h1 class="text-white animated slideInDown">Career</h1>
                            <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                                    <li class="breadcrumb-item text-white active" aria-current="page">Career</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Career Section -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <p class="section-title text-secondary justify-content-center"><span></span>Join Our
                        Team<span></span></p>
                    <h1 class="text-center mb-5">Current Openings</h1>
                </div>
                <div class="row g-4">
                    <!-- Job Card -->
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="bg-light rounded p-4">
                            <h4>Frontend Developer</h4>
                            <p class="mb-1"><i class="bi bi-geo-alt-fill me-2"></i>Remote / Hybrid</p>
                            <p class="mb-1"><i class="bi bi-clock-fill me-2"></i>Full-time</p>
                            <p class="mb-3"><i class="bi bi-currency-dollar me-2"></i>₹4-6 LPA</p>
                            <a href="#" class="btn btn-primary btn-sm rounded-pill">Apply Now</a>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="bg-light rounded p-4">
                            <h4>UI/UX Designer</h4>
                            <p class="mb-1"><i class="bi bi-geo-alt-fill me-2"></i>Mumbai, India</p>
                            <p class="mb-1"><i class="bi bi-clock-fill me-2"></i>Internship</p>
                            <p class="mb-3"><i class="bi bi-currency-dollar me-2"></i>₹10,000/month</p>
                            <a href="#" class="btn btn-primary btn-sm rounded-pill">Apply Now</a>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="bg-light rounded p-4">
                            <h4>Content Writer</h4>
                            <p class="mb-1"><i class="bi bi-geo-alt-fill me-2"></i>Remote</p>
                            <p class="mb-1"><i class="bi bi-clock-fill me-2"></i>Part-time</p>
                            <p class="mb-3"><i class="bi bi-currency-dollar me-2"></i>₹15,000/month</p>
                            <a href="#" class="btn btn-primary btn-sm rounded-pill">Apply Now</a>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <h5>Didn't find a role that fits you?</h5>
                    <p>Send us your resume and we'll get back when something comes up.</p>
                    <a href="mailto:hr@example.com" class="btn btn-outline-primary rounded-pill">Send Resume</a>
                </div>
            </div>
        </div>

        <!-- Footer starts -->
        <?php
        include 'includes/footer.php';
        ?>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-secondary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <?php
    include 'includes/scripts.php';
    ?>
</body>

</html>