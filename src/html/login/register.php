<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = require('../../../resources/config.php');

//Prüfen ob Daten NULL sind
    if (!isset($_POST['username'], $_POST['password1'], $_POST['password2'])) {
        exit('Bitte Daten komplett eingeben1!');
    }

//Prüfen dass Daten nicht leer sind
    if (empty($_POST['username']) || empty($_POST['password1']) || empty($_POST['password2'])) {
        // One or more values are empty.
        exit('Bitte Daten komplett eingeben2!');
    }

//Prüfen, ob Passwörter gleich sind
    if ($_POST['password1'] != $_POST['password2']) {
        exit('Passwörter stimmen nicht überein!');
    }
    $username = $_POST['username'];
    $password = password_hash($_POST['password1'], PASSWORD_DEFAULT);
//Prüfen ob Nutzername schon existiert
    $sql = "select name from USERS where name = '$username'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        exit('Username existiert bereits!');
    }

    $sql = "insert into USERS (name, password) VALUES ('$username', '$password')";
    $con->query($sql);
    header('Location: ../index.php');


}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/style.css" type="text/css">
    <title>Registrieren</title>
</head>
<body>
<main>
    <form action="register.php" method="post">
        <div class="container">
            <h1>Registrieren</h1>
            <label>Username:
                <input type="text" placeholder="Benutzernamen eingeben" id="username" name="username" required>
            </label>
            <label>Passwort:
                <input type="password" placeholder="Passwort eingeben" id="password1" name="password1" required>
            </label>
            <label>Passwort erneut eingeben:
                <input type="password" placeholder="Passwort eingeben" id="password2" name="password2" required>
            </label>
            <button type="submit">Registrieren</button>
        </div>
    </form>
</main>
</body>
</html>
