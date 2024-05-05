<?php
require_once('../entities/series.php');

$series = new Series();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = $series->getSeries($id);
        if ($result) {
            echo json_encode($result);
        } else {
            echo "No series found";
        }
    } else {
        $result = $series->getSeries();
        if ($result) {
            echo json_encode($result);
        } else {
            echo "No series found";
        }
    }
    header('Location: ../../html/homepage/homepage.php');
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(empty($_POST["title"]) || empty($_POST["season"]) || empty($_POST["genre"]) || empty($_POST["platform"])) {
        header('Location: ../../html/homepage/homepage.php');
        exit();
    }
    $title = $_POST["title"];
    $season = $_POST["season"];
    $genre = $_POST["genre"];
    $platform = $_POST["platform"];

    if ($series->createSeries($title, $season, $genre, $platform)) {
        header('Location: ../../html/homepage/homepage.php');
    }
}