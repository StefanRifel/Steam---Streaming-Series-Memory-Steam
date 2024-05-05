<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    require_once '../entities/series.php';

    $search = $_GET['search'];
    $model = new Series();
    if(!empty($_GET['search'])) {
        $series = $model->searchSeriesByTitle($search);
    } else {
        $series = $model->getAllSeries();
    }

    include '../../html/homepage/homepage.php';
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../entities/series.php';
    $series = new Series();
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