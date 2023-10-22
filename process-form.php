<?php
session_start();
$servername = "localhost:3307";
$username = "migoy";
$password = "password_here";
$dbname = "pointofsale";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Retrieve form data
    $name = $_POST["name"];
    $description = $_POST["desc"];
    $price = $_POST["price"];

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO ref_menu (menu_name, menu_desc, price) VALUES ('$name', '$description', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("New record created successfully");</script>';
        // header("Refresh: 1; url=index.php");
    } else {
        echo '<script>alert("error eekkk);</script>';
    }
}


$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM ref_menu";
$stmt = $conn->query($sql);
$posData = $stmt->fetchAll(PDO::FETCH_ASSOC);

$_SESSION['posData'] = $posData;


if (isset($_GET['id'])) {
    // Sanitize the ID parameter
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $sql = "DELETE FROM ref_menu WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}




include('index.php');
