<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'steam';
//Mit Datenbank verbinden
    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);


//Prüfen ob Daten NULL sind
    if (!isset($_POST['username'], $_POST['password'])) {
        exit('Bitte Daten komplett eingeben!');
    }

    if ($stmt = $con->prepare("select Name, Password from USERS where Name = ?")) {
        $stmt->bind_param("s", $_POST['username']);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($name, $password);
            $stmt->fetch();
            if (password_verify($_POST['password'], $password)) {
                header('Location: ./homepage/homepage.php');
                exit();
            } else {
                echo 'Falscher Benutzername oder Passwort!';
            }
        } else {
            echo "Der Benutzername oder Passwort ist falsch!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <title>Einloggen</title>
</head>
<body>
<main>
    <form action="index.php" method="post">
        <div class="container">
            <h1>Bitte einloggen!</h1>
            <label>Username:
                <input type="text" placeholder="Benutzernamen eingeben" id="username" name="username" required>
            </label>
            <label>Passwort:
                <input type="password" placeholder="Passwort eingeben" id="password" name="password" required>
            </label>
            <button type="submit">Einloggen!</button>
            <a href="login/register.php">Noch kein Account? Registrieren!</a>
        </div>
    </form>
</main>
</body>
</html>