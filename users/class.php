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
    <title>Lecture Page</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: #f5f5f5;
        }

        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            margin-bottom: 30px;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .section {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
        }

        ul {
            padding-left: 20px;
        }

        input[type="file"],
        input[type="text"],
        textarea,
        button {
            width: 100%;
            margin-top: 10px;
            padding: 10px;
            font-size: 1rem;
        }

        button {
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>

    <!-- Video Section -->
    <div class="video-container">
        <iframe
            src="https://www.youtube.com/embed/e3lLKO1OHbM?modestbranding=1&rel=0&showinfo=0&controls=1&disablekb=1&fs=0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <!-- Assignment List Section -->
    <div class="section">
        <h2>Assignment List</h2>
        <ul>
            <li>Assignment 1: Introduction to Topic</li>
            <li>Assignment 2: Case Study Analysis</li>
            <li>Assignment 3: Practical Demo Submission</li>
        </ul>
    </div>

    <!-- Assignment Submission Section -->
    <div class="section">
        <h2>Submit Your Assignment</h2>
        <form id="assignmentForm">
            <label for="studentName"> <?php echo $user_name; ?></label>
            <input type="text" id="studentName" name="studentName">

            <label for="assignmentFile">Upload File:</label>
            <input type="file" id="assignmentFile" name="assignmentFile">

            <button type="submit">Submit Assignment</button>
        </form>
    </div>

    <!-- Doubt Asking Section -->
    <div class="section">
        <h2>Ask Your Doubt</h2>
        <form id="doubtForm">
            <label for="doubt">Your Question:</label>
            <textarea id="doubt" name="doubt" rows="4" required></textarea>
            <button type="submit">Submit Doubt</button>
        </form>
    </div>

    <script>
        document.getElementById("assignmentForm").addEventListener("submit", function (e) {
            e.preventDefault();
            const name = document.getElementById("studentName").value.trim();
            const file = document.getElementById("assignmentFile").files[0];

            if (!name || !file) {
                Swal.fire({
                    icon: "warning",
                    title: "Incomplete Submission",
                    text: "Please enter your name and upload a file."
                });
                return;
            }

            Swal.fire({
                icon: "success",
                title: "Assignment Submitted",
                text: "Your assignment has been submitted successfully!"
            });
        });

        document.getElementById("doubtForm").addEventListener("submit", function (e) {
            e.preventDefault();
            const doubt = document.getElementById("doubt").value.trim();

            if (!doubt) {
                Swal.fire({
                    icon: "error",
                    title: "Empty Doubt",
                    text: "Please type your question before submitting."
                });
                return;
            }

            Swal.fire({
                icon: "success",
                title: "Doubt Submitted",
                text: "Your question has been submitted. We'll get back to you soon."
            });

            document.getElementById("doubtForm").reset();
        });
    </script>

</body>

</html>