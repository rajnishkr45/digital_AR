<?php

session_start();

include '../backend/config.php';

// Assuming user is logged in and their ID is stored in $_SESSION['user_id']
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <style>
        :root {
            --light: #ffffff;
            --light-blue: #e0f0ff;
            --light-yellow: #fffbe6;
            --light-orange: #ffe5d4;
            --light-green: #e0ffe0;

            --blue: #3498db;
            --yellow: #f1c40f;
            --orange: #e67e22;
            --green: #2ecc71;
            --dark: #2c3e50;
        }


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "poppins";
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 220px;
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            transition: transform 0.3s ease;
        }

        .sidebar h2 {
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: 550;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
        }

        .main {
            flex: 1;
        }

        .topbar {
            background-color: #2c3e50;
            color: white;
            padding: 15px 20px;
            display: flex;
            flex-direction: row-reverse;
            align-items: center;
            justify-content: space-between;
            position: fixed;
            width: 100vw;
        }

        .topbar h1 {
            font-size: 24px;
            font-weight: 550;
        }

        .toggle-btn {
            font-size: 28px;
            background: none;
            color: white;
            border: none;
            cursor: pointer;
        }

        #content .box-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            grid-gap: 24px;
            margin: 100px 15px 0;
        }

        #content .box-info a {
            padding: 24px;
            text-decoration: none;
            background: var(--light);
            border-radius: 15px;
            display: flex;
            align-items: center;
            grid-gap: 24px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;

            &:hover {
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            }
        }

        #content .box-info a .bx {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            font-size: 36px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #content .box-info a:nth-child(1) .bx {
            background: var(--light-blue);
            color: var(--blue);
        }

        #content .box-info a:nth-child(2) .bx {
            background: var(--light-yellow);
            color: var(--yellow);
        }

        #content .box-info a:nth-child(3) .bx {
            background: var(--light-orange);
            color: var(--orange);
        }

        #content .box-info a:nth-child(4) .bx {
            background: var(--light-blue);
            color: var(--blue);
        }

        #content .box-info a:nth-child(5) .bx {
            background: var(--light-green);
            color: var(--green);
        }

        #content .box-info a:nth-child(6) .bx {
            background: var(--light-orange);
            color: var(--orange);
        }

        #content .box-info a .text h3 {
            font-size: 24px;
            font-weight: 600;
            color: var(--dark);
        }

        #content .box-info a .text p {
            color: var(--dark);
        }

        .sidebar {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            transform: translateX(-100%);
            z-index: 999;
        }

        .sidebar.active {
            transform: translateX(0);
        }


        /* Responsive Styles */
        @media screen and (max-width: 768px) {
            .dashboard {
                flex-direction: column;
            }


            .toggle-btn {
                display: block;
            }

            .topbar {
                width: 100vw;
            }

            .topbar h1 {
                font-size: 18px;
                font-weight: 550;
            }

            .content {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="dashboard">
        <aside class="sidebar" id="sidebar">
            <h2>Dashboard</h2>
            <nav>
                <ul>
                    <li><a href="../">Home</a></li>
                    <li><a href="./">Dashboard</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="./profile.php">Profile</a></li>
                    <li><a href="../backend/logout.php">Logout</a></li>
                </ul>
            </nav>
        </aside>

        <div class="main">
            <header class="topbar">
                <button id="toggleBtn" class="toggle-btn">☰</button>
                <h1>Welcome, <?php echo $user_name; ?></h1>
            </header>

            <div id="content">

                <ul class="box-info">

                    <a href="#">
                        <i class='bx bxs-user-voice'></i>
                        <span class="text">
                            <h3>5</h3>
                            <p>Applied</p>
                        </span>
                    </a>

                    <a href="#">
                        <i class='bx bxs-group'></i>
                        <span class="text">
                            <h3>2</h3>
                            <p>Shortlisted</p>
                        </span>
                    </a>


                    <a href="#">
                        <i class='bx bx-chalkboard'></i>
                        <span class="text">
                            <h3>1</h3>
                            <p>Selected</p>
                        </span>
                    </a>

                    <a href="#">
                        <i class='bx bx-calendar-event'></i>
                        <span class="text">
                            <h3>0</h3>
                            <p>Completed</p>
                        </span>
                    </a>

                    <a href="#">
                        <i class='bx bxs-message-dots'></i>
                        <span class="text">
                            <h3>0</h3>
                            <p>Feedback</p>
                        </span>
                    </a>

                </ul>
            </div>

        </div>
    </div>

    <script>
        const toggleBtn = document.getElementById('toggleBtn');
        const sidebar = document.getElementById('sidebar');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });

    </script>
</body>

</html>