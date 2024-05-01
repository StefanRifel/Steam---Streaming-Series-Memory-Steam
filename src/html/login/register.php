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
//TODO: Prüfen ob Benutzer schon vorhanden ist
if($stmt = $con->prepare("select Name from USERS where Name = ?")) {
    $stmt->bind_param("s", $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        exit('Username existiert bereits!');
    }
}
//Account anlegen
if ($InsertOK = $con->prepare("insert into USERS (Name, Password) VALUES (?, ?)")) {
    $password = password_hash($_POST['password1'], PASSWORD_DEFAULT);
    $id=1;
    $InsertOK->bind_param("ss", $_POST['username'], $password);
    $InsertOK->execute();
    echo "Registrierung erfolgreich!";
    $InsertOK->close();
    header('Location: ../homepage/homepage.php');
    exit();

} else {
    echo "Konnte nicht registriert werden!";
}
$InsertOK->close()
    ?>