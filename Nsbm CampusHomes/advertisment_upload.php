<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "pass123";
$dbname = "NSBM_CampusHomes";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $uploadDir = "advertisment-slider/images/";
    foreach ($_FILES["file"]["tmp_name"] as $key => $tmp_name) {
        $fileName = basename($_FILES["file"]["name"][$key]);
        $fileTmp = $_FILES["file"]["tmp_name"][$key];
        $filePath = $uploadDir . $fileName;
        move_uploaded_file($fileTmp, $filePath);
        
       
        $stmt = $conn->prepare("INSERT INTO advertisements (file_path) VALUES (?)");
        $stmt->bind_param("s", $filePath);
        $stmt->execute();
    }
    header("Location: index.php");
    exit(); // Stop execution after redirection
    echo "Files uploaded successfully!";
} else {
    echo "Error uploading files!";
}


$conn->close();
?>
