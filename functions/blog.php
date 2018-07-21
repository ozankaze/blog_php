<?php
// nampilkan data index
function tampilkan() {
  global $link;

  $query = "SELECT * FROM blog";
  $result = mysqli_query($link, $query) or die('gagalmenampilkan data');
  return $result;
}

// mengambil id
function tampilkan_per_id($id) {
  global $link;
  $query = "SELECT * FROM `blog` WHERE id='$id'";
  $result = mysqli_query($link, $query);

  return $result;
}

// create data
function tambah_data($judul, $isi, $tag) {
  $query = "INSERT INTO `blog` (`judul`, `isi`, `tag`) VALUES ('$judul', 'isi', '$tag')";
  // print_r($query);

  return run($query);

}

// update data
function edit_data($judul, $isi, $tag, $id) {
  global $link;
  $query = "UPDATE `blog` SET judul='$judul', isi='$isi', tag='$tag' WHERE id=$id";
  // vardump($query);
  // print_r($query);die();
  return run($query);
}

// menghapus data
function hapus_data($id) {
  $query = "DELETE FROM blog WHERE id='$id'";
  $a = mysqli_query($link, $query);
  // vardump($a);
  return run($query);
}

// menjalankan query
function run($query) {
  global $link;

  if( mysqli_query($link, $query) ) {
    return true;
  } else {
    return false;
  }
}

// untuk memotong string
function excerpt($string) {
  $string = substr($string, 0, 10);
  return $string . " . . . . ";
}


?>
