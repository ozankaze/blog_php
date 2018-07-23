<?php
require_once "core/init.php";
require_once "view/header.php";

// if ( !$_SESSION['user']) {
//   header("Location: login.php");
// }

$super_user = $login = false;

if ( isset($_SESSION['user'])) {
  $login = true;
  if( cek_status($_SESSION['user']) == 1 ) {
    $super_user = true;
  } 
}

$articles = tampilkan();

// die(print_r($article));


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
    
    <?php if( $login == true ) : ?>
      <a href="update.php?id=<?php echo $row['id'] ?>">Edit</a>
        <?php if( $super_user == true ) : ?>
          <a href="delete.php?id=<?php echo $row['id'] ?>">Delete</a>
        <?php endif; ?>
    <?php endif; ?>
  </div>
<?php endwhile ?>

<?php
require_once("view/footer.php");
?>
