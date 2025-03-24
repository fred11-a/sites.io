<?php
session_start();
include("geekdatabase.php"); // Ensure this file connects to the database

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $firstName = $_POST['firstName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $middleName = $_POST['middleName'] ?? '';
    $employeeId = $_POST['employeeId'] ?? '';
    $department = $_POST['department'] ?? '';
    $employeestatus = $_POST['employeeStatus'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $filename = strtolower(basename($_FILES['photo']['name'])); // Ensures the filename is lowercase
       

    if (!empty($filename)){
        $_SESSION['ros'] = "File upload failed or filename is empty.";
        move_uploaded_file($_FILES['photo']['tmp_name'], 'employeephoto/'.$filename);	
    }

    if (empty($firstName) || empty($lastName) || empty($employeeId) || empty($department) || empty($email) || empty($password)) {
        $_SESSION['error'] = "All required fields must be filled!";
        header("Location: registration.php");
        exit();
    }

    // Check if the email or employee ID already exists
    $check_sql = "SELECT * FROM registration WHERE email = ? OR employeesnum = ?";
    if ($stmt = $connection->prepare($check_sql)) {
        $stmt->bind_param("ss", $email, $employeeId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['error'] = "Email or Employee ID already exists!";
            header("Location: registration.php");
            exit();
        }
        $stmt->close();
    }

    // Hash password
    $hashedPassword = $password; //password_hash($password, PASSWORD_BCRYPT);

    // Insert into the database
    $sql = "INSERT INTO registration (fname, lname, mname, employeesnum, department, employeestatus, email, pass, pic) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    if ($stmt = $connection->prepare($sql)) {
        $stmt->bind_param("sssssssss", $firstName, $lastName, $middleName, $employeeId, $department, $employeestatus,$email, $hashedPassword, $filename);
        if ($stmt->execute()) {
            $_SESSION['successs'] = "Registration successful!";
            header("Location: registration.php");
        } else {
            $_SESSION['errors'] = "Database error: " . $stmt->error;
            header("Location: registration.php");
        }
        $stmt->close();
    } else {
        $_SESSION['errors'] = "Database query failed!";
        header("Location: registration.php");
    }

    $connection->close();
}
?>
