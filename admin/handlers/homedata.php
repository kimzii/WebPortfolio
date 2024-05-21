<?php 
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


// Load data for social media links
$linkedinlink = $facebooklink = $instagramlink = $githublink = "";
$sql = "SELECT linkedin, facebook, instagram, github FROM socmedlinks";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $linkedinlink = $row['linkedin'];
        $facebooklink = $row['facebook'];
        $instagramlink = $row['instagram'];
        $githublink = $row['github'];
    }
} else {
    echo "0 results";
}
?>