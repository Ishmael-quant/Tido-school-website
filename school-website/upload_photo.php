<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}

$target = "uploads/" . basename($_FILES["photo"]["name"]);

if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target)) {
    echo "Upload successful!";
} else {
    echo "Upload failed!";
}
?>