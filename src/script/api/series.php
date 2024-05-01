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
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $title = $data['title'];
    $season = $data['season'];
    $genre = $data['genre'];
    $platform = $data['platform'];

    if ($series->createSeries($title, $season, $genre, $platform)) {
        echo "New series created";
    } else {
        echo "Error creating series";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];

    if ($series->deleteSeries($id)) {
        echo "Series deleted";
    } else {
        echo "Error deleting series";
    }
}