<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Steam</title>
    </head>
    <body>
        <header>
            <h1>Steam deine Seriensammlung</h1>
            <form>
                <label>
                    Search:
                    <input type="text">
                    <input type="submit" value="Search">
                </label>
            </form>
        </header>

        <h2>Deine Serien</h2>
        <div>
            <form action="../script/insert.php" method="post">
                <h3>Füge eine neue Serie hinzu</h3>
                <label>
                    Titel:
                    <input type="text" name="title">
                </label>
                <label>
                    Staffeln:
                    <input type="text" name="staffeln">
                </label>
                <label>
                    Genre:
                    <input type="text" name="genre">
                </label>
                <label>
                    Streaming-Plattform:
                    <input type="text" name="streaming-plattform">
                </label>
                <input type="submit" value="Insert">
            </form>
        </div>

        <div>
            <label>Titel:</label>
            <label>Staffeln:</label>
            <label>Genre:</label>
            <label>Streaming-Plattform:</label>
        </div>

        <footer>

        </footer>
    </body>
</html>