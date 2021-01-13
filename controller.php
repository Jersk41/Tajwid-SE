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
// kirim data sebagai json
// return json_encode(array("response"=>[$data,$singleData]),JSON_PRETTY_PRINT);
?>