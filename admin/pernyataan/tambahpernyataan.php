<!-- ======= Session ======= -->
<?php require_once '../component/session.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- ======= Head ======= -->
  <?php require_once '../component/head.php' ?>
</head>

<body>

  <!-- ======= Header ======= -->
  <?php require_once '../component/header.php' ?>

  <!-- ======= Sidebar ======= -->
  <?php require_once '../component/sidebar.php' ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Tambah Pernyataan Pemodelan Data</h1>
    </div><!-- End Page Title -->
    
    <section>
    <div class="row">
        <div class="col-md-12">
          <div class="card col-md-12 mx-auto mt-5">
            <div class="card-body"> <br><br>
                <form method="post" action="">
                    <div class="form-group row mb-3">
                        <label for="nama_pernyataan"  class="col-md-2 offset-md-0">Pernyataan</label>
                        <div class="col-sm-10">
                        <textarea type="text" rows="5" class="form-control" id="nama_pernyataan" name="nama_pernyataan" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-3 offset-md-2">
                  <div>
                    <button class="btn btn-primary mt-4 btn-md" name="simpan" type="submit" style="background-color: #9370db; padding: 6px 150px;"><i class="bi bi-check-lg"></i> Simpan</button>
                    <a href="./pernyataan.php" class="btn btn-danger mt-4 btn-md"  style="float: right; padding: 6px 150px;"> <i class="bi bi-x"></i> Batal</a>
                  </div>
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>
      <?php
        if (isset($_POST['simpan'])) {
        $pernyataan = $_POST['nama_pernyataan'];

        $query = mysqli_query($koneksi, "SELECT max(kode_pernyataan) as kodeTerbesar FROM pernyataan");
                      $data = mysqli_fetch_array($query);
                      $kode = $data['kodeTerbesar'];

                      $urutan = (int) substr($kode, 2);
                      $urutan++;
                      $huruf = "MP";
                      $kode = $huruf . sprintf("%02s", $urutan);

        //cek keberadaan data
        $sqlrs = mysqli_query($koneksi, "SELECT kode_pernyataan FROM pernyataan WHERE kode_pernyataan='$kode'");
        $rs = mysqli_num_rows($sqlrs);
        if ($rs == 0) {
          $perintah = "INSERT INTO pernyataan(kode_pernyataan,nama_pernyataan)VALUES('$kode','$pernyataan')";
          $berhasil = mysqli_query($koneksi, $perintah);

          //jika data berhasil disimpan
          if ($berhasil) {
            echo '<script>alert("Data berhasil disimpan"); window.location.href="./pernyataan.php";</script>'   ;
          } else {
            echo '<script>alert("Data gagal disimpan");</script>'    ;
          }
        }
        }
        ?>
    </section>
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