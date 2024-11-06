<?php

class Giohang 
{

  public $db = null;
  public function __construct(DBController $db) {
    if(!isset($db->conn));
    $this->db = $db;
  }

  // Hàm thêm vào giỏ hàng
  public function insertlnIntoCart($params = null, $table = "cart") {
    if ($this->db->conn != null) {
      if($params != null) {
        $columns = implode(', ', array_keys($params));
        $values = ":" . implode(', :', array_keys($params));

        // Khởi tạo câu truy vấn SQL
        $query_string = "INSERT INTO $table($columns) VALUES ($values)";
        $stmt = $this->db->conn->prepare($query_string);

        // Gán giá trị tham số
        foreach ($params as $key => $value) {
          $stmt->bindValue(":$key", $value);
        }

        // Thực thi truy vấn
        $result = $stmt->execute();
        return $result;
      }
    }
  }

  // Lấy thông tin người mua và thông tin sản phẩm
  public function addToCart($userid, $itemid){
    if (isset($userid) && isset($itemid)){
      $params = array(
        "user_id" => $userid,
        "item_id" => $itemid
      );

      // Thêm thông tin vừa lấy được vào giỏ hàng
      $result = $this->insertlnIntoCart($params);
      if($result){
        // Tải lại trang
        header("Location:" . $_SERVER['PHP_SELF']);
      }
    }
  }

  // Xóa giỏ hàng
  public function deleteCart($item_id = null, $table = 'cart'){
    if ($item_id != null){
      $stmt = $this->db->conn->prepare("DELETE FROM $table WHERE item_id = :item_id");
      $stmt->bindParam(":item_id", $item_id);
      $result = $stmt->execute();
      if($result){
        header("Location:" . $_SERVER['PHP_SELF']);
      }
      return $result;
    }
  }

  // Tổng giá tiền trong giỏ hàng
  public function getSum($arr) {
    if(isset($arr)){
      $sum = 0;
      foreach ($arr as $item){
        $sum += floatval($item[0]);
      }
      return sprintf('%.2f', $sum);
    }
  }
}
?>