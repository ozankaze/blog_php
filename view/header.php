<?php

$login = false;

if ( isset($_SESSION['user'])) {
  $login = true; 
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Latihan</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <head>
      <h1>Blof fauzan belajar</h1>
    </head>
    <div id="menu">
      <a href="index.php">Home</a>
      <a href="create.php">Create</a>
      <?php if( $login == true ) : ?>
        <a href="logout.php">Logout</a>
      <?php else: ?>
        <a href="login.php">Login</a>
      <?php endif ?>
    </div>
