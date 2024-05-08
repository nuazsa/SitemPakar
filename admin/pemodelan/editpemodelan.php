<?php

// ======= Session =======
require_once '../component/session.php';


$kdubah = $_GET['kdubah'];

if ($kdubah != "") {
  #menampilkan data
  $sql = "SELECT * FROM model WHERE kode_model='$kdubah'";
  $qry = mysqli_query($koneksi, $sql)
    or die("SQL ERROR" . mysqli_error($koneksi));
  $data = mysqli_fetch_array($qry);
  #samakan dengan variabel form
  $id = $data['kode_model'];
  $edit_penyakit = $data['nama_model'];
  $edit_solusi = $data['solusi'];
}
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
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
      <h1>Edit Pemodelan Data</h1>
    </div><!-- End Page Title -->
    
  <section>

  <div class="row">
    <div class="col-md-12">
      <div class="card col-md-12 mx-auto mt-5">
        <div class="card-body"> <br><br>
      <form method="post" action="">
      <div class="form-group row mb-3">
          <label for="nama_penyakit" class="col-md-4 offset-md-0">Nama Pemodelan Data</label>
          <div class="col-sm-8">
          <input type="text" class="form-control" id="edit_penyakit" name="edit_penyakit"  value="<?php echo $edit_penyakit; ?>">
          </div>
        </div>
          <div class="form-group row mb-3">
          <label for="solusi" class="col-md-4 offset-md-0">Solusi</label>
          <div class="col-sm-8">
          <textarea class="form-control" rows="8" id="edit_solusi" name="edit_solusi"><?php echo $edit_solusi; ?></textarea>
          </div>
        </div>
        <div class="form-group row mb-3 offset-md-4">
          <div>
            <button class="btn btn-primary mt-4 btn-md" name="simpan" type="submit" style="background-color: #9370db; padding: 6px 108px;"><i class="bi bi-check-lg"></i> Update</button>
            <a href="./pemodelan.php" class="btn btn-danger mt-4 btn-md"  style="float: right; padding: 6px 108px;"> <i class="bi bi-x"></i> Batal</a>
          </div>
        </div>
      </form>
    </div>
  </div>

  <?php 
    if (isset($_POST['simpan'])) {
      $penyakit = $_POST['edit_penyakit'];
      $solusi = $_POST['edit_solusi'];

      $sql = "UPDATE model SET nama_model='$penyakit', solusi='$solusi' WHERE kode_model='$id'";
      $result = mysqli_query($koneksi, $sql) or die("SQL Error" . mysqli_error($koneksi));

      if ($result) {
        echo '<script>alert("Data berhasil diubah"); window.location.href="./pemodelan.php";</script>'   ;
      } else {
        echo '<script>alert("Data gagal diubah");</script>'    ;
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