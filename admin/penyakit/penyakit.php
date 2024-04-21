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
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistem Pakar Diagnosis Gangguan Kecemasan - Jenis Gangguan Kecemasan</title>
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">

  <style>
    .table {
      width: 99%;
			background: linear-gradient(to left, #FFF, #EEE);
			border: 1px solid #CCC;
			border-radius: 5px 5px;
			padding: 3px 3px 3px 5px;
      text-align: center;
    }

    .th {
      background: linear-gradient(to right, #8269aa, #ccbbe4);
      text-align: center;
    }

    .tambah {
      background-color: #9370db;
      border: none;
      color: white;
      padding: 10px 20px;
      border-radius: 3px;
    }

    .tambah:hover {
      background-color: #717ff5;
      border: none;
      color: white;
      padding: 10px 20px;
      border-radius: 3px;
    }
  </style>

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
        <a class="nav-link" href="../penyakit/penyakit.php">
          <i class="bi bi-file-medical"></i>
          <span>Gangguan Kecemasan</span>
        </a>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../rules/rules.php">
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
      <h1>Gangguan Kecemasan</h1>
    </div><!-- End Page Title -->
<br>

    <section>
      <div class="row">
        <div class="col-md-12">

          <!-- Trigger the modal with a button -->
          <a href="tambahpenyakit.php" class="tambah" type="button"><i class="bi bi-pencil-square"></i>  Tambah Gangguan</a>
<br><br><br>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="th">
                <tr>
                  <th>No</th>
                  <th style="width: 16%">Kode Gangguan</th>
                  <th style="width: 27%">Nama Gangguan</th>
                  <th style="width: 30%">Solusi Penanganan</th>
                  <th colspan="2" style="width: 20%">Aksi<input type="hidden" id="texthapus"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "../koneksi.php";
                $sql = "SELECT * FROM gangguan  ORDER BY kode_gangguan";
                $qry = mysqli_query($koneksi, $sql) or die("SQL Error" . mysqli_error($koneksi));
                $no = 0;
                while ($data = mysqli_fetch_array($qry)) {
                  $no++;
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['kode_gangguan']; ?></td>
                    <td align=justify><?php echo $data['nama_gangguan']; ?></td>
                    <td align=justify><?php echo $data['solusi']; ?></td>
                    <td><a href="./editpenyakit.php?kdubah=<?php echo $data['kode_gangguan']; ?>" class="btn btn-warning btn-sm" style="color: white;"><i class="bi bi-pencil"></i> Edit</a></td>
                    <td><a onClick="return HapusData('<?php echo $data['kode_gangguan']; ?>');" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusmodal"><i class="bi bi-trash"></i> Hapus</a>
                    </td>
                  </tr><?php } ?>
              </tbody>
            </table>
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
          <a href="../login.php" type="button" class="btn btn-success btn-sm"><i class="bi bi-check-lg"></i> Ya</a>
          <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x"></i> Tidak</button>
        </div>
      </div>
    </div>
  </div><!-- End Logout Modal-->

  <!-- hapus Modal -->
  <div class="modal fade" id="hapusmodal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Apakah Anda ingin menghapus data?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-footer">
          <a onClick="return DropData();" class="btn btn-primary btn-sm"><i class="bi bi-check-lg"></i> Ya</a>
          <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x"></i> Tidak</button>
        </div>
      </div>
    </div>
  </div><!-- End hapus Modal-->

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

  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $("#myTable").dataTable();
    })
  </script>

  <script type="text/javascript">
    function HapusData(xidhapus) {
      var idhapus = xidhapus;
      $("#texthapus").val(idhapus);
    }

    function DropData() {
      var data_hapus = $("#texthapus").val();
      var aksi = "penyakit";
      var datanya = "&data_hapus=" + data_hapus + "&aksi=" + aksi; //hapus data
      $.ajax({
        url: "./hapus.php",
        data: datanya,
        cache: false,
        success: function(msg) {
          if (msg == "sukses") {
            $("#frmSukses").show();
            $("#frmSukses").fadeOut(4200);
            window.location.reload();
          }
        }
      })
    }
    
    //expande text
    $(function() {
      $('.text').truncatable({
        limit: 100,
        more: '[<strong style="color:red;">&raquo;&raquo;&raquo;</strong>]',
        less: true,
        hideText: '[<strong>&laquo;&laquo;&laquo;</strong>]'
      });
    });

    $('#myTab a').click(function(e) {
      e.preventDefault();
      $(this).tab('show');
    });

    $('#loading-example-btn').click(function() {
      var btn = $(this);
      btn.button('loading');
      // $.ajax(...).always(function () {
      //   btn.button('reset');
      // });
    });
  </script>


</body>

</html>