<?php 
include("geekdatabase.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - GEEK</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="modalpopup.css">

    <style>
        .photo-upload-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .photo-preview {
            width: 150px;
            height: 150px;
            margin: 0 auto 15px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid #e0e0e0;
        }

        .photo-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .photo-upload-btn {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .photo-upload-btn:hover {
            background-color: #45a049;
        }

        .photo-requirements {
            color: #666;
            font-size: 12px;
            margin-top: 8px;
        }
    </style>
</head>
<body class="login-page">
<!-- <div id="modals">
        <div id="modal-content">
            <h3>✅ Acknowledgment Successful!</h3>
            <p>The research document has been acknowledged.</p>
        </div>
    </div> -->
    <a href="homepage.php" class="back-link">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M19 12H5M12 19l-7-7 7-7"/>
        </svg>
        Back to Home
    </a>

    <main class="login-container">
        <div class="login-box">
            <div class="login-header">
                <h1>GEEK</h1>
                <p>Create your employee account</p>
            </div>


            <form action="insert.php" method="POST" class="login-form" id="registrationForm" enctype="multipart/form-data" novalidate>
    <div class="form-group">
        <input type="text" name="firstName" id="firstName" required>
        <label for="firstName">First Name</label>
    </div>

    <div class="form-group">
        <input type="text" name="lastName" id="lastName" required>
        <label for="lastName">Last Name</label>
    </div>

    <div class="form-group">
        <input type="text" name="middleName" id="middleName">
        <label for="middleName">Middle Name (Optional)</label>
    </div>

    <div class="form-group">
        <input type="text" name="extensionName" id="extensionName">
        <label for="extensionName">Extension Name (Optional)</label>
    </div>

    <div class="form-group">
        <input type="text" name="employeeId" id="employeeId" required>
        <label for="employeeId">Employee ID</label>
    </div>

    <div class="form-group">
        <select name="department" id="department" required>
            <option value="ocm">Office of the City Mayor (OCM)</option>
            <option value="oca">Office of the City Administrator (OCA)</option>
            <option value="oaca">Office of the Assistant City Administrator (OACA)</option>
            <!-- Add other departments -->
        </select>
        <label for="department">Department</label>
    </div>

    <div class="form-group">
        <select name="employeeStatus" id="employeeStatus" required>
            <option value="permanent">Permanent Employee</option>
            <option value="contractual">Contractual Employee</option>
            <option value="jo">Job Order</option>
        </select>
        <label for="employeeStatus">Employment Status</label>
    </div>

    <div class="form-group">
        <input type="email" name="email" id="email" required>
        <label for="email">Work Email</label>
    </div>

    <div class="form-group">
        <input type="password" name="password" id="password" required>
        <label for="password">Password</label>
    </div>

    <div class="form-group">
        <input type="password" name="confirm-password" id="confirm-password" required>
        <label for="confirm-password">Confirm Password</label>
    </div>

    <div class="form-group">
        <input type="file" name="photo" id="photo">
        <label for="photo">Profile Photo (Optional)</label>
    </div>

    <div class="form-options">
        <label class="remember-me">
            <input type="checkbox" name="terms" required>
            <span>I agree to the Terms of Service and Privacy Policy</span>
        </label>
    </div>

    <button type="submit" name="submit">Create Account</button>

    <div class="register-link">
        Already have an account? <a href="login.php">Sign In</a>
    </div>
</form>
        </div>
      
<!-- 
    <script>
        // Show modal automatically after page load
        window.onload = function() {
            document.getElementById("modal").style.display = "block";
            
            // Hide modal after 3 seconds
            setTimeout(function() {
                document.getElementById("modal").style.display = "none";
            }, 3000);
        };
    </script> -->


    </main>

    <!-- <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('registrationForm');
            const photoInput = document.getElementById('photoInput');
            const photoPreview = document.getElementById('photoPreview');
            const uploadPhotoBtn = document.getElementById('uploadPhotoBtn');

            // Handle photo upload button click
            uploadPhotoBtn.addEventListener('click', () => {
                photoInput.click();
            });

            // Handle photo preview
            photoInput.addEventListener('change', (e) => {
                const file = e.target.files[0];
                if (file) {
                    // Validate file type
                    if (!file.type.startsWith('image/')) {
                        alert('Please upload an image file');
                        return;
                    }

                    // Validate file size (5MB)
                    if (file.size > 5 * 1024 * 1024) {
                        alert('File size should not exceed 5MB');
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = (e) => {
                        photoPreview.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
            
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                const submitBtn = form.querySelector('.submit-btn');
                
                // Basic validation
                const requiredFields = form.querySelectorAll('input[required], select[required]');
                let isValid = true;
                
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        field.parentElement.classList.add('error');
                        isValid = false;
                    } else {
                        field.parentElement.classList.remove('error');
                    }
                });

                // Validate photo upload
                if (!photoInput.files[0]) {
                    alert('Please upload a profile photo');
                    isValid = false;
                    return;
                }

                // Password validation
                const password = document.getElementById('password').value;
                const confirmPassword = document.getElementById('confirm-password').value;
                
                if (password !== confirmPassword) {
                    document.getElementById('confirm-password').parentElement.classList.add('error');
                    isValid = false;
                }

                if (!isValid) return;

                try {
                    submitBtn.textContent = 'Creating Account...';
                    submitBtn.disabled = true;

                    // Create FormData object to handle file upload
                    const formData = new FormData();
                    formData.append('photo', photoInput.files[0]);
                    formData.append('firstName', document.getElementById('firstName').value.trim());
                    formData.append('lastName', document.getElementById('lastName').value.trim());
                    formData.append('middleName', document.getElementById('middleName').value.trim());
                    formData.append('extensionName', document.getElementById('extensionName').value.trim());
                    formData.append('employeeId', document.getElementById('employeeId').value.trim());
                    formData.append('department', document.getElementById('department').value);
                    formData.append('employeeStatus', document.getElementById('employeeStatus').value);
                    formData.append('email', document.getElementById('email').value.trim());
                    formData.append('password', password);

                    // Send data to server
                    const response = await fetch('insert.php', {
                        method: 'POST',
                        body: formData // Changed to send FormData instead of JSON
                    });

                    const result = await response.json();

                    if (result.success) {
                        // Show success message
                        const successMessage = document.createElement('div');
                        successMessage.className = 'alert success';
                        successMessage.textContent = 'Registration successful! Redirecting to login...';
                        form.insertBefore(successMessage, submitBtn);

                        // Redirect to login page after 2 seconds
                        setTimeout(() => {
                            window.location.href = 'login.html';
                        }, 2000);
                    } else {
                        throw new Error(result.message);
                    }
                } catch (error) {
                    submitBtn.textContent = 'Create Account';
                    submitBtn.disabled = false;

                    // Show error message
                    const errorMessage = document.createElement('div');
                    errorMessage.className = 'alert error';
                    errorMessage.textContent = error.message || 'Registration failed. Please try again.';
                    form.insertBefore(errorMessage, submitBtn);

                    // Remove error message after 5 seconds
                    setTimeout(() => {
                        errorMessage.remove();
                    }, 5000);
                }
            });

            // Remove error state on input
            form.querySelectorAll('input, select').forEach(input => {
                input.addEventListener('input', function() {
                    this.parentElement.classList.remove('error');
                });
            });
        });
    </script> -->
</body>
</html>
