<?php
$folder = "revision/";

// ensure folder exists
if (!is_dir($folder)) {
    echo "<p>No homework uploaded yet.</p>";
    exit();
}

// get all files (case-insensitive)
$files = glob($folder . "*.{pdf,PDF,doc,DOC,docx,DOCX}", GLOB_BRACE);

if ($files) {
    echo "<ul>";
    foreach ($files as $file) {
        $name = basename($file);
        echo "<li>
                <a href='$file' target='_blank'>View</a> |
                <a href='$file' download>Download</a> - $name
              </li>";
    }
    echo "</ul>";
} else {
    echo "<p>No homework uploaded yet.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Homeworks</title>
<style>
body { font-family: Arial, sans-serif; padding: 50px; background: #f4f6f8; text-align: center; }
h1 { margin-bottom: 30px; }
.homework-container { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); max-width: 500px; margin: auto; }
a { display: block; margin: 12px 0; color: #007bff; text-decoration: none; font-weight: bold; }
a:hover { text-decoration: underline; }
.back { margin-top: 20px; display: inline-block; padding: 10px 20px; background: #28a745; color: white; border-radius: 8px; text-decoration: none; }
.back:hover { background: #1e7e34; }
</style>
</head>
<body>

<h1>Homeworks</h1>

<div class="homework-container">
<?php
if ($files) {
    foreach ($files as $file) {
        $name = basename($file);
        // Open in new tab
        echo "<a href='$file' target='_blank'>$name</a>";
    }
} else {
    echo "<p>No homework uploaded yet.</p>";
}
?>
</div>

<a href="upload.php" class="back">Back to Upload</a>
<a href="logout.php" class="back" style="background:#e74c3c;">Logout</a>

</body>
</html>