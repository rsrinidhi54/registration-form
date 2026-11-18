<?php

session_start();

if (!isset($_SESSION['registration'])) {
    header("Location: index.html");
    exit;
}

$data = $_SESSION['registration'];

function safe($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registration Successful</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #dbeafe;
            padding: 30px;
        }

        .success-container {
            max-width: 600px;
            margin: 30px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: green;
        }

        .details {
            margin-top: 25px;
        }

        .details p {
            padding: 12px;
            background: #f1f5f9;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            background: #3156a3;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #203d79;
        }

        @media print {
            button {
                display: none;
            }

            body {
                background: white;
            }
        }

    </style>

</head>

<body>

    <div class="success-container">

        <h1>Registration Successful!</h1>

        <p style="text-align:center;">
            Your application has been submitted successfully.
        </p>

        <div class="details">

            <p><strong>Full Name:</strong>
                <?= safe($data['fullname']) ?></p>

            <p><strong>Email:</strong>
                <?= safe($data['email']) ?></p>

            <p><strong>Phone:</strong>
                <?= safe($data['phone']) ?></p>

            <p><strong>Date of Birth:</strong>
                <?= safe($data['dob']) ?></p>

            <p><strong>Gender:</strong>
                <?= safe($data['gender']) ?></p>

            <p><strong>Address:</strong>
                <?= nl2br(safe($data['address'])) ?></p>

            <p><strong>Course:</strong>
                <?= safe($data['course']) ?></p>

        </div>

        <button onclick="window.print()">Print Registration</button>

        <button onclick="window.location.href='index.html'">
            New Registration
        </button>

    </div>

</body>

</html>