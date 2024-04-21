<?php
include '../koneksi.php';
// mengaktifkan session
session_start();
$username = $_SESSION['username'];

$sql = "SELECT * FROM user where username = '$username'";
$qry = mysqli_query($koneksi, $sql) or die("SQL Error" . mysqli_error($koneksi));
while ($data = mysqli_fetch_array($qry)) {
  $nama = $data['nama'];
}

$id_ubah = $_GET['id_ubah'];

if ($id_ubah != "") {
  #menampilkan data
  $sql = "SELECT * FROM rule WHERE id_rule='$id_ubah'";
  $qry = mysqli_query($koneksi, $sql)
    or die("SQL ERROR" . mysqli_error($koneksi));
  $data = mysqli_fetch_array($qry);
  #samakan dengan variabel form
  $id = $data['id_rule'];
  $edit_gejala = $data['kode_gejala'];
  $edit_gangguan = $data['kode_gangguan'];
  $edit_belief = $data['nilai_densitas'];
  $arrPenyakit = array();
  $arrGejala = array();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistem Pakar Diagnosis Gangguan Kecemasan - Basis Pengetahuan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../assets/img/gambar-favicon.png" rel="icon">
  <link href="../../assets/img/gambar-apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.back-to-top').click(function() {
        $('html, body').animate({
          scrollTop: 0
        }, 'slow');
      });
    });
  </script>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center" style="background-color: #9370db;">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="../../assets/img/gambar-logo.png" alt="logo" width="20%">
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
        <a class="nav-link collapsed" href="../index.php">
          <i class="bi bi-house"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../gejala/gejala.php">
          <i class="bi bi-eyedropper"></i>
          <span>Gejala</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="../penyakit/penyakit.php">
          <i class="bi bi-file-medical"></i>
          <span>Gangguan Kecemasan</span>
        </a>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link" href="../rules/rules.php">
          <i class="bi bi-diagram-3"></i>
          <span>Basis Pengetahuan</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../pasien/pasien.php">
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
      <h1>Edit Basis Pengetahuan Gangguan Kecemasan</h1>
    </div><!-- End Page Title -->

    <section>
      <div class="row">
        <div class="col-md-12">
          <div class="card col-md-12 mx-auto mt-5">
            <div class="card-body"> <br><br>
          <div class="table-responsive">
            <div class="konten">
              <form method="post" action="">
              <table class="table1">
                  <div class="form-group row mb-3">
                    <label for="" class="col-md-4 offset-md-0">Gejala Gangguan Kecemasan</label>
                      <div class="col-sm-4">
                        <select name="daftargejala" id="daftargejala" style="width: 630px;" required>
                          <?php
                          include "../koneksi.php";
                          $arrPenyakit = array();
                          $arrGejala = array();
                          $sqlp = "SELECT * FROM gejala ORDER BY kode_gejala";
                          $qryp = mysqli_query($koneksi, $sqlp)
                            or die("SQL Error: " . mysqli_error($koneksi));
                          while ($datap = mysqli_fetch_array($qryp)) {
                            if ($datap['kode_gejala'] == $edit_gejala) {
                              $cek = "selected";
                            } else {
                              $cek = "";
                            }
                            $arrGejala["$datap[kode_gejala]"] = $datap['nama_gejala'];
                            echo "<option value='$datap[kode_gejala]' $cek>$datap[kode_gejala]&nbsp; - &nbsp;$datap[nama_gejala]</option>";
                          }
                          ?>
                        </select>
                      </div> 
                    </div>
                    <div class="form-group row mb-3">
                      <label for="" class="col-md-4 offset-md-0">Jenis Gangguan Kecemasan</label>
                        <div class="col-sm-4">
                        <select name="daftarpenyakit" id="daftarpenyakit" style="width: 630px;" required>
                          <?php
                            $sqlp = "SELECT * FROM gangguan ORDER BY kode_gangguan";
                            $qryp = mysqli_query($koneksi, $sqlp) or die("SQL Error: " . mysqli_error($koneksi));
                            while ($datap = mysqli_fetch_array($qryp)) {
                              if ($datap['kode_gangguan'] == $edit_gangguan) {
                                $cek = "selected";
                              } else {
                                $cek = "";
                              }
                              $arrPenyakit["$datap[kode_gangguan]"] = $datap['nama_gangguan'];
                              echo "<option value='$datap[kode_gangguan]' $cek>$datap[kode_gangguan]&nbsp; - &nbsp;$datap[nama_gangguan]</option>";
                            }
                            ?>
                        </select>
                      </div> 
                    </div>
                    <div class="form-group row mb-3">
                      <label for="edit_belief" class="col-md-4 offset-md-0">Nilai Densitas</label>
                      <div class="col-sm-8">
                      <input type="text" class="form-control" id="edit_belief" name="edit_belief" value="<?php echo $edit_belief; ?>">
                      </div>
                    </div>
                </table>
                <div class="form-group row mb-3 offset-md-4">
                  <div>
                    <button class="btn btn-primary mt-4 btn-md" name="simpan" type="submit" style="background-color: #9370db; padding: 6px 109px;"><i class="bi bi-check-lg"></i> Update</button>
                    <a href="./rules.php" class="btn btn-danger mt-4 btn-md"  style="float: right; padding: 6px 109px;"> <i class="bi bi-x"></i> Batal</a>
                  </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <?php
      if (isset($_POST['simpan'])) {
        //menampilkan outputnya
        $kd_gejala = $_POST['daftargejala'];
        $kd_penyakit = $_POST['daftarpenyakit'];
        $belief = $_POST['edit_belief'];
        //mengubah data di dalam tabel relasi

        $sql = "UPDATE rule SET kode_gejala='$kd_gejala', kode_gangguan='$kd_penyakit', nilai_densitas='$belief' WHERE id_rule='$id'";
        $result = mysqli_query($koneksi, $sql) or die("SQL Error" . mysqli_error($koneksi));
          
        if ($result) {
          echo '<script>alert("Data berhasil diubah"); window.location.href="./rules.php";</script>'   ;
        } else {
          echo '<script>alert("Data gagal diubah");</script>'    ;
        }
      }
      ?>

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
          <a href="../login.php" type="button" class="btn btn-success btn-sm"><i class="bi bi-check-lg"></i> Ya</a>
          <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x"></i> Tidak</button>
        </div>
      </div>
    </div>
  </div><!-- End Logout Modal-->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>
  <script src="../../assets/js/jquery.min.js"></script>
  <script src="../../assets/js/jquery.truncatable.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>

</body>

</html>