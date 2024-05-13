<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Edit</title>

    <link rel="stylesheet" href="about.css">
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
        <h2>About</h2>

        <div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div>
                    <h4>About Me!</h4>
                    <span>Introduction</span>
                    <textarea id="introduction" name="introduction" rows="10" cols="50" style="resize: none;"></textarea>
                </div>

                <div>
                    <h4>Technology Used</h4>
                    <span>Image:</span>
                    <input type="url" name="tech-image" id="tech-image"><br><br>
                </div>

                <div class="btn">
                    <input type="submit" value="Save">
                </div>
            </form>
        </div>
    </section>

</body>

</html>