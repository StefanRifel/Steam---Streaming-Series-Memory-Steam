<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../css/header.css">
        <link rel="stylesheet" href="../../css/footer.css">
        <link rel="stylesheet" href="../../css/create-series.css">
        <link rel="stylesheet" href="../../css/series-preview.css">
        <script src="../../script/script.js"></script>
        <title>Steam</title>
    </head>
    <body>
        <header>
            <div class="header-content">
                <h1>Steam your series collection</h1>
                <form class="search-form" method="GET" action="../../script/api/series.php">
                    <label>
                        <input type="text" class="search-input" name="search" id="search">
                    </label>
                    <input type="submit" value="Search" class="search-button">
                </form>
            </div>
        </header>

        <div class="create-series-container">
            <h2 class="toggle">Create a New Series</h2>
            <form class="create-series-form" method="POST" action="../../script/api/series.php">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title"><br>
                <label for="season">Season:</label>
                <input type="number" name="season" id="season"><br>
                <label for="genre">Genre:</label>
                <input type="text" name="genre" id="genre"><br>
                <label for="platform">Platform:</label>
                <input type="text" name="platform" id="platform"><br>
                <button type="submit">Create</button>
            </form>
        </div>

        <div class="series-container">
            <?php
            if(isset($series)) {
                foreach ($series as $s) {
                    echo '
                        <div class="series-preview">
                            <div class="series-thumbnail">
                                <img src="../../assets/pic/preview.jpg" alt="Series Thumbnail">
                            </div>
                            <div class="series-info">
                                <h2 class="series-title">' . $s['Title'] . '</h2>
                                <p class="series-genre">Genre: ' . $s['Genre'] . '</p>
                                <p class="series-season">Season: ' . $s['Season'] . '</p>
                                <p class="series-plattform">Platform: ' . $s['Platform'] . '</p>
                                <p class="series-description">When a young boy disappears, his mother, a police chief,
                                and his friends must confront terrifying forces in order to get him back.</p>
                            </div>
                        </div>';
                }
            } else {
                require('../../script/entities/series.php');
                $series = new Series();
                $found = $series->getAllSeries();

                if($found) {
                    foreach ($found as $s) {
                        echo '
                        <div class="series-preview">
                            <div class="series-thumbnail">
                                <img src="../../assets/pic/preview.jpg" alt="Series Thumbnail">
                            </div>
                            <div class="series-info">
                                <h2 class="series-title">' . $s['Title'] . '</h2>
                                <p class="series-genre">Genre: ' . $s['Genre'] . '</p>
                                <p class="series-season">Season: ' . $s['Season'] . '</p>
                                <p class="series-plattform">Platform: ' . $s['Platform'] . '</p>
                                <p class="series-description">When a young boy disappears, his mother, a police chief,
                                and his friends must confront terrifying forces in order to get him back.</p>
                            </div>
                        </div>';
                    }
                } else {
                    echo 'No series found';
                }
            }
            ?>
        </div>



        <?php include('../footer.php') ?>
    </body>
</html>