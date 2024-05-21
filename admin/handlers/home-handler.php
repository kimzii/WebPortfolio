<?php
// Database connection
include './connection.php';

// Check which form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['form_type'])) {
        if ($_POST['form_type'] == "personal_details" && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['title'])) {
            // Handle personal details form submission
            $fname = $conn->real_escape_string($_POST['fname']);
            $lname = $conn->real_escape_string($_POST['lname']);
            $title = $conn->real_escape_string($_POST['title']);

            $sql = "UPDATE home SET fname='$fname', lname='$lname', title='$title' WHERE id=1"; // Adjust the WHERE clause as needed

            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }

            // Redirect back to the admin page to avoid form resubmission
            header("Location: ../admin.php");
            exit;
        } elseif ($_POST['form_type'] == "social_links" && isset($_POST['linkedinlink']) && isset($_POST['facebooklink']) && isset($_POST['instagramlink']) && isset($_POST['githublink'])) {
            // Handle social media links form submission
            $linkedinlink = $conn->real_escape_string($_POST['linkedinlink']);
            $facebooklink = $conn->real_escape_string($_POST['facebooklink']);
            $instagramlink = $conn->real_escape_string($_POST['instagramlink']);
            $githublink = $conn->real_escape_string($_POST['githublink']);

            $sql = "UPDATE socmedlinks SET linkedin='$linkedinlink', facebook='$facebooklink', instagram='$instagramlink', github='$githublink' WHERE id=0"; // Adjust the WHERE clause as needed

            if ($conn->query($sql) === TRUE) {
                echo "Social media links updated successfully";
            } else {
                echo "Error updating social media links: " . $conn->error;
            }

            // Redirect back to the admin page to avoid form resubmission
            header("Location: ../admin.php");
            exit;
        }
    }
}

// Close connection
$conn->close();
