<?php
class Series {
    private $conn;

    public function __construct() {
        $this->conn = require('../../../resources/config.php');
    }

    public function getSeries($id = null) {
        if ($id) {
            $sql = "SELECT * FROM SERIES WHERE id = $id";
        } else {
            $sql = "SELECT * FROM SERIES";
        }

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

    public function deleteSeries($id) {
        $sql = "DELETE FROM SERIES WHERE id = $id";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
