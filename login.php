<?php
session_start();

// Set your admin username & password
$admin_user = "ROOT";
$admin_pass = "existential"; // change this!

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];

    if ($user === $admin_user && $pass === $admin_pass) {
        $_SESSION["logged_in"] = true;
        header("Location: upload.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Admin Login</title>
<style>
    body {
        background: #2575fc;
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .box {
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        width: 300px;
    }
    input {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border-radius: 8px;
        border: 1px solid #aaa;
    }
    button {
        width: 100%;
        padding: 12px;
        background: #6a11cb;
        border: none;
        color: white;
        font-size: 16px;
        border-radius: 8px;
        cursor: pointer;
    }
</style>
</head>
<body>

<div class="box">
    <h2>Admin Login</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button>Login</button>
    </form>

    <?php if(!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
</div>

</body>

</html>
