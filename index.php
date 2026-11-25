<?php
session_start();
$loggedIn = isset($_SESSION['username']);
$username = $loggedIn ? $_SESSION['username'] : '';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Homepage of UNCP-ACM Student Chapter </title>

        <!-- Default stylesheet -->
        <link id="theme-style" rel="stylesheet" type="text/css" href="theme1.css">
    </head>

    <body>
    <div class="grid-container">
        <header>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQUq5lzuW7OCp0SWXleBXEgPjc93B0S-B50WWEu3Rom3QposT2xWfDwi60&s=10" 
            style="float: left;" width="60" height="70" alt="Icon displaying the text 'UNC Pembroke'"> <!--Image was found on google-->
            <h1 style="text-align: center;"> UNCP-ACM Student Chapter </h1>

            <!-- Theme Toggle Button -->
             <div style="text-align: right; margin-top: 10px;">
                <button id="themeToggle" onclick="toggleTheme()"
                        style="padding: 6px 14px; cursor: pointer; font-size: 14px; 
                            border-radius: 4px;">
                        Switch to Dark Mode
                </button>
             </div>
        </header>

    <div class="navBar" style=" background: #333;">
        <!-- Navigation Bar -->
        <nav>
            <ul>
                <li><a href="https://www.uncp.edu/" target="_blank">UNCP</a></li>
                <li><a href="https://www.uncp.edu/academics/colleges-and-schools/college-of-arts-and-sciences/mathematics-and-computer-science/index.html" \
                    target="_blank">Computer Science</a></li>
                <li><a href="index.php">UNCP ACM Student Chapter</a></li>
                <li style="float: right;"><a href="https://www.linkedin.com/showcase/hackuncp/">Programming Competition</a></li>
            </ul>
        </nav>
    </div>

    <div style="text-align: center;" class="leftTopBox">
        <p><img src="https://www.uncp.edu/_images/Hackathon1_.jpg" width="375" height="281" alt="Collection of people 
            standing around a table and a laptop discussing. Image found on google from UNCP Computer Science Degree page"></p> 
        <!--Image was found on google-->
    </div>

    <div style="text-align: center;" class="midBox">
        <p><img src="https://www.uncp.edu/_images/group-of-students-in-gear.jpg" width="450" height="325" alt="Five UNCP students 
            (3 guys and two girls) standing together for a photo in front of the library on campus of UNCP. Image found on google from 
            UNCP Visit Campus page"></p> <!--Image was found on google-->
        <h2 style="margin-top: 3em; text-align: left;">Soccer at Pembroke</h2>
        <iframe style="width: 100%; height: 365px;" src="https://www.youtube.com/embed/aUFjHWgRoTs" 
            title="Men&#39;s Soccer vs  Belmont Abbey - Highlights" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            referrerpolicy="strict-origin-when-cross-origin" 
            allowfullscreen>
        </iframe>
    </div>

    <div class="rightTopBox">
        <h2> Member Area</h2>
        <?php if ($loggedIn): ?>
            <p style="margin-top: 1.5em;">Welcome, <strong><?php echo htmlspecialchars($username); ?></strong>!</p>
            <p><a href="memberInfoSalt.php">View My Information</a></p>
            <p><a href="logout.php">Logout</a></p>
        <?php else: ?>
            <p style="margin-top: 1.5em;"><a href="registerSalt.php">New Members - Register Here</a></p>
            <form action="loginSalt.php" method="post" style="margin-top: 1em;">
                <p>
                    <label>Username<br>
                        <input name="uName" type="text" required style="width: 90%;">
                    </label>
                </p>
                <p>
                    <label>Password<br>
                        <input name="pw" type="password" minlength="6" required style="width: 90%;">
                    </label>
                </p>
                <button type="submit" name="login">Login</button>
            </form>
            <p style="margin-top: 1em; font-size: 0.9em;">
                <a href="loginSalt.html">Full login page</a>
            </p>
        <?php endif; ?>
        
    </div>

    <div class="leftBottomBox">
        <h2> Association for Computing Machinery - ACM </h2>
        <p style="margin-top: 2em;">More information on the <a href="https://www.uncp.edu/campus-life/clubs-and-student-involvement/find-clubs-and-orgs/index.html">UNCP club</a></p>
        <p style="margin-top: 2em;">ACM is widely recognized as the premier membership organization for computing professionals, 
            delivering resources that advance computing as a science and a profession, enables professional development, and promote policies 
            and research that benefit society. The purpose of the UNCG chapter is to promote an increased knowledge in computing and its 
            applications, and to promote a means of communication between persons having interest in computing.</p>
    </div>
    <div class="rightMidBox">
        <h2> Featured News </h2>
        <p style="margin-top: 2em;"><a href="https://www.uncp.edu/academics/academic-support-and-resources/center-for-student-success/summer-bridge.html">ACM outreach In K-12</a></p>
        <p><a href="https://www.instagram.com/uncp_acm/">ACM is On Instagram</a></p>
        <p><a href="https://www.linkedin.com/in/uncp-association-for-computing-machinery-789132396">ACM is On Linkedin</a></p>
        <p>Programming Competition is open. Contact ACM Hack the UNCP-Bank website and find the secret code.</p>
    </div>
    <div style="text-align: center;" class="rightBottomBox" >
        <p><img src="https://media.licdn.com/dms/image/v2/C4E0BAQHmhfTYf-PSPA/company-logo_200_200/company-logo_200_200/0/1672756106986/association_for_computing_machinery_logo?e=2147483647&v=beta&t=bnRqczk266JKT6qZjkf_dZ9SrULKhdi2sId3EnIDcQI" 
            width="190" height="200" alt="Association for Computing Machinery logo. Found on google from ACM Linkedin page"></p> <!--Image was found on google-->
    </div>

    <footer style="text-align: center;">
        <p><a href="https://uncp.edu/">Home</a> | 
            <a href="https://www.uncp.edu/about/administration/policies-procedures-reports/legal-copyright-privacy.html">Terms of Use</a> | 
            <a href="https://www.uncp.edu/academics/colleges-and-schools/college-of-arts-and-sciences/mathematics-and-computer-science/index.html">
                Contact Us</a></p>
        <p> PEMBROKE - NC &#8226; (970) 521- 6000 &#8226; <br>
        <span style="color:blue"> Copyright &copy; 2016 UNCP ACM </span>All Rights Reserved </p>
    </footer>
    </div>

    <script>
        //Update the button text based on current theme
        function updateButtonText() {
            const current = localStorage.getItem('acm-theme') || 'theme1.css';
            const btn = document.getElementById('themeToggle');
            if (btn) {
                btn.textContext = (current === 'theme1.css') ? 'Switch to Dark Mode' : 'Switch to Light Mode';
            }
        }

        //Toggle between the two themes
        function toggleTheme() {
            const link = document.getElementById('theme-style');
            const current = localStorage.getItem('acm-theme') || 'theme1.css';
            if (current === 'theme1.css') {
                link.href = 'theme2.css';
                localStorage.setItem('acm-theme', 'theme2.css');
            } else {
                link.href = 'theme1.css';
                localStorage.setItem('acm-theme', 'theme1.css');
            }
            updateButtonText();
        }

        // Run when the page finishes loading
        window.addEventListener('load', updateButtonText);
    </script>
    </body>
</html>