<?php
session_start();

include '../backend/config.php';

// Assuming user is logged in and their ID is stored in $_SESSION['user_id']
$user_id = $_SESSION['user_id']; // Fallback to 1 for testing

$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $semester = $_POST["semester"];
    $stream = $_POST["stream"];
    $college = $_POST["college"];
    $state = $_POST["state"];
    $district = $_POST["district"];
    $pincode = $_POST["pincode"];
    $address = $_POST["address"];
    $cgpa = $_POST["cgpa"];
    $why_join = $_POST["why_join"];

    $resume = $_FILES["resume"]["name"];
    $dp = $_FILES["dp"]["name"];

    $resume_path = "uploads/" . basename($resume);
    $dp_path = !empty($dp) ? "uploads/" . basename($dp) : $user["dp"];

    move_uploaded_file($_FILES["resume"]["tmp_name"], $resume_path);
    if (!empty($dp)) {
        move_uploaded_file($_FILES["dp"]["tmp_name"], $dp_path);
    }

    $sql_update = "UPDATE users SET semester=?, stream=?, college=?, state=?, district=?, pincode=?, address=?, cgpa=?, resume=?, dp=?, why_join=? WHERE id=?";
    $stmt = $conn->prepare($sql_update);
    $stmt->bind_param("sssssssssssi", $semester, $stream, $college, $state, $district, $pincode, $address, $cgpa, $resume_path, $dp_path, $why_join, $user_id);
    $stmt->execute();

    echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Form Submitted',
            text: 'Your application was saved successfully!'
        });

        window.reload();
    </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        :root {
            --light: #ffffff;
            --light-blue: #e0f0ff;
            --blue: #3498db;
            --green: #2ecc71;
            --dark: #2c3e50;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 220px;
            background-color: var(--dark);
            color: white;
            padding: 20px;
            transition: transform 0.3s ease;
            position: fixed;
            height: 100%;
            left: 0;
            top: 0;
            z-index: 1000;
            transform: translateX(-100%);
        }

        .sidebar.active {
            transform: translateX(0);
        }

        .sidebar h2 {
            font-size: 24px;
            margin-bottom: 20px;
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
            background-color: var(--dark);
            color: white;
            padding: 15px 20px;
            display: flex;
            flex-direction: row-reverse;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 900;
        }

        .topbar h1 {
            font-size: 20px;
        }

        .toggle-btn {
            font-size: 28px;
            background: none;
            color: white;
            border: none;
            cursor: pointer;
            display: block;
        }

        #content {
            padding: 30px;
        }

        .form-container {
            max-width: 900px;
            margin: auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        input[type="submit"] {
            background: var(--green);
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            transition: background 0.3s ease;
        }

        input[type="submit"]:hover {
            background: #27ae60;
        }


        @media screen and (max-width: 768px) {
            .dashboard {
                flex-direction: column;
            }

            .main {
                margin-left: 0;
            }

            .sidebar {
                position: fixed;
            }

            #content {
                padding: 10px;
            }

            .form-container {
                padding: 10px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .topbar h1 {
                font-size: 18px;
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
                <h1>Welcome, <?= htmlspecialchars($user['name']) ?></h1>
            </header>

            <div id="content">

                <div class="form-container">

                    <h2>User's detail</h2>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-grid">

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" disabled value="<?= htmlspecialchars($user['name']) ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" disabled value="<?= htmlspecialchars($user['email']) ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" disabled value="<?= htmlspecialchars($user['phone']) ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Semester</label>
                                <select name="semester" required>
                                    <option value="">Select Semester</option>
                                    <option value="3rd" <?= ($user["semester"] == "3rd") ? "selected" : "" ?>>3rd</option>
                                    <option value="5th" <?= ($user["semester"] == "5th") ? "selected" : "" ?>>5th</option>
                                    <option value="7th" <?= ($user["semester"] == "7th") ? "selected" : "" ?>>7th</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Stream</label>
                                <select name="stream" required>
                                    <option value="">Select Stream</option>
                                    <option value="CSE" <?= ($user["stream"] == "CSE") ? "selected" : "" ?>>CSE</option>
                                    <option value="ECE" <?= ($user["stream"] == "ECE") ? "selected" : "" ?>>ECE</option>
                                    <option value="EEE" <?= ($user["stream"] == "EEE") ? "selected" : "" ?>>EEE</option>
                                    <option value="ME" <?= ($user["stream"] == "ME") ? "selected" : "" ?>>ME</option>
                                    <option value="CE" <?= ($user["stream"] == "CE") ? "selected" : "" ?>>CE</option>
                                    <option value="Other" <?= ($user["stream"] == "Other") ? "selected" : "" ?>>Other
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>College Name</label>
                                <input type="text" name="college" value="<?= htmlspecialchars($user['college']) ?>"
                                    required>
                            </div>

                            <div class="form-group">
                                <label>State</label>
                                <input type="text" name="state" value="<?= htmlspecialchars($user['state']) ?>"
                                    required>
                            </div>

                            <div class="form-group">
                                <label>District</label>
                                <input type="text" name="district" value="<?= htmlspecialchars($user['district']) ?>"
                                    required>
                            </div>

                            <div class="form-group">
                                <label>Pin Code</label>
                                <input type="number" name="pincode" maxlength="6"
                                    value="<?= htmlspecialchars($user['pincode']) ?>" required>
                            </div>

                            <div class="form-group full-width">
                                <label>Address</label>
                                <textarea name="address" required><?= htmlspecialchars($user['address']) ?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Current CGPA</label>
                                <input type="number" step="0.01" name="cgpa"
                                    value="<?= htmlspecialchars($user['cgpa']) ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Resume (PDF)</label>

                                <?php
                                if (!empty($user['resume']) && file_exists($user['resume'])) {
                                    echo "<p>File already uploaded: <a href='" . htmlspecialchars($user['resume']) . "' target='_blank'>View Resume</a></p>";
                                } else {
                                    echo "<p style='color:red;'>No file exists</p>";
                                }
                                ?>

                                <input type="file" name="resume" accept=".pdf">
                            </div>


                            <div class="form-group full-width">
                                <label>Profile Picture (Optional)</label>
                                <input type="file" name="dp" accept="image/*">
                            </div>

                            <div class="form-group full-width">
                                <label>Why do you want to join?</label>
                                <textarea name="why_join" required><?= htmlspecialchars($user['why_join']) ?></textarea>
                            </div>

                            <div class="form-group full-width">
                                <input type="submit" value="Submit Application">
                            </div>
                        </div>
                </div>
                </form>
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