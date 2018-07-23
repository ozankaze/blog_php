<?php

// register
function register($username, $password) {
  global $link;
  $username = mysqli_real_escape_string($link, $username);
  $password = mysqli_real_escape_string($link, $password);

  $password = md5($password);
  $query = "INSERT INTO `users` (`username` ,`password`, `status`) VALUES ('$username', '$password', 0 )";
  // var_dump($query);die();

  if( mysqli_query($link, $query) ) {
    return true;
  } else {
    return false;
  }
}

// cek data login
function cek_data($username, $password) {
  global $link;
  $username = mysqli_real_escape_string($link, $username);
  $password = mysqli_real_escape_string($link, $password);

  $password = md5($password);

  $query = "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'";
  $result = mysqli_query($link, $query);
  // var_dump($query);die();
  // $a = mysqli_num_rows($result);
  // var_dump($a);die();
  if( $result = mysqli_query($link, $query) ) {
    if( $a = mysqli_num_rows($result) !=0 ) {
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

// validasi nama 
function register_ceknama($username) {
    global $link;
    $username = mysqli_real_escape_string($link, $username);

    $query = "SELECT * FROM `users` WHERE `username` = '$username'";
    // var_dump($query);die();
    if( $riset = mysqli_query($link, $query) ) {
      if( mysqli_num_rows($riset) == 0 ) {
          return true;
      } else {
          return false;
      }
  }
}




?>
