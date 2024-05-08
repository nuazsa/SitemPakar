<?php
// ======= Session =======
require_once '../component/session.php';

$detail = $_GET['detail'];

if ($detail != "") {
  #menampilkan data
  $sql = "SELECT * FROM klien WHERE id_klien='$detail'";
  $qry = mysqli_query($koneksi, $sql)
    or die("SQL ERROR" . mysqli_error($koneksi));
  $data = mysqli_fetch_array($qry);
  #samakan dengan variabel form
  $id = $data['id_klien'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- ======= Head ======= -->
  <?php require_once '../component/head.php' ?>

  <style>
    .table {
      width: 99%;
      background: #FFF;
      border: none #FFF;
      border-radius: 5px 5px;
      padding: 3px 3px 3px 5px;
      text-align: justify;
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <?php require_once '../component/header.php' ?>

  <!-- ======= Sidebar ======= -->
  <?php require_once '../component/sidebar.php' ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Detail Basis Kasus Pemodelan Data</h1>
    </div><!-- End Page Title -->

    <section>
      <?php $ambil = $koneksi->query("SELECT * FROM klien WHERE klien.id_klien='$id'");
      $detail = $ambil->fetch_assoc();
      ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card col-md-12 mx-auto mt-5">
            <div class="card-body"> <br><br>
              <div class="form-group row mb-3">
                <div align="center">
                  <h2> <?php echo $detail['nama_klien']; ?> </h2>
                </div>
                <div class="card-body"> <br><br>
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width: 28%">Umur</th>
                        <td>:</td>
                        <td><?= $detail['umur'] . " Tahun"; ?></td>
                      </tr>
                      <tr>
                        <th>Faktor yang dibutuhkan</th>
                        <td>:</td>
                        <td>
                          <?php
                          $result = $koneksi->query("SELECT * FROM klien JOIN model ON klien.kode_model = model.kode_model WHERE id_klien='$id'");

                          $no = 1;
                          while ($row = mysqli_fetch_array($result)) :
                            $pernyataan = unserialize($row['kode_pernyataan']);
                            foreach ((array)$pernyataan as $key => $value) {
                              $result_pernyataan = $koneksi->query("SELECT * FROM pernyataan WHERE kode_pernyataan='" . $value . "'");
                              while ($row_pernyataan = mysqli_fetch_array($result_pernyataan)) :
                                echo $key + 1 . ". " . $row_pernyataan['nama_pernyataan'] . "<br>";
                              endwhile;
                            }

                            $model = $row['nama_model'];
                            $solusi = $row['solusi'];

                            $no++;
                          endwhile;

                          mysqli_close($koneksi);
                          ?>
                        </td>
                      </tr>
                      <tr>
                        <th>Derajat Kepercayaan</th>
                        <td>:</td>
                        <td><?php echo round($detail['hasil'], 2) . "%"; ?></td>
                      </tr>
                      <tr>
                        <th>Jenis Pemodelan Data</th>
                        <td>:</td>
                        <td><?= $model; ?></td>
                      </tr>
                      <tr>
                        <th>Solusi</th>
                        <td>:</td>
                        <td><?= $solusi; ?></td>
                      </tr>
                    </table> <br>
                    <div class=" d-flex justify-content-center">
                      <a href="./konsultasi.php" class="btn btn-danger btn-sm" style="padding: 6px 80px;"> <i class="bi bi-box-arrow-left"></i> Kembali</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </main><!-- End #main -->

  <!-- Logout Modal -->
  <?php require_once '../component/logoutmodal.php' ?>

  <!-- Vendor JS Files -->
  <?php require_once '../component/vendor.php' ?>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $("#myTable").dataTable();
    })
  </script>

  <script type="text/javascript">
    //expande text
    $(function() {
      $('.text').truncatable({
        limit: 100,
        more: '[<strong style="color:red;">&raquo;&raquo;&raquo;</strong>]',
        less: true,
        hideText: '[<strong>&laquo;&laquo;&laquo;</strong>]'
      });
    });

    window.onload = function() {
      var ctx_line = document.getElementById("templatemo-line-chart").getContext("2d");
      window.myLine = new Chart(ctx_line).Line(lineChartData, {
        responsive: true
      });
    };

    $('#myTab a').click(function(e) {
      e.preventDefault();
      $(this).tab('show');
    });

    $('#loading-example-btn').click(function() {
      var btn = $(this);
      btn.button('loading');
    });
  </script>

</body>

</html>