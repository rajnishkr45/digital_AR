<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login | Digital</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include 'includes/cdn.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <?php include 'includes/navbar.php'; ?>

        <!-- Hero Header -->
        <div class="container-xxl py-5 bg-primary hero-header">
            <div class="container my-5 py-5 px-lg-5">
                <div class="row g-5 py-5">
                    <div class="col-12 text-center">
                        <h1 class="text-white animated slideInDown">Login</h1>
                        <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    </div>
                </div>
            </div>
        </div>

        <!-- Login Form Start -->

        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="bg-light rounded p-5 shadow-sm wow fadeInUp" data-wow-delay="0.3s">
                            <form id="loginForm">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" placeholder="Email" required>
                                    <label for="email">Email</label>
                                </div>
                                <div class="form-floating position-relative mb-3">
                                    <input type="password" class="form-control" id="password" placeholder="Password"
                                        required>
                                    <label for="password">Password</label>
                                    <span class="position-absolute top-50 end-0 translate-middle-y me-3"
                                        onclick="togglePassword()" style="cursor: pointer;">
                                        <i class="bi bi-eye-slash" id="toggleIcon"></i>
                                    </span>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 py-2">Login</button>
                            </form>
                            <p class="mt-3 mb-0 text-center">
                                Don't have an account? <a href="register.php">Register</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Login Form End -->

        <?php include 'includes/footer.php'; ?>
    </div>

    <?php include 'includes/scripts.php'; ?>

    <script src="js/login.js"></script>
</body>

</html>