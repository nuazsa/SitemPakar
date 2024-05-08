<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistem Pakar Pemodelan Data</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/gambar-logo.svg" rel="icon">
  <link href="assets/img/gambar-logo.svg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="./assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link href="./assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="./assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="./assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="./assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="./assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="./assets/css/style.css" rel="stylesheet">

  <style>
    .pernyataan {
      color: blue;
      padding: 5px;
      display: flex;
      justify-content: center;
    }
  </style>

</head>

<body>
  <?php
  include './admin/koneksi.php';
  // mengaktifkan session
  session_start();
  ?>

  <section>
    <div class="card mt-4 col-md-7 mx-auto"> <br>
      <h4 class="text-dark d-flex justify-content-center mt-4" style="color: #9370db;">Diagnosa Kebutuhan Berdasarkan Pernyataan</h4><br>
      <div class="card-body">
      <form action="./hasilkonsultasi.php" method="POST">
      <table class="table1">
					<div class="form-group row mb-3">
						<label for="" class="col-md-2 offset-md-0">Nama</label>
              <div class="col-sm-10">
							<input type="text" class="form-control" placeholder="Nama Lengkap" name="name" id="name" required>
              </div>
					</div>
						<div class="form-group row mb-3">
							<label for="" class="col-md-2 offset-md-0">Umur</label>
              <div class="col-sm-10">
							<input type="number" class="form-control" placeholder="Umur"  name="umur" id="umur" required>
              </div>
						</div>
					</div><br>
          <div class="form-group row mb-3">
							<label for="" class="col-md-2 offset-md-0">Pilih pernyataan</label>
              <div class="col-md-10" align="justify">

          <?php
          $sqli = "SELECT * FROM pernyataan";
          $result = $koneksi->query($sqli);
          if (isset($_POST['evidence'])) {
            if (count($_POST['evidence']) < 3) {
              echo "<p class=\"pernyataan\">Pilih minimal 3 pernyataan</p>";
            } elseif (count($_POST['evidence']) <= 0) {
              echo "<p class=\"pernyataan\">Pilih pernyataan terlebih dahulu</p>";
            }
          }

          // mengambil baris berikutnya menjadi objek
          while ($row = $result->fetch_object()) {
            echo "<hr> ";
            echo "<label for='checkbox" . $row->kode_pernyataan . "' style='cursor: pointer;'>";
            echo "<input style='cursor: pointer; width:20px;height:20px;' type='checkbox' id='checkbox" . $row->kode_pernyataan . "' name='evidence[]' value='" . $row->kode_pernyataan . "'";
            if (isset($_POST['evidence'])) {
              echo (in_array($row->kode_pernyataan, $_POST['evidence']) ? " checked" : "");
            }
            echo ">&ensp; " . $row->nama_pernyataan . "</label><br>";
          }
          ?>
          </div>
          </div>
        </table>
					<div class="form-group row mb-3 offset-md-2">
          <div>
            <button class="btn btn-primary mt-4 btn-md" onclick="return validateForm();" style="background-color: #9370db; padding: 6px 58px;"><i class="bi bi-check-lg"></i> Diagnosa</button>
            <button type="reset" value=" Reset" class="btn btn-warning mt-4 btn-md" name="reset"  id="reset" style="color: white; padding: 6px 58px;"><i class="bi bi-arrow-clockwise"></i> Reset</button>
            <a href="./index.php" class="btn btn-danger mt-4 btn-md"  style="float: right; padding: 6px 58px;"> <i class="bi bi-box-arrow-left"></i> Kembali</a>
          </div>
          </div>
        </form>
        <script>
          function validateForm() {
            var boxes = document.getElementsByName("evidence[]");
            var checkboxesChecked = 0;
            for (var i = 0; i < boxes.length; i++) {
              if (boxes[i].checked) {
                checkboxesChecked++;
              }
            }
            if (checkboxesChecked < 3) {
              alert("Pilih minimal 3 pernyataan");
              return false;
            }
          }
        </script>
      </div>
    </div>
  </section>

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
