<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Image Gallery - Tido Primary School</title>
<style>
    /* Reset default styles */
    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(to right, #6a11cb, #2575fc);
        min-height: 100vh;
        padding: 20px;
        color: #333;
    }

    .gallery-container {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        padding: 40px 30px;
        max-width: 1200px;
        margin: auto;
    }

    h1 {
        text-align: center;
        margin-bottom: 40px;
        color: #333;
    }

    .gallery {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .gallery img {
        width: 100%;
        height: auto;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        transition: transform 0.3s, box-shadow 0.3s;
        cursor: pointer;
    }

    .gallery img:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    }

    .links {
        text-align: center;
        margin-top: 30px;
    }

    .links a {
        color: #2575fc;
        text-decoration: none;
        font-weight: bold;
        margin: 0 10px;
        transition: 0.3s;
    }

    .links a:hover { text-decoration: underline; }

    @media (max-width: 480px) {
        .gallery-container { padding: 30px 20px; }
    }
</style>
</head>
<body>

<div class="gallery-container">
    <h1>Our School in Pictures</h1>

    <div class="gallery" id="gallery">
        <?php
        // Path to the folder containing images
        $imageFolder = "Images/";
        $images = glob($imageFolder . "*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE);

        if ($images) {
            foreach ($images as $img) {
                $imgName = basename($img);
                echo '<img src="'.$img.'" alt="'.$imgName.'">';
            }
        } else {
            echo "<p>No images available.</p>";
        }
        ?>
    </div>

    <div class="links">
        <a href="rules.html">Back to School Rules</a> |
        <a href="index.html">Back to Home Page</a>
    </div>
</div>

</body>
</html>