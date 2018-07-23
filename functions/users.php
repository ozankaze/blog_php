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

// cek status
function cek_status($username) {
  global $link;

  $query = "SELECT `status` FROM `users` WHERE `username`='$username'";
  if( $result = mysqli_query($link, $query) ) {
    while( $row = mysqli_fetch_assoc($result) ) {
      $status = $row['status'];
    }

    return $status;
  }
}


?>
