<?php
require_once "core/init.php";
global $link;
function getRatingByProductId($link, $productId) {
 $query = "SELECT SUM(vote) as vote, COUNT(vote) as count from rating1 WHERE product_id = $productId";

      $result = mysqli_query($link, $query);
      $resultSet = mysqli_fetch_assoc($result);
      if($resultSet['count']>0) {
       return ($resultSet['vote']/$resultSet['count']);
      } else {
       return 0;
      }

}

if(isset($_REQUEST['type'])) {
 if($_REQUEST['type'] == 'save') {
  $vote = $_REQUEST['vote'];
  $productId = $_REQUEST['productId'];
       $query = "INSERT INTO rating1 (product_id, vote) VALUES ('$productId', '$vote')";
       $con = connect();
       $result = mysqli_query($link, $query);
       echo 1; exit;
 }
}

?>
