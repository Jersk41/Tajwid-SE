<?php
class Db
{
    public $conn;
    // mengkonstuksi koneksi
    public function __construct() {
        $this->conn = new mysqli("localhost","root","","db_tajwid");
        $this->conn->set_charset('utf8');
        return $this->conn;
    }
    public function read()
    {
        $data = [];
        $result = $this->conn->query("SELECT h.id_huruf,h.nama_huruf,h.hijaiyah,m.nama_makhroj,m.tempat_makhroj,m.arti_makhroj,m.deskripsi
        FROM huruf h, makhroj m
        WHERE h.makhroj=m.id_makhroj");
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    public function readSpesific($parameter,$condition)
    {
        $data = [];
        $result = $this->conn->query("SELECT $parameter FROM sifat WHERE $condition");
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
}
?>