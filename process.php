<?php

session_start();

// Check whether the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Receive form data
    $fullname = trim($_POST['fullname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $dob = $_POST['dob'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $address = trim($_POST['address'] ?? '');
    $course = $_POST['course'] ?? '';

    // Server-side validation
    $errors = [];

    if (strlen($fullname) < 3) {
        $errors[] = "Invalid full name.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }

    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors[] = "Phone number must contain 10 digits.";
    }

    $birthDate = DateTime::createFromFormat('Y-m-d', $dob);

    if (!$birthDate || $birthDate->format('Y-m-d') !== $dob ||
        $birthDate >= new DateTime('today')) {
        $errors[] = "Invalid date of birth.";
    }

    if (!in_array($gender, ['Male', 'Female', 'Other'], true)) {
        $errors[] = "Invalid gender selection.";
    }

    if (strlen($address) < 5) {
        $errors[] = "Please enter a valid address.";
    }

    $allowedCourses = [
        'Computer Science',
        'Information Science',
        'Electronics',
        'Mechanical',
        'Civil'
    ];

    if (!in_array($course, $allowedCourses, true)) {
        $errors[] = "Invalid course selection.";
    }

    // Display errors if validation fails
    if (!empty($errors)) {
        echo "<h2>Registration Error</h2>";

        foreach ($errors as $error) {
            echo "<p>" . htmlspecialchars($error) . "</p>";
        }

        echo '<a href="index.html">Go Back</a>';
        exit;
    }

    // Store details in session
    $_SESSION['registration'] = [
        'fullname' => $fullname,
        'email' => $email,
        'phone' => $phone,
        'dob' => $dob,
        'gender' => $gender,
        'address' => $address,
        'course' => $course
    ];

    // Redirect to success page
    header("Location: success.php");
    exit;

} else {

    header("Location: index.html");
    exit;

}

?>