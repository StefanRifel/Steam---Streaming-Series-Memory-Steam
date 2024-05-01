<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'steam';
//Mit Datenbank verbinden
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
} else {
    echo "Connected successfully";
}

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
            header('Location: ../homepage/homepage.php');
            exit();
        } else {
            echo 'Falscher Benutzername oder Passwort!';
        }
    } else {
        echo "Der Benutzername oder Passwort ist falsch!";
    }
}