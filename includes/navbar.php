<?php $currentPage = basename($_SERVER['PHP_SELF']); ?>

<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="index.php" class="navbar-brand p-0">
        <h1 class="m-0">Digital AR</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto py-0">
            <a href="index.php" class="nav-item nav-link <?= $currentPage == 'index.php' ? 'active' : '' ?>">Home</a>
            <a href="about.php" class="nav-item nav-link <?= $currentPage == 'about.php' ? 'active' : '' ?>">About</a>
            <a href="service.php"
                class="nav-item nav-link <?= $currentPage == 'service.php' ? 'active' : '' ?>">Service</a>
            <a href="career.php"
                class="nav-item nav-link <?= $currentPage == 'career.php' ? 'active' : '' ?>">Career</a>
            <div
                class="nav-item dropdown <?= in_array($currentPage, ['team.php', 'testimonial.php']) ? 'active' : '' ?>">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu m-0">
                    <a href="team.php" class="dropdown-item <?= $currentPage == 'team.php' ? 'active' : '' ?>">Our
                        Team</a>
                    <a href="testimonial.php"
                        class="dropdown-item <?= $currentPage == 'testimonial.php' ? 'active' : '' ?>">Testimonial</a>
                </div>
            </div>
            <a href="contact.php"
                class="nav-item nav-link <?= $currentPage == 'contact.php' ? 'active' : '' ?>">Contact</a>
        </div>
        <a href="login.php" class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block"> Log in &nbsp;<i class="fa fa-user"></i></a>
    </div>
</nav>