<?php

class URL {
  private $mysqli;
  public function __construct($mysqli) {
    $this->mysqli = $mysqli;
  }
  public function insertUrl($id, $url) {
    try {
      $sql = "INSERT INTO urls (id, url) VALUES (?, ?)";
      $stmt = $this->mysqli->prepare($sql);
      $stmt->bind_param("ss", $id, $url);
      $stmt->execute();
      $result = $this->mysqli->insert_id;
      $stmt->close();
      return true;
    } catch(Exception $e) {

    }
    return false;
  }
  public function getUrl($id) {
    $sql = "SELECT * FROM urls WHERE id = ?";
    $stmt = $this->mysqli->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
    return $row;
  }
}

?>
