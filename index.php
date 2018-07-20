<?php
require_once "core/init.php";
require_once "view/header.php";

$article = tampilkan();

// die(print_r($article));
?>

<?php while( $row = mysqli_fetch_assoc($article) ) : ?>
  <div class="each_article">
    <h3><?php echo $row['judul'] ?></h3>
    <p><?php echo $row['isi'] ?></p>
    <p class="waktu"><?php echo $row['waktu'] ?></p>
    <p class="tag"><?php echo $row['tag'] ?></p>
    <a href="update.php?id=<?php echo $row['id'] ?>">Edit</a>
  </div>
<?php endwhile ?>

<?php
require_once("view/footer.php");
?>
