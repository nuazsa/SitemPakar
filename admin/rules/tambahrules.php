<!-- ======= Session ======= -->
<?php require_once '../component/session.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- ======= Head ======= -->
  <?php require_once '../component/head.php' ?>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
</head>

<body>

  <!-- ======= Header ======= -->
  <?php require_once '../component/header.php' ?>

  <!-- ======= Sidebar ======= -->
  <?php require_once '../component/sidebar.php' ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Tambah Basis Pengetahuan Model Data</h1>
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
                    <label for="" class="col-md-4 offset-md-0">Pernyataan</label>
                      <div class="col-sm-4">
                        <select name="daftarpernyataan" id="daftarpernyataan" style="width: 630px;" required>
                          <option value="">Pilih Pernyataan</option>
                          <?php
                          include "../koneksi.php";
                          $arrmodel = array();
                          $arrpernyataan = array();
                          $sqlp = "SELECT * FROM pernyataan ORDER BY kode_pernyataan";
                          $qryp = mysqli_query($koneksi, $sqlp)
                            or die("SQL Error: " . mysqli_error($koneksi));
                          while ($datap = mysqli_fetch_array($qryp)) {
                            if ($datap['kode_pernyataan'] == $kdpernyataan) {
                              $cek = "selected";
                            } else {
                              $cek = "";
                            }
                            $arrpernyataan["$datap[kode_pernyataan]"] = $datap['nama_pernyataan'];
                            echo "<option value='$datap[kode_pernyataan]' $cek>$datap[kode_pernyataan]&nbsp; - &nbsp;$datap[nama_pernyataan]</option>";
                          }
                          ?>
                        </select>
                      </div> 
                    </div>
                    <div class="form-group row mb-3">
                      <label for="" class="col-md-4 offset-md-0">Jenis Model Data</label>
                        <div class="col-sm-4">
                        <select name="daftarmodel" id="daftarmodel" style="width: 630px;" required>
                          <option value="">Pilih Jenis Model Data</option>
                          <?php
                          $sqlp = "SELECT * FROM model ORDER BY kode_model";
                          $qryp = mysqli_query($koneksi, $sqlp)
                            or die("SQL Error: " . mysqli_error($koneksi));
                          while ($datap = mysqli_fetch_array($qryp)) {
                            if ($datap['kode_model'] == $kdsakit) {
                              $cek = "selected";
                            } else {
                              $cek = "";
                            }
                            $arrmodel["$datap[kode_model]"] = $datap['nama_model'];
                            echo "<option value='$datap[kode_model]' $cek>$datap[kode_model]&nbsp; - &nbsp;$datap[nama_model]</option>";
                          }
                          ?>
                        </select>
                      </div> 
                    </div>
                    <div class="form-group row mb-3">
                        <label for="belief" class="col-md-4 offset-md-0">Nilai Densitas</label>
                        <div class="col-sm-8">
                        <input type="text" name="belief" id="belief" class="form-control" required>
                        </div>
                    </div>
                </table>
                <div class="form-group row mb-3 offset-md-4">
                  <div>
                    <button class="btn btn-primary mt-4 btn-md" name="simpan" type="submit" style="background-color: #9370db; padding: 6px 109px;"><i class="bi bi-check-lg"></i> Simpan</button>
                    <a href="./rules.php" class="btn btn-danger mt-4 btn-md"  style="float: right; padding: 6px 109px;"> <i class="bi bi-x"></i> Batal</a>
                  </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php
        include "../koneksi.php";
        if (isset($_POST['simpan'])) {

        //menampilkan outputnya
        $kd_pernyataan = $_POST['daftarpernyataan'];
        $kd_model = $_POST['daftarmodel'];
        $belief = $_POST['belief'];
        //menyimpan data kedalam tabel relasi
        $sql = "INSERT INTO rule (kode_pernyataan,kode_model,nilai_densitas) VALUES ('$kd_pernyataan','$kd_model','$belief' )";
        $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
          
          if ($query) {
            echo '<script>alert("Data berhasil disimpan"); window.location.href="./rules.php";</script>'   ;
          } else {
            echo '<script>alert("Data gagal disimpan");</script>'    ;
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