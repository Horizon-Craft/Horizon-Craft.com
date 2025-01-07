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
<main>
        <section class="features">

            <div class="feature">
                <h2>Horizon-Craft Minetopia Dynmap</h2>
                <div class="dynmap-container">
                        <iframe src="https://status.horizon-craft.com/status/horizon-craft" title="Status"></iframe>
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

</body>

</html>
