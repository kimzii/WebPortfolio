<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Load data for home
$fname = $lname = $title = $coverimage = "";
$sql = "SELECT fname, lname, title, coverimage FROM home WHERE id = 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $fname = $row['fname'];
    $lname = $row['lname'];
    $title = $row['title'];
    $coverimage = $row['coverimage'];
  }
} else {
  echo "0 results";
}

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hello World!</title>

  <link rel="icon" type="image/x-icon" href="Resources/icon/KT.svg" />

  <link rel="stylesheet" href="stylesheet.css" />
  <link rel="stylesheet" href="responsiveness.css" />
</head>

<body>
  <nav>
    <div id="icon">
      <a href="./admin/login.php"><img src="Resources/icon/KT.svg" alt="icon" width="38px" /></a>
    </div>

    <div id="navigation">
      <a id="home-btn" href="#home"><img src="Resources/nav/home.svg" alt="" /><span>Home</span></a>

      <a id="about-btn" href="#about"><img src="Resources/nav/about.svg" alt="" /><span>About</span></a>

      <a id="about-btn" href=""><img src="Resources/nav/about.svg" alt="" /><span>Experience</span></a>

      <a id="projects-btn" href="#projects"><img src="Resources/nav/project.svg" alt="" /><span>Projects</span></a>

      <a id="contacts-btn" href="./Contact/contact.html"><img src="Resources/nav/call.png" alt="" width="24px" /><span>Contact</span></a>
    </div>
  </nav>

  <div id="home">
    <div id="content">
      <div id="intro">
        <div id="greet">
          <div class="line"></div>
          <p id="hello">HELLO</p>
          <div class="line"></div>
        </div>

        <div id="name-ctn">
          <p class="name">I'm </p>
          <p class="name" id="name"> <?php echo $fname . " " . $lname ?></p>
        </div>

        <p id="proffession">A Web Developer, Web Designer, and an Artist</p>

        <button id="download-cv">DOWNLOAD CV</button>
      </div>

      <div id="content-image">
        <?php if (!empty($coverimage)) : ?>
          <img id="coverImage" src="data:image/jpeg;base64,<?php echo base64_encode($coverimage); ?>" alt="Cover Image" style="height: 360px;">
        <?php else : ?>
          <p>No cover image uploaded.</p>
        <?php endif; ?>
      </div>
    </div>

    <div id="socials">
      <a href="www.linkedin.com/in/kimzietorres" target="_blank">
        <img src="Resources/social/linkedin.svg" alt="linkedin" />
      </a>

      <a href="https://web.facebook.com/kreidiprinz/" target="_blank">
        <img src="Resources/social/facebook.svg" alt="facebook" />
      </a>

      <a href="https://www.instagram.com/kimzii_io/" target="_blank">
        <img src="Resources/social/instagram.svg" alt="instagram" />
      </a>

      <a href="https://github.com/kimzii" target="_blank">
        <img src="Resources/social/github.svg" alt="github" width="24px" />
      </a>
    </div>
    <!--end of socials-->
  </div>
  <!--end of home-->

  <div id="about">
    <h2>ABOUT ME</h2>

    <section id="about-introduction">
      <img src="Resources/z.jpg" alt="Kimzie" />

      <div>
        <p>Hello World!</p>
        <p>
          I am Kimzie T. Torres a BSIT student from the University of
          Southeastern Philippines. With a passion for crafting innovative
          digital solutions, I am on a journey to become a proficient web
          developer. Join me as I embark on this exciting path of learning and
          exploration in the realm of web development. Welcome to my web
          portfolio!
        </p>
      </div>
    </section>

    <h4>TECH STACK</h4>

    <section id="tech-ctn">
      <div id="Java" class="tech-img">
        <img src="Resources/tech/java.svg" alt="Java" />
      </div>

      <div id="Html" class="tech-img">
        <img src="Resources/tech/html.svg" alt="Html" />
      </div>

      <div id="Css" class="tech-img">
        <img src="Resources/tech/css.svg" alt="Css" />
      </div>

      <div id="Tailwind" class="tech-img">
        <img src="Resources/tech/tailwind.svg" alt="tailwind" />
      </div>

      <div id="JavaScript" class="tech-img">
        <img src="Resources/tech/js.svg" alt="JavaScript" />
      </div>

      <div id="Git" class="tech-img">
        <img src="Resources/tech/git.svg" alt="Git" />
      </div>

      <div id="Github" class="tech-img">
        <img src="Resources/tech/github.svg" alt="Github" width="48px" />
      </div>

      <div id="Figma" class="tech-img">
        <img src="Resources/tech/figma.svg" alt="Figma" />
      </div>
    </section>
  </div>
  <!--end of about-->

  <div id="projects">
    <h2>PROJECTS</h2>

    <div id="project-ctn">
      <div id="RockPaperScissor">
        <div class="project-image">
          <button class="visit">
            <a href="https://kimzii.github.io/RockPaperScissor/" target="_blank">Visit Project</a>
          </button>
        </div>

        <div class="project-details">
          <div class="vl">
            <span>&lt;div&gt;</span>
            <div class="line"></div>
            <span>&lt;/div&gt;</span>
          </div>

          <div class="details">
            <h4>Rock Paper Scissor ft. Pokemon</h4>
            <p>
              Welcome to Rock, Paper, Scissors: Pokémon Edition! Enter a world
              where the classic game meets the Pokémon universe. Choose your
              moves wisely and battle to become the ultimate champion. Let the
              games begin!
            </p>

            <section class="tech-used">
              <span>HTML</span>
              <span>CSS</span>
              <span>JavaScript</span>
            </section>

            <button class="visit-repo">
              <a href="https://github.com/kimzii/RockPaperScissor" target="_blank"><img src="Resources/projects/github-repo.svg" width="28px" />
                <span>Visit Github Repository</span></a>
            </button>
          </div>
        </div>
      </div>

      <div id="Riffrant">
        <div class="project-image">
          <button class="visit">
            <a href="https://riffrant.vercel.app/" target="_blank">Visit Project</a>
          </button>
        </div>

        <div class="project-details">
          <div class="vl">
            <span>&lt;div&gt;</span>
            <div class="line"></div>
            <span>&lt;/div&gt;</span>
          </div>

          <div class="details">
            <h4>Riffrant</h4>
            <p>
              Join the conversation, express your thoughts, and build
              connections in a space designed for the joy of sharing—your very
              own hub for daily dialogue and meaningful interactions.
            </p>

            <section class="tech-used">
              <span>HTML</span>
              <span>CSS</span>
              <span>Next.Js</span>
              <span>TypeScript</span>
              <span>MongoDB</span>
              <span>React</span>
              <span>Tailwind</span>
              <span>Springboot</span>
            </section>

            <button class="visit-repo">
              <a href="https://github.com/roiceee/riffrant" target="_blank">
                <img src="Resources/projects/github-repo.svg" width="28px" />

                <span>Visit Github Repository</span>
              </a>
            </button>
          </div>
        </div>
      </div>

      <div id="ProverbsWebApp">
        <div class="project-image">
          <button class="visit">
            <a href="https://kimzii.github.io/ProverbsWebApp/" target="_blank">Visit Project</a>
          </button>
        </div>

        <div class="project-details">
          <div class="vl">
            <span>&lt;div&gt;</span>
            <div class="line"></div>
            <span>&lt;/div&gt;</span>
          </div>

          <div class="details">
            <h4>Proverbs Web App</h4>
            <p>
              Whether you seek a daily dose of inspiration or timeless advice,
              our web app is here to illuminate your path with the wisdom of
              the ages. Discover, share, and enrich your life with Proverbial
              Wisdom today!
            </p>

            <section class="tech-used">
              <span>HTML</span>
              <span>CSS</span>
              <span>JavaScript</span>
            </section>

            <button class="visit-repo">
              <a href="https://github.com/kimzii/ProverbsWebApp" target="_blank">
                <img src="Resources/projects/github-repo.svg" width="28px" />

                <span>Visit Github Repository</span>
              </a>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!--end of project-ctn-->
  </div>
  <!--end of projects-->

  <footer>
    <p>Copyright @2024 | Designed by Kimzii</p>
  </footer>
</body>

</html>