<?php
require_once "function.php";
// membuat instance
$db = new Db();
// mengambil semua data
$data = $db->read();
function readSingle($parameter,$condition)
{
    global $db;
    $singleData = $db->readSpesific($parameter,$condition);
    return $singleData;
}
/**
 * Ambil pengertian dari sifat-sifat huruf
 * 
 **/
function getSifatMean($name)
{
    // ambil resources pengertian-pengertian sifat
    $jsonData = json_decode(file_get_contents("data.json",true),true);
    // buat index dan array
    $i = 0;
    $array = array();
    // perulangan untuk membaca semua data
    while ($i < count($jsonData["data"])) {
        // print_r($jsonData["data"][$i]['sifat']);
        $array[] = array("nama"=>$jsonData["data"][$i]["sifat"],"bahasa"=>$jsonData["data"][$i]["bahasa"],"istilah"=>$jsonData["data"][$i]["istilah"]);
        $i++;
    }
    // kembalikan data berupa array
    return $array;
}
getSifatMean("Jahr");
?>