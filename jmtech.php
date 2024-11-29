<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: darkgrey;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        p {
            line-height: 1.6;
            color: #666;
        }

        .profile-picture {
            display: block;
            margin: 0 auto;
            width: 250px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        ul li {
            margin-bottom: 10px;
        }

        ul li strong {
            font-weight: bold;
        }

        .company-section {
            margin-top: 40px;
            text-align: center;
        }

        .company-images {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .company-images img {
            width: 200px;
            margin: 0 10px;
            border-radius: 8px;
        }

        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: blue;
            z-index: 1000;
            padding: 15px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }

        nav ul li a:hover {
            color: #ccc;
        }

        #logout-btn,
        #go-back-btn {
            background-color:blue; /* Red background color */
            color: #fff; /* White text color */
            padding: 10px 20px; /* Padding */
            border-radius: 25px; /* Rounded corners */
            text-decoration: none; /* Remove underline for link */
            transition: background-color 0.3s; /* Smooth transition for background color */
            cursor: pointer; /* Cursor style */
        }

        #logout-btn:hover,
        #go-back-btn:hover {
            background-color: #cc0000; /* Darker red on hover */
        }

        /* Footer styling */
        #footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: lavender;
            text-align: center;
            padding: 0.1rem;
        }

        .footer p {
            justify-content: center;
        }

        .footer a {
            color: green;
            text-decoration: underline;
            font-weight: bold;
        }
    </style>
</head>
<body>

<nav>
    <ul>
        <li><a href="#about">About</a></li>
        <li><a href="#skills">Skills</a></li>
        <li><a href="#company">Company</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
   
</nav>
<br>
<div class="container">
    <img src="images/jmtlogo.png" alt="Profile Picture" class="profile-picture">
    <h1>Eng. Jooh <br>(ceo JMTech. Dev.)</h1>
    <p>I am a passionate individual with a keen interest in technology and innovation. I enjoy exploring new ideas and solving problems through creative thinking and collaboration.</p>
    <ul>
        <li><strong>Name:</strong>Eng. Jooh</li>
        <li><strong>Age:</strong> 28 yrs</li>
        <li><strong>Location:</strong> Nairobi, Kenya</li>
        <li><strong>Occupation:</strong> Software Engineer</li>
        <li><strong>Interests:</strong> Technology, Programming, Forex Trading</li>
    </ul>

    <img src="images/jmtlogo.png" alt="Company Image 1" style="float: right; margin-left: 10px;">

    <h2 id="skills">Proficient Skills</h2>
    <ul>
        <li><strong>Programming Languages:</strong> python</li>
        <li><strong>Frontend Technologies:</strong> HTML5, CSS3, JavaScript (ES6+)</li>
        <li><strong>Backend Technologies:</strong> python</li>
        <li><strong>Frameworks:</strong> Django</li>
    </ul>

    <h2 id="about">About Me</h2>
    <p>I have been working in the tech industry for over 7 years. Throughout my career, I have gained experience in developing web applications, designing databases, and implementing scalable solutions.
        <br> I am passionate about staying up-to-date with the latest technologies and continuously improving my skills.</p>

    <div class="company-section" id="company">
        <h2>Company Overview</h2>
        <p>Here are some pictures that describe our company:</p>
        <div class="company-images">
            <img src="images/jmtlogo.png" alt="Company Image 1">
            <img src="images/jmmt.jpg" alt="Company Image 2">
            <img src="images/jmtt.jpg" alt="Company Image 3">
        </div>
    </div>

    <h2 id="contact">Contact Us</h2>
    <p>If you have any questions or inquiries, feel free to reach out to us:</p>
    <ul>
        <li><strong>Email:</strong> info@jmtech.com</li>
        <li><strong>Phone:</strong> +254791302603</li>
        <li><strong>Address:</strong> Nairobi, Kenya</li>

         <!-- Logout button -->
    <a href="logout.php" id="logout-btn">Logout</a>
    <!-- Go back button -->
    <a href="#" onclick="history.go(-1);" id="go-back-btn">Go Back</a>


    </ul>

</div>
<br><br><br>
</body>
<footer id="footer">
    <div class="footer">
        <p><span>Company.<strong>All Rights Reserved.</strong>Designed By <a href="jmtech.php">JMTech</a></span></p>
    </div>
</footer>
</html>
