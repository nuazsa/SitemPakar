<?php
include '../koneksi.php';
// mengaktifkan session
session_start();
$username = $_SESSION['username'];
if (!$username) {
  header('Location: ../index.php');
  exit;
}

$sql = "SELECT * FROM user where username = '$username'";
$qry = mysqli_query($koneksi, $sql) or die("SQL Error" . mysqli_error($koneksi));
while ($data = mysqli_fetch_array($qry)) {
  $nama = $data['nama'];
}