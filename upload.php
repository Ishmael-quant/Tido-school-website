<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}
?>
<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

// Messages
$imageMessage = "";
$homeworkMessage = "";

// ---------- IMAGE UPLOAD ----------
if (isset($_POST['submit_image'])) {
    $targetDir = "Images/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFile = $targetDir . $fileName;
    $ext = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) $imageMessage = "File is not an image.";
    elseif (!in_array($ext, ['jpg','jpeg','png','gif','webp'])) $imageMessage = "Only JPG, JPEG, PNG, GIF, WEBP allowed.";
    elseif (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) $imageMessage = "Image uploaded successfully!";
    else $imageMessage = "Error uploading image.";
}

// ---------- HOMEWORK UPLOAD ----------
if (isset($_POST['submit_homework'])) {
    $targetDir = "homeworks/";
    $fileName = basename($_FILES["homework"]["name"]);
    $targetFile = $targetDir . $fileName;
    $ext = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Allowed homework file types (PDF, DOC, DOCX)
    if (!in_array($ext, ['pdf','doc','docx'])) $homeworkMessage = "Only PDF, DOC, DOCX files allowed.";
    elseif (move_uploaded_file($_FILES["homework"]["tmp_name"], $targetFile)) $homeworkMessage = "Homework uploaded successfully!";
    else $homeworkMessage = "Error uploading homework.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Admin Upload</title>
<style>
body { font-family: Arial, sans-serif; text-align: center; padding: 50px; background: #f4f6f8; }
.upload-container { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); display: inline-block; margin-bottom: 30px; width: 350px; }
input[type="file"] { margin: 20px 0; }
button { padding: 12px 25px; border-radius: 8px; border: none; background: #28a745; color: white; cursor: pointer; }
button:hover { background: #1e7e34; }
a { display: block; margin-top: 20px; color: #007bff; text-decoration: none; }
a:hover { text-decoration: underline; }
.message { margin-top: 15px; font-weight: bold; color: #333; }
.logout { margin-top: 20px; display: inline-block; padding: 10px 20px; background: #e74c3c; color: white; border-radius: 8px; text-decoration: none; }
.logout:hover { background: #c0392b; }
h2 { margin-bottom: 15px; }
</style>
</head>
<body>

<div class="upload-container">
    <h2>Upload Image for Gallery</h2>
    <?php if($imageMessage != "") echo "<div class='message'>$imageMessage</div>"; ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" required><br>
        <button type="submit" name="submit_image">Upload Image</button>
    </form>
</div>

<div class="upload-container">
    <h2>Upload Revision File</h2>
    <h3>Name format: (grade),(subject),(term)</h3>
    <?php if($homeworkMessage != "") echo "<div class='message'>$homeworkMessage</div>"; ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="homework" required><br>
        <button type="submit" name="submit_homework">Upload Revision File</button>
    </form>
</div>

<a href="images.php">Go to Gallery</a>
<a href="revision.php">View Homework</a>
<a href="logout.php" class="logout">Logout</a>

</body>

</html>
