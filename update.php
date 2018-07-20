<?php
require_once "core/init.php";
require_once "view/header.php";

$error = '';
$id = $_GET['id'];

if( isset($_GET['id']) ) {
  $article = tampilkan_per_id($id);
  while( $row = mysqli_fetch_assoc($article) ) {
    $judul_awal = $row['judul'];
    $isi_awal = $row['isi'];
    $tag_awal = $row['tag'];
  }
}

if( isset($_POST['submit']) ) {
  $judul = $_POST['judul'];
  $isi = $_POST['isi'];
  $tag = $_POST['tag'];

  if( !empty($judul) ) {
    if( edit_data($judul, $isi, $tag, $id) ) {
      header("Location: index.php");
    } else {
      $error = 'ada masalah update data';
    }
  } else {
    $error = 'judul dan konten wajib di isi';
  }
}

?>

<form action="" method="post">
  <label for="judul">Judul :</label><br>
  <input type="text" name="judul" value="<?php echo $judul_awal; ?>"><br><br>

  <label for="isi">Isi :</label><br>
  <textarea name="isi" rows="8" cols="40"><?php echo $isi_awal ?></textarea><br><br>

  <label for="tag">Tag :</label><br>
  <input type="text" name="tag" value="<?php echo $tag_awal ?>"><br><br>

  <div id="error"><?= $error ?></div>

  <input type="submit" name="submit" value="Submit">

</form>

<?php
require_once("view/footer.php");
?>
