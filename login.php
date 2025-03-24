<?php
session_start();
include("geekdatabase.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GEEK</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.css">
</head>

<body class="login-page login-specific">
    <a href="homepage.php" class="back-link">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M19 12H5M12 19l-7-7 7-7" />
        </svg>
        Back to Home
    </a>

    <main class="login-container">
        <div class="login-box">
            <div class="login-header">
                <h1>GEEK</h1>
                <p>Welcome back!</p>
            </div>

            <form action="login.php" method="POST" class="login-form">
                <!-- Show error message if it exists -->
                <?php
                if (isset($_SESSION['error'])) {
                    echo '<div class="error-msg">' . $_SESSION['error'] . '</div>';
                    unset($_SESSION['error']); // Clear error after displaying
                }
                ?>

                <div class="form-group">
                    <input type="email" name="email" id="email" required>
                    <label for="email">Email</label>
                </div>

                <div class="form-group">
                    <input type="password" name="pass" id="password" required>
                    <label for="password">Password</label>
                </div>

                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" name="remember">
                        <span>Remember me</span>
                    </label>
                    <a href="forgot.html" class="forgot-link">Forgot Password?</a>
                </div>

                <button type="submit" class="submit-btn">Sign In</button>

                <div class="register-link">
                    Don't have an account? <a href="registration.php">Register</a>
                </div>
            </form>
        </div>
    </main>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim(strtolower($_POST['email'] ?? ''));
    $emailOrEmpNum = $_POST['email'] ?? ''; // Handle both email and employee num
    $pass = $_POST['pass'] ?? '';

    // Check if the email/employee number exists
    $check_sql = "SELECT * FROM registration WHERE email = ?";
    if ($stmt = $connection->prepare($check_sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if user exists
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Check if account status is 0
            if ($user['status'] === 0) {
                $_SESSION['error'] = "Your account is not activated. Please contact the administrator.";
                header("Location: login.php");
                exit();
            }
$emstatus = ["jo","permanent","contractual"];
            // Verify password
            if ($user['pass'] == $pass) {
                
                if($user['role'] == "head"){
                $_SESSION['username'] = $email;
                $_SESSION['id'] = $user['regi_id'];
                $regi_id = $user['regi_id'];
                header("Location: adminhead/head.php?id=".$regi_id); // Redirect to dashboard after successful login
                exit();
                } 

                    if($user['role'] == "employee"){
                        $_SESSION['username'] = $email;
                        $_SESSION['id'] = $user['regi_id'];
                        $regi_id = $user['regi_id'];
                        header("Location: employee/employee.php?id=".$regi_id); // Redirect to dashboard after successful login
                        exit();
                        } 
                            if($user['role'] == "hr"){
                                $_SESSION['username'] = $email;
                                $_SESSION['id'] = $user['regi_id'];
                                $regi_id = $user['regi_id'];
                                header("Location: hr/employee.php?id=".$regi_id); // Redirect to dashboard after successful login
                                exit();
                                } 
                                    if($user['role'] == "admin"){
                                        $_SESSION['username'] = $email;
                                        $_SESSION['id'] = $user['regi_id'];
                                        header("Location: admin/employee.php"); // Redirect to dashboard after successful login
                                        exit();
                                        } 
            } else {
                $_SESSION['error'] = "Invalid password.";
                header("Location: login.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "Email or Employee ID does not exist!";
            header("Location: login.php");
            exit();
        }
        $stmt->close();
    }
    $connection->close();
}
?>
