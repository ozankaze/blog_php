<?php
require_once "core/init.php";
require_once "view/header.php";

$error = '';

if ( !$_SESSION['user']) {
  header("Location: login.php");
}

if( isset($_POST['submit']) ) {
  $judul = $_POST['judul'];
  $isi = $_POST['isi'];
  $tag = $_POST['tag'];

  if( !empty($judul) ) {
    if( tambah_data($judul, $isi, $tag) ) {
      header("Location: index.php");
    } else {
      $error = 'judul dan konten wajib di isi';
    }
  } else {
    $error = 'judul dan konten wajib di isi';
  }
}

?>

<form action="" method="post">
  <label for="judul">Judul :</label><br>
  <input type="text" name="judul" value=""><br><br>

  <label for="isi">Isi :</label><br>
  <textarea name="isi" rows="8" cols="40"></textarea><br><br>

  <label for="tag">Tag :</label><br>
  <input type="text" name="tag" value=""><br><br>

  <div id="error"><?= $error ?></div>

  <input type="submit" name="submit" value="Submit">

</form>

<?php
require_once("view/footer.php");
?>
