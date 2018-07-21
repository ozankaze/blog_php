<?php


// cek data login
function cek_data($username, $password) {
  global $link;

  $query = "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'";
  if( $result = mysqli_query($link, $query) ) {
    if( mysqli_num_rows($result) !=0 ) {
      return true;
    } else {
      return false;
    }
  }

}


?>
