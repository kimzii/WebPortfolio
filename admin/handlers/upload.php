<?php
include './connection.php';

function uploadImage($fileInputName, $tableName, $columnName, $conn) {
    $fileSize = $_FILES[$fileInputName]["size"];
    $uploadOk = 1;
    $error = "";

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES[$fileInputName]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
        $imageFileType = $check['mime']; // Get the MIME type
    } else {
        $uploadOk = 0;
        $error = "File is not an image.";
    }

    // Check file size (5MB max)
    if ($fileSize > 5000000) {
        $uploadOk = 0;
        $error = "Sorry, your file is too large. Maximum size allowed is 5MB.";
    }

    // Allow certain file formats
    if (!in_array($imageFileType, ["image/jpeg", "image/png", "image/gif"])) {
        $uploadOk = 0;
        $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        return ["success" => false, "error" => $error];
    } else {
        // Read the file content
        $imageData = file_get_contents($_FILES[$fileInputName]["tmp_name"]);
        $imageData = $conn->real_escape_string($imageData);

        // Save the image content and its type in the database
        $sql = "UPDATE $tableName SET $columnName = '$imageData' WHERE id = 1"; // assuming there's an id column
        if ($conn->query($sql) === TRUE) {
            return ["success" => true];
        } else {
            return ["success" => false, "error" => "Failed to update database."];
        }
    }
}

$response = ["success" => false, "error" => "Invalid request."];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['coverImage'])) {
        $response = uploadImage('coverImage', 'home', 'coverimage', $conn);
    } elseif (isset($_FILES['profileImage'])) {
        $response = uploadImage('profileImage', 'about', 'aboutimage', $conn);
    }
}

echo json_encode($response);
$conn->close();
?>
