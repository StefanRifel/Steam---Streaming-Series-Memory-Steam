<?php

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
if($_POST['password1'] != $_POST['password2']) {
    exit('Passwörter stimmen nicht überein!');
}
$username = $_POST['username'];
$password = password_hash($_POST['password1'], PASSWORD_DEFAULT);

$sql = "insert into USERS (name, password) VALUES ('$username', '$password')";
$con->query($sql);
header('Location: ../homepage/homepage.php');

$sql = "select name from USERS where name = '$username'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    exit('Username existiert bereits!');
}

//Account anlegen
$sql = "insert into USERS (name, password) VALUES ('$username', '$password')";
$con->query($sql);



