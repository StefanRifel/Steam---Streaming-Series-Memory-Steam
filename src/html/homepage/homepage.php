<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../css/header.css">
        <link rel="stylesheet" href="../../css/footer.css">
        <title>Steam</title>
    </head>
    <body>
        <?php include('../header.php') ?>

        <h2>Create a New Series</h2>
        <form method="POST" action="">
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

        <div>
            <label>Titel:</label>
            <label>Staffeln:</label>
            <label>Genre:</label>
            <label>Streaming-Plattform:</label>
        </div>

        <h1>Series API Demo</h1>
        <h2>Get All Series</h2>
        <?php
        require('../../script/entities/series.php');
        // Get all series
        $api_url = '../../script/api/series.php';
        $series = new Series();
        $found = $series->getSeries();

        if ($found) {
            echo '<ul>';
            foreach ($found as $s) {
                echo '<li>' . $s['Title'] . ' - Season ' . $s['Season'] . ' - Genre: ' . $s['Genre'] . ' - Platform: ' . $s['Platform'] . '</li>';
            }
            echo '</ul>';
        } else {
            echo 'No series found';
        }
        ?>

        <h2>Search Series by ID</h2>
        <form method="GET" action="<?php echo $api_url; ?>">
            <label for="series_id">Enter Series ID:</label>
            <input type="text" name="id" id="series_id">
            <button type="submit">Search</button>
        </form>

        <h2>Create a New Series</h2>
        <form method="POST" action="<?php echo $api_url; ?>">
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

        <h2>Delete a Series</h2>
        <form method="POST" action="<?php echo $api_url; ?>">
            <label for="delete_id">Enter Series ID to Delete:</label>
            <input type="text" name="id" id="delete_id">
            <button type="submit">Delete</button>
        </form>

        <?php include('../footer.php') ?>
    </body>
</html>