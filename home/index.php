<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="icon" type="image/x-icon" href="/images/favicons/main/favicon.ico">
    <link rel="stylesheet" href="/css/main_stylesheet.css">
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/headers/main_header.php'; ?>

    <!-- Pre-load images -->
    <?php
    // Directory path for the images
    $directory = '/images/hero_images';

    // Get all image files in the directory
    $images = glob($_SERVER['DOCUMENT_ROOT'] . $directory . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE);

    foreach ($images as $image) {
        // Generate a hidden <img> tag for each image
        $imagePath = $directory . '/' . basename($image);
        echo '<img src="' . htmlspecialchars($imagePath) . '" style="display: none;" alt="">';
    }
    ?>

    <main>
        <section class="hero-container">
            <div class="hero" id="hero-section"></div>
            <div class="hero" id="hero-overlay"></div>
            <div class="hero-content">
                <img src="/images/home/HC_Title.png" alt="Horizon-Craft title">
                <p></p>
                <a href="/about-us" class="cta-button">More info about us</a>
            </div>
        </section>

        <section class="features">

	    <div class="feature">
	    	<h2>Horizon-Craft Minetopia Dynmap</h2>
            	<div class="dynmap-container">
                     	<iframe src="https://minetopia.maps.horizon-craft.com/?worldname=world&mapname=surface&zoom=4&x=314&y=64&z=-620" title="Dynmap"></iframe>
            	</div>
            </div>

            <div class="feature">
                <br>
                <h2 class="h2subhead">Website is still a WIP</h2>
		<p>The website is still a work in progress.</p>
                <br><br><br>
                <h2 class="h2subhead">Photo gallery</h2>
                <a href="/gallery" class="cta-button">To the full photo gallery</a>
            </div>

        </section>
        <section class="subsection">
            <div class="subsectiontext">
                <h2>Check back soon!</h2>
            </div>
        </section>
    </main>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/footers/main_footer.php'; ?>

    <?php
    // PHP to scan the directory and create an array of valid image paths
    $imageDirectory = $_SERVER['DOCUMENT_ROOT'] . '/images/hero_images';
    $images = array_filter(
        glob("{$imageDirectory}/*.{jpg,jpeg,png,gif}", GLOB_BRACE),
        'file_exists'
    );

    // Convert PHP array to a JavaScript array
    echo "<script>
            const images = [";
    foreach ($images as $image) {
        $imagePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', $image);
        echo "'{$imagePath}',";
    }
    echo "];

            // Set the initial background image for hero-section
            const heroSection = document.getElementById('hero-section');
            const heroOverlay = document.getElementById('hero-overlay');

            // Set the initial image (first image in the array)
            heroSection.style.backgroundImage = 'url(' + images[0] + ')';
            heroOverlay.style.backgroundImage = 'url(' + images[0] + ')';

            let currentIndex = 0;

            function changeImage() {
                // Set the overlay image to the next one
                currentIndex = (currentIndex + 1) % images.length;
                heroOverlay.style.backgroundImage = 'url(' + images[currentIndex] + ')';
                heroOverlay.style.opacity = 1;  // Fade in the overlay

                setTimeout(() => {
                    // Swap the overlay to the main background and fade it out
                    heroSection.style.backgroundImage = 'url(' + images[currentIndex] + ')';
                    heroOverlay.style.opacity = 0;  // Fade out the overlay
                }, 1500);  // 1500ms matches the CSS transition duration
            }

            setInterval(changeImage, 7500);  // Change image every 7.5 seconds
          </script>";
    ?>
</body>

</html>
