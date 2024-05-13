<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Edit</title>

    <link rel="stylesheet" href="home.css">
</head>

<body>
    <nav>
        <div class="navigation">
            <a href="./home-admin.php" id="home-nav">
                Home
            </a>

            <a href="./about-admin.php" id="about-nav">
                About
            </a>

            <a href="" id="projects-nav">
                Projects
            </a>

            <a href="" id="experience-nav">
                Experience
            </a>

            <a href="" id="contacts-nav">
                Contact
            </a>
        </div>

        <a href="" id="logout">Logout</a>
    </nav>

    <section class="container">
        <h2>Home</h2>

        <div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <div class="home-ctn">
                    <h4>Name</h4>
                    <span>First Name:</span>
                    <input type="text" name="fname"> <br> <br>
                    <span>Last Name:</span>
                    <input type="text" name="lname">
                </div>

                <div class="home-ctn">
                    <h4>Socials</h4>
                    <span>LinkedIn:</span>
                    <input type="url" name="linkedin" id="linkedin"><br> <br>
                    <span>Facebook:</span>
                    <input type="url" name="facebook" id="facebook"><br> <br>
                    <span>Instagram:</span>
                    <input type="url" name="instagram" id="instagran"><br> <br>
                    <span>Github:</span>
                    <input type="url" name="github" id="github">
                </div>

                <div class="btn">
                    <input type="submit" value="Save">
                </div>
            </form>
        </div>
    </section>
</body>

</html>