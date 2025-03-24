<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEEK - Government Employees Enrichment Korner</title>
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> -->
    <style>
        .features {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .feature {
            background: #fff;
            padding: 2rem;
            margin-bottom: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .feature h2 {
            color: #333;
            margin-bottom: 1.5rem;
            border-bottom: 2px solid #ff6b6b;
            padding-bottom: 0.5rem;
        }

        .feature h3 {
            color: #444;
            margin: 1.5rem 0 1rem;
        }

        .feature p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .feature ul, .feature ol {
            margin-left: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .feature li {
            margin-bottom: 1rem;
            color: #666;
            line-height: 1.6;
        }

        .feature ol > li > h3 {
            margin-top: 0;
            color: #ff6b6b;
        }

        @media (max-width: 768px) {
            .features {
                padding: 1rem;
            }

            .feature {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">GEEK</div>
        <ul class="nav-links">
            <li><a href="homepage.php" class="active">Home</a></li>
            <li><a href="#features">Features</a></li>
            <li><a href="login.php" class="login-btn">Login</a></li>
            <li><a href="registration.php" class="register-btn">Register</a></li>
        </ul>
        <div class="menu-btn">
            <span></span>
            <span></span>
        </div>
    </nav>

    <main class="hero">
        <div class="hero-content">
            <h1>Empowering.<br><span>Government.</span><br>Excellence.</h1>
            <a href="registration.php" class="cta-button">Get Started</a>
        </div>
    </main>

    <section id="features" class="features">
        <div class="features">
            <div class="feature">
                <h2>CONTACT INFORMATION</h2>
                <h3>City Human Resource Management Office</h3>
                <p>2nd Floor, Left Wing, New Government Center, Barangay Dulong Bayan, City of San Jose del Monte, Bulacan</p>
                <p> 044 9197370 to 79 Local 2121</p>
                <p> 044 9197380 to 89 Local 2121</p>
                <p> chrmosjdm@gmail.com</p>
                <p> City of San Jose del Monte – CHRMO</p>
                
                <h3>Office Hours</h3>
                <p>Monday to Friday<br>8:00 AM – 5:00 PM</p>
            </div>

            <div class="feature">
                <h2>ABOUT US</h2>
                <h3>MANDATE:</h3>
                <p>"Establish and maintain a sound personnel program for the local government unit designed to promote career development and uphold the merit principle in the local government service." (Article 10 section 480 (b) (2) (ii), R.A. 7160 of the Local Government Code of 1991)</p>
                
                <h3>VISION</h3>
                <p>We envision the City Human Resource Management Department as the primary advocate of professionalism in public service adhering in the principle of merit and fitness, fostering harmonious relationship between management and rank and file employees for the welfare of every employee through the provision of efficient, effective and quality service, aligned with the City's vision of promoting the rule of transparency, caring and accountable leadership under the guidance of the Almighty God.</p>
                
                <h3>MISSION</h3>
                <ul>
                    <li>Foster harmonious relationship between management and rank and file employees through a sustainable and operational collective negotiation agreement</li>
                    <li>Provide efficient, effective and highly responsive Human Resource Services</li>
                    <li>Develop and retain competent people to become assets to the organization</li>
                </ul>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div class="footer-left">
                <span class="logo">GEEK</span>
                <p>&copy; 2025 Government Employees Enrichment Korner</p>
            </div>
            <div class="footer-right">
                <a href="login.php">Login</a>
                <a href="registration.php">Register</a>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
