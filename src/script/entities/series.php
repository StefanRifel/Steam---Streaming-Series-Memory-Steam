<?php
class Series {
    private $conn;

    public function __construct() {
        $this->conn = require('../../../resources/config.php');
    }

    public function getAllSeries() {
        $sql = "SELECT * FROM SERIES";

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $rows = array();
            while($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            return false;
        }
    }

    public function createSeries($title, $season, $genre, $platform) {
        $sql = "INSERT INTO SERIES (title, season, genre, platform) VALUES ('$title', $season, '$genre', '$platform')";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function searchSeriesByTitle($search) {
        $search = mysqli_real_escape_string($this->conn, $search);
        $sql = "SELECT * FROM SERIES WHERE Title LIKE '%$search%'";
        $result = $this->conn->query($sql);
        $series = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $series[] = $row;
            }
        }
        return $series;
    }
}
