<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST["username"];
    $input_password = $_POST["pass"];

    $sql = "SELECT * from authentication WHERE username = '$input_username' AND pass = '$input_password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Store user data in session variables
        $_SESSION['username'] = $row['username'];
        $_SESSION['pass'] = $row['pass'];

        // Redirect to profile
        header("Location: home-admin.php");
        exit();
    } else {
        echo "Account does not exist";
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10%;
        }

        form {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            display: flex;
            flex-direction: column;
            gap: 24px;
            align-items: center;
            justify-content: center;
            width: 360px;
            padding: 48px 24px;
            border-radius: 8px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .btn input {
            padding: 4px 16px;
            background-color: #0f172a;
            color: white;
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <div>
            Username: <input type="text" name="username">
        </div>

        <div>
            Password: <input type="password" name="pass">
        </div>

        <div class="btn">
            <input type="submit" value="Login">
        </div>
    </form>
</body>

</html>