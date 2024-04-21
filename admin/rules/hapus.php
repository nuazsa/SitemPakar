<?php
include "../koneksi.php";
$aksi = $_GET['aksi'];
$data_hapus = $_GET['data_hapus'];

// hapus basis pengetahuan
if ($aksi == "rule") {
  $sql = "DELETE FROM rule WHERE id_rule='$data_hapus'";
  $result = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
  //jika berhasil di hapus
  if ($result) {
    echo "sukses";
  } else {
    echo "gagal";
  }
}
?>
