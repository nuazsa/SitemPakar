<?php
include './koneksi.php';
// mengaktifkan session
session_start();
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if ($_SESSION['status'] != "login") {
  header("location:./login.php");
}

$username = $_SESSION['username'];

$sql = "SELECT * FROM user where username = '$username'";
$qry = mysqli_query($koneksi, $sql) or die("SQL Error" . mysqli_error($koneksi));
while ($data = mysqli_fetch_array($qry)) {
  $nama = $data['nama'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistem Pakar Pemodelan Data</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/gambar-logo.svg" rel="icon">
  <link href="../assets/img/gambar-logo.svg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center" style="background-color: #9370db;">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="../assets/img/gambar-logo.svg" alt="logo" width="20%">
        <span class="d-none d-lg-block" style="color: #fff;">Sistem Pakar</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <div class="d-flex align-items-center justify-content-md-end" style="width: 73%;">
      <a href="#" class="nav-link nav-link-lg nav-link-user">
          <div class="d-sm-none d-lg-inline-block" style="color: #fff;"><b><i class="bi bi-person"></i> <?php echo $nama; ?></b></div>
      </a>
    </div>
    <!-- End Logo -->
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-house"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="./pernyataan/pernyataan.php">
          <i class="bi bi-eyedropper"></i>
          <span>Pernyataan</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="./pemodelan/pemodelan.php">
          <i class="bi bi-file-medical"></i>
          <span>Pemodelan Data</span>
        </a>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="./rules/rules.php">
          <i class="bi bi-diagram-3"></i>
          <span>Basis Pengetahuan</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="./konsultasi/konsultasi.php">
          <i class="bi bi-clipboard2-pulse"></i>
          <span>Riwayat Konsultasi</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:;" data-bs-toggle="modal" data-bs-target="#logoutmodal">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->
    </ul>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1> <br>
    </div><!-- End Page Title -->

    <section>
    <?php 
    $count1 = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM model"));
    $count2 = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pernyataan"));
    $count3 = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM rule"));
    $count4 = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM klien"));
  ?>
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <a href="./pemodelan/pemodelan.php">
          <div class="card-wrap">
            <div class="card-header" style="width: 100%; padding: 1px;">
            <div class="card-icon bg-danger" style="color: white; height: 50px">
              <center><h6 style="padding-top: 15px;"><i class="bi bi-file-medical"></i> Model Data</h6></center>
            </div>
            <div class="card-body" style="padding-top: 5px;"><center><?php echo $count1; ?></center></div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <a href="./pernyataan/pernyataan.php">
          <div class="card-wrap">
            <div class="card-header" style="width: 100%; padding: 1px;">
            <div class="card-icon bg-warning" style="color: white; height: 50px">
              <center><h6 style="padding-top: 15px;"><i class="bi bi-eyedropper"></i> Pernyataan</h6></center>
            </div>
            <div class="card-body" style="padding-top: 5px;"><center><?php echo $count2; ?></center></div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <a href="./rules/rules.php">
          <div class="card-wrap">
            <div class="card-header" style="width: 100%; padding: 1px;">
            <div class="card-icon bg-success" style="color: white; height: 50px">
              <center><h6 style="padding-top: 15px;"><i class="bi bi-diagram-3"></i> Basis Pengetahuan</h6></center>
            </div>
            <div class="card-body" style="padding-top: 5px;"><center><?php echo $count3; ?></center></div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <a href="./konsultasi/konsultasi.php">
          <div class="card-wrap">
            <div class="card-header" style="width: 100%; padding: 1px;">
            <div class="card-icon bg-info" style="color: white; height: 50px">
              <center><h6 style="padding-top: 15px;"><i class="bi bi-clipboard2-pulse"></i> Riwayat Konsultasi</h6></center>
            </div>
            <div class="card-body" style="padding-top: 5px;"><center><?php echo $count4; ?></center></div>
          </div>
        </div>
      </a>
    </div>
    </div>
  </div>    
  <br>      <br>  
  <div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-body">
          <center style="margin: 20px 0;"><img src="../assets/img/gambar-logo.svg" width="25%"/></center>
          <h2 class="text-center">Selamat Datang</h2>
          <h3 class="text-center">di Sistem Pakar Pemodelan Data</h3>
        </div>
      </div>
    </div>
  </div>
    </section>
  </main><!-- End #main -->

  <!-- Logout Modal -->
  <div class="modal fade" id="logoutmodal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Apakah Anda yakin ingin keluar?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-footer">
          <a href="./logout.php" type="button" class="btn btn-success btn-sm"><i class="bi bi-check-lg"></i> Ya</a>
          <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x"></i> Tidak</button>
        </div>
      </div>
    </div>
  </div><!-- End Logout Modal-->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>