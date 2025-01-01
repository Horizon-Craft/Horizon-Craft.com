<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media Gallery</title>
    <link rel="icon" type="image/x-icon" href="/images/favicons/main/favicon.ico">
    <link rel="stylesheet" href="/css/main_stylesheet.css">
    <link rel="stylesheet" href="/css/media_library_stylesheet.css">
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/headers/main_header.php'; ?>
    <header-title>
        <h1>Media Library</h1>
    </header-title>
    <main>
        <!-- Sidebar with filters -->
        <aside id="sidebar" class="sidebar">
            <div class="sidebar-content">
                <h3>Filter</h3>
                <h4>General Filters</h4>
                <button class="clear-filters">Clear Filters</button>
                <button class="tag-filter" data-tag="building">Buildings</button>
                <button class="tag-filter" data-tag="cityscape">Cityscapes</button>
                <button class="tag-filter" data-tag="skyscraper">Skyscrapers</button>
                <button class="tag-filter" data-tag="station">Stations</button>
                <button class="tag-filter" data-tag="map">Maps</button>

                <h4>Media Types</h4>
                <button class="type-filter" data-type="all">All</button>
                <button class="type-filter" data-type="image">Pictures</button>
                <button class="type-filter" data-type="video">Videos</button>
                <button class="type-filter" data-type="other">Other</button>

                <h4>Media Categories</h4>
                <button class="tag-filter" data-tag="event">Event</button>
                <button class="tag-filter" data-tag="informative">Informative</button>
                <button class="tag-filter" data-tag="news">News</button>
                <button class="tag-filter" data-tag="spotting">Spotting</button>

                <h4>All Tags</h4>
                <?php
                // Parse this page and extract tag-filter buttons
                $dom = new DOMDocument();
                libxml_use_internal_errors(true); // Suppress HTML parsing warnings
                
                // Load the current file content
                $currentFile = __FILE__;
                $html = file_get_contents($currentFile);
                $dom->loadHTML($html);
                libxml_clear_errors();

                // Get all buttons with the class 'tag-filter'
                $buttons = $dom->getElementsByTagName('button');
                $tags = [];

                foreach ($buttons as $button) {
                    if ($button->getAttribute('class') === 'tag-filter') {
                        $dataTag = $button->getAttribute('data-tag');
                        $label = trim($button->textContent); // Ensure clean label text
                        $tags[$dataTag] = $label; // Store as key-value pair
                    }
                }

                // Sort tags alphabetically by label
                asort($tags);

                // Render sorted tags, skipping the first iteration
                $first = true;
                foreach ($tags as $key => $label) {
                    if ($first) {
                        $first = false;
                        continue; // Skip the first iteration
                    }
                    echo '<button class="tag-filter" data-tag="' . htmlspecialchars($key) . '">' . htmlspecialchars($label) . '</button>' . "\n";
                }
                ?>

            </div>
        </aside>
        <!-- Sidebar toggle button -->
        <button id="toggle-sidebar" class="sidebar-toggle">&#9654;</button>

        <!-- Media Grid -->
        <section id="media-grid"></section>
    </main>
    <script src="/js/media_library.js"></script>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/footers/main_footer.php'; ?>
</body>

</html>