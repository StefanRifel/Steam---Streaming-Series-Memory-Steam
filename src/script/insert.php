<?php
echo "hallo";
$Connect_DB = mysqli_connect("localhost", "root", '', "steam");
if (mysqli_connect_errno()) {
    echo "Fehler beim Verbindungsaufbau";
}

$InsertOK = $Connect_DB->query("insert into SERIES (ID, Title, Season, Genre, Plattform) values (1, '{$_POST['title']}', '{$_POST['staffeln']}', '{$_POST['genre']}', '{$_POST['streaming-plattform']}')");
if ($InsertOK) {
    echo "wurde erfolgreich erstellt";
} else {
    echo "Fehler beim erstellen der ersten Daten";
}

?>

