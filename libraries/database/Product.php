<?php
// fetch product data
class Product 
{
  public $db = null;
  public function __construct(DBController $db)
  {
    if (!isset($db->conn));
    $this->db = $db;
  }


  // fetch product data
  public function getData($table = 'product'){
    $stmt = $this->db->conn->query("SELECT * FROM $table");
    $resultArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $resultArray;
  }

  // lay san pham duoc them trong csdl
  public function getProduct($item_id = null, $table = 'product'){
    if (isset($item_id)){
      $stmt = $this->db->conn->prepare("SELECT * FROM $table WHERE item_id = :item_id");
      $stmt->bindParam(':item_id', $item_id);
      $stmt->execute();
      $resultArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $resultArray;
    }
  }
}
  
?>