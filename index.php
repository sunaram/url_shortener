<?php
include("config.php");
include("libs/model.urls.php");

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($mysqli->connect_error) {
  die("Connection Failed");
}

// print_r($_POST);
if(!empty($_GET["id"])) {
  $id = $_GET["id"];
  $urlModel = new URL($mysqli);
  $row = $urlModel->getUrl($id);
  // print_r($row);
  if(!empty($row["url"])) {
    header("Location: ". $row["url"]);
    die();
  }
  header("HTTP/1.0 404 Not Found");
  die();
}
header("HTTP/1.0 400 Bad Request");
echo "Empty id";



?>
