<?php
require_once "core/init.php";
require_once "view/header.php";

$error = '';
$id = $_GET['id'];

if ( !$_SESSION['user']) {
  header("Location: login.php");
}

if( isset($_GET['id']) ) {
  $article = tampilkan_per_id($id);
  while( $row = mysqli_fetch_assoc($article) ) {
    $judul_awal = $row['judul'];
    $isi_awal = $row['isi'];
    $tag_awal = $row['tag'];
  }
}

?>

<p id="judul_singel">
  <?php echo $judul_awal; ?>
</p>

<p id="isi_singel">
  <?php echo $isi_awal; ?>
</p>

<p id="tag_singel">
  <?php echo $tag_awal; ?>
</p>

<?php
require_once("view/footer.php");
?>
