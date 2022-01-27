<?php
include("config.php");
include("libs/headers.php");
include("libs/model.urls.php");

$tokenEncoded = Header::getBearerToken();

if($tokenEncoded != base64_encode(BEARER_TOKEN)) {
  die("Bearer token not matched");
}

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($mysqli->connect_error) {
  die("Connection Failed");
}

// print_r($_POST);
if(!empty($_POST["url"])) {
  $id = bin2hex(random_bytes(3));
  $url = $_POST["url"];
  $urlModel = new URL($mysqli);
  $result = $urlModel->insertUrl($id, $url);
  if($result) {
    echo $id;
  }
  die();
}
header("HTTP/1.0 400 Bad Request");
echo "Empty url";



?>
