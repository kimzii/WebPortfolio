<?php
include './handlers/connection.php';
include './handlers/homedata.php';
include './handlers/aboutdata.php';
include './handlers/projectdata.php';
include './handlers/experiencedata.php';

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="./admin.css">

</head>

<body>
    <nav>
        <div class="navigation">
            <a href="#" id="home-nav" onclick="showForm('home-form')">Home</a>
            <a href="#" id="about-nav" onclick="showForm('about-form')">About</a>
            <a href="#" id="projects-nav" onclick="showForm('projects-form')">Projects</a>
            <a href="#" id="experience-nav" onclick="showForm('experience-form')">Experience</a>
        </div>
        <a href="#" id="logout">Logout</a>
    </nav>

    <!-- container for pages -->
    <section class="page-ctn">
        <div id="home-form" class="form-container">
            <h1>Home</h1>
            <div class="container">
                <h2>Name</h2>
                <p><span class="bold">First Name: </span><?php echo $fname; ?></p>
                <p><span class="bold">Last Name: </span><?php echo $lname; ?></p>
                <p><span class="bold">Title: </span><?php echo $title; ?></p>
                <button class="edit-button" onclick="showModal('modal-home')">Edit</button>
            </div>

            <div class="container">
                <h2>Cover Image</h2>
                <?php if (!empty($coverimage)) : ?>
                    <img id="coverImage" src="data:image/jpeg;base64,<?php echo base64_encode($coverimage); ?>" alt="Cover Image" style="width: 200px; height: auto;">
                <?php else : ?>
                    <p>No cover image uploaded.</p>
                <?php endif; ?>
                <button class="edit-button" onclick="showModal('modal-cover')">Edit</button>
            </div>

            <div class="container">
                <h2>Links</h2>
                <p><span class="bold">Linkedin: </span><?php echo $linkedinlink; ?></p>
                <p><span class="bold">Facebook: </span><?php echo $facebooklink; ?></p>
                <p><span class="bold">Instagram: </span><?php echo $instagramlink; ?></p>
                <p><span class="bold">Github: </span><?php echo $githublink; ?></p>
                <button class="edit-button" onclick="showModal('modal-links')">Edit</button>
            </div>
        </div>

        <div id="about-form" class="form-container">
            <h1>About Me</h1>

            <div class="container">
                <h2>Profile Image</h2>
                <?php if (!empty($coverimage)) : ?>
                    <img id="aboutImage" src="data:image/jpeg;base64,<?php echo base64_encode($aboutimage); ?>" alt="Profile Image" style="width: 200px; height: auto;">
                <?php else : ?>
                    <p>No cover image uploaded.</p>
                <?php endif; ?>
                <button class="edit-button" onclick="showModal('modal-profileimage')">Edit</button>
            </div>

            <div class="container">
                <h2>Introduction</h2>
                <p>"<?php echo $introduction; ?>"</p>
                <button class="edit-button" onclick="showModal('modal-introduction')">Edit</button>
            </div>

            <div class="container">
                <h2>Tech Stack</h2>
                <?php if (!empty($techData)) : ?>
                    <div class="tech-used-section img-container">
                        <?php foreach ($techData as $tech) : ?>
                            <div class="tech-item img-display textsmall">
                                <span><?php echo htmlspecialchars($tech['techname']); ?></span>
                                <?php
                                $techImgSrc = 'data:image/png;base64,' . base64_encode($tech['techimage']);
                                echo '<img src="' . $techImgSrc . '" alt="' . htmlspecialchars($tech['techname']) . '">';
                                ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <p>No technology used data available.</p>
                <?php endif; ?>
                <button class="edit-button" onclick="showModal('')">Edit</button>
            </div>
        </div>

        <div id="projects-form" class="form-container">
            <h1>Projects</h1>
            <div class="container">
                <?php if (!empty($projectData)) : ?>
                    <div class="project-section display">
                        <?php foreach ($projectData as $project) : ?>
                            <div class="tech-item ctn textsmall">
                                <h4><?php echo htmlspecialchars($project['projectname']); ?></h4>
                                <span><?php echo htmlspecialchars($project['projectdetails']); ?></span>
                                <span><?php echo htmlspecialchars($project['projectlink']); ?></span>
                                <span><?php echo htmlspecialchars($project['githublink']); ?></span>
                                <?php
                                $projectImgSrc = 'data:image/png;base64,' . base64_encode($project['projectimage']);
                                echo '<img src="' . $projectImgSrc . '" alt="' . htmlspecialchars($project['projectname']) . '">';
                                ?>
                                <button class="edit-button" onclick="showModal('')">Edit</button>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <p>No project used data available.</p>
                <?php endif; ?>
            </div>
        </div>

        <div id="experience-form" class="form-container">
            <h1>Experience</h1>

            <div class="container">
                <?php if (!empty($experienceData)) : ?>
                    <div class="experience-section display">
                        <?php foreach ($experienceData as $experience) : ?>
                            <div class="tech-item ctn textsmall">
                                <?php
                                $experienceImgSrc = 'data:image/png;base64,' . base64_encode($experience['experienceimage']);
                                echo '<img src="' . $experienceImgSrc . '" width="100%">';
                                ?>
                                <h4><?php echo htmlspecialchars($experience['role']); ?></h4>
                                <span><?php echo htmlspecialchars($experience['organization']); ?></span>
                                <button class="edit-button" onclick="showModal('')">Edit</button>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <p>No experience used data available.</p>
                <?php endif; ?>
            </div>
        </div>

    </section>

    <!-- The Modal -->

    <!-- edit page for name -->
    <div id="modal-home" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modal-home')">&times;</span>
            <form action="./handlers/home-handler.php" method="post">
                <h2>Edit Name Details</h2>
                <input type="hidden" name="form_type" value="personal_details">
                <div class="input-form flex-column">
                    <label for="fname">First Name: </label>
                    <input type="text" name="fname" value="<?php echo $fname; ?>">
                    <label for="lname">Last Name: </label>
                    <input type="text" name="lname" value="<?php echo $lname; ?>">
                    <label for="title">Title: </label>
                    <textarea name="title" rows="4" cols="50"><?php echo $title; ?></textarea>
                    <div class="submit-button">
                        <input type="submit" value="Save">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- edit page for cover image -->
    <div id="modal-cover" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modal-cover')">&times;</span>
            <h2>Edit Cover Image</h2>
            <form id="uploadFormCover" enctype="multipart/form-data">
                <input type="file" name="coverImage" required>
                <div class="submit-button">
                    <input type="submit" value="Save">
                </div>
            </form>
        </div>
    </div>

    <!-- edit page for social media links -->
    <div id="modal-links" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modal-links')">&times;</span>
            <form action="./handlers/home-handler.php" method="post">
                <h2>Edit Social Media Links</h2>
                <input type="hidden" name="form_type" value="social_links">
                <div class="input-form flex-column">
                    <label for="linkedinlink">Linkedin: </label>
                    <input type="url" name="linkedinlink" value="<?php echo $linkedinlink; ?>">
                    <label for="facebooklink">Facebook: </label>
                    <input type="url" name="facebooklink" value="<?php echo $facebooklink; ?>">
                    <label for="instagramlink">Instagram: </label>
                    <input type="url" name="instagramlink" value="<?php echo $instagramlink; ?>">
                    <label for="githublink">Github: </label>
                    <input type="url" name="githublink" value="<?php echo $githublink; ?>">
                    <div class="submit-button">
                        <input type="submit" value="Save">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- edit page for profile image -->
    <div id="modal-profileimage" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modal-profileimage')">&times;</span>
            <h2>Edit Profile Image</h2>
            <form id="uploadFormProfile" enctype="multipart/form-data">
                <input type="file" name="profileImage" required>
                <div class="submit-button">
                    <input type="submit" value="Save">
                </div>
            </form>
        </div>
    </div>

    <!-- edit page for abobut introduction -->
    <div id="modal-introduction" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modal-introduction')">&times;</span>
            <form action="./handlers/about-handler.php" method="post">
                <h2>Edit Introduction</h2>
                <input type="hidden" name="form_type" value="about_introduction">
                <div class="input-form flex-column">
                    <label for="introduction">Introduction: </label>
                    <textarea name="title" rows="10" cols="50"><?php echo $introduction; ?></textarea>
                    <div class="submit-button">
                        <input type="submit" value="Save">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        //upload for home cover image
        document.getElementById('uploadFormCover').onsubmit = async function(event) {
            event.preventDefault();
            const formData = new FormData(this);
            const response = await fetch('./handlers/upload.php', {
                method: 'POST',
                body: formData
            });
            const result = await response.json();
            if (result.success) {
                document.getElementById('coverImage').src = result.imagePath + '?t=' + new Date().getTime(); // Cache busting
                closeModal('modal-cover'); // Close the modal after successful upload
            } else {
                alert('Image upload failed: ' + result.error);
            }
        }

        //upload for about profile image
        document.getElementById('uploadFormProfile').onsubmit = async function(event) {
            event.preventDefault();
            const formData = new FormData(this);
            const response = await fetch('./handlers/upload.php', {
                method: 'POST',
                body: formData
            });
            const result = await response.json();
            if (result.success) {
                document.getElementById('aboutImage').src = result.imagePath + '?t=' + new Date().getTime(); // Cache busting
                closeModal('modal-profileimage'); // Close the modal after successful upload
            } else {
                alert('Image upload failed: ' + result.error);
            }
        }

        function showForm(formId) {
            const forms = document.querySelectorAll('.form-container');
            forms.forEach(form => form.style.display = 'none');
            document.getElementById(formId).style.display = 'flex';
        }

        function showModal(modalId) {
            document.getElementById(modalId).style.display = 'block';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }
    </script>
</body>

</html>