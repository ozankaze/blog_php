<?php
function tampilkan() {
  global $link;

  $query = "SELECT * FROM blog";
  $result = mysqli_query($link, $query) or die('gagalmenampilkan data');
  return $result;
}


?>
