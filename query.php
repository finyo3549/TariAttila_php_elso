<?php
require_once("db.php");
class Query
{
    private $db;
    private $query;
    function __construct()
    {
        $this->db = new DbConnect();

    }
    function listAll() {
        $sql = "SELECT * from processzorok";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    function createNew($data) {
        $processzorgyarto = $_GET['processzorgyarto'];
        $processzor_tipus = $_GET['processzor_tipus'];
        $orajel = $_GET['orajel'];
        $architektura = $_GET['architektura'];
        $kibocsajtas = $_GET['kibocsajtas'];
        $sql='INSERT INTO processzorok (`id`, `processzor_gyarto`, `processzor_tipus`, `orajel`, `architektura`, `kibocsajtas`) VALUES (NULL, ?, ?, ?, ?, ?)';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ssisi', $processzorgyarto, $processzor_tipus, $orajel, $architektura, $kibocsajtas);
        if ($stmt->execute()) {
            return true;
        };
    } 
}


?>