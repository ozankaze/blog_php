<?php
require_once "core/init.php";
require_once "view/header.php";

$error = '';

if ( isset($_SESSION['user']) ) {
  header("Location: index.php");
} else {
  if( isset($_POST['submit']) ) {
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    if( !empty(trim($username)) AND !empty(trim($password)) ) {
      
      // cek nama kalau sudah ada
      if( register_ceknama($username) ) {

        // register
        if( register($username, $password) ) {
          $_SESSION['user'] = $username;
          
          header("Location: index.php");
        } else {
          $error = 'Ada Masalah Saat Daftar';
        }

      } else {
        echo ' nama sudah ada';
      }

      

    } else {
      $error = 'user dan password harus di isi';
    }
  }
}



?>
<h2>Daftar user</h2>

<form action="" method="post">
  <label for="username">Username :</label><br>
  <input type="text" name="username" value=""><br><br>

  <label for="password">Password :</label><br>
  <input type="text" name="password" value=""><br><br>

  <div id="error"><?= $error ?></div>

  <input type="submit" name="submit" value="Submit">

</form>

<?php
require_once("view/footer.php");
?>
