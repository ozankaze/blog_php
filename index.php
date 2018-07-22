<?php
require_once "core/init.php";
require_once "view/header.php";

$articles = tampilkan();

// die(print_r($article));

if ( !$_SESSION['user']) {
  header("Location: login.php");
}

if( isset($_GET['search']) ) {
  $cari = $_GET['search'];
  $articles = cari_data($cari);
}
?>

<form action="" method="get">
  <input type="search" name="search" value="">
</form>

<?php while( $row = mysqli_fetch_assoc($articles) ) : ?>
  <div class="each_article">
    <h3><a href="singel.php?id=<?php echo $row['id'] ?>"><?php echo $row['judul'] ?></a></h3>
    <p><?php echo excerpt($row['isi'])?></p>
    <p class="waktu"><?php echo $row['waktu'] ?></p>
    <p class="tag"><?php echo $row['tag'] ?></p>
    <a href="update.php?id=<?php echo $row['id'] ?>">Edit</a>
    <a href="delete.php?id=<?php echo $row['id'] ?>">Delete</a>
  </div>
<?php endwhile ?>

<?php
require_once("view/footer.php");
?>
