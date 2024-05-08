<!-- ======= Session ======= -->
<?php require_once '../component/session.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- ======= Head ======= -->
  <?php require_once '../component/head.php' ?>

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
  <?php require_once '../component/header.php' ?>

  <!-- ======= Sidebar ======= -->
  <?php require_once '../component/sidebar.php' ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Pernyataan berdasarkan faktor-faktor</h1>
    </div><!-- End Page Title -->
    <br>

    <section>
      <div class="row">
        <div class="col-md-12">

          <!-- Trigger the modal with a button -->
          <a href="tambahpernyataan.php" class="tambah" type="button"><i class="bi bi-pencil-square"></i> Tambah Pernyataan</a>
          <br><br><br>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="th">
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th style="width: 60%">Pernyataan</th>
                  <th colspan="2">Aksi<input type="hidden" id="texthapus"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "../koneksi.php";
                $sql = "SELECT * FROM pernyataan  ORDER BY kode_pernyataan";
                $qry = mysqli_query($koneksi, $sql) or die("SQL Error" . mysqli_error($koneksi));
                $no = 0;
                while ($data = mysqli_fetch_array($qry)) {
                  $no++;
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['kode_pernyataan']; ?></td>
                    <td align=justify><?php echo $data['nama_pernyataan']; ?></td>
                    <td><a href="./editpernyataan.php?id=<?php echo $data['kode_pernyataan']; ?>" class="btn btn-warning btn-sm" style="color: white;"><i class="bi bi-pencil"></i> Edit</a></td>
                    <td><a onClick="return HapusData('<?php echo $data['kode_pernyataan']; ?>');" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusmodal"><i class="bi bi-trash"></i> Hapus</a>
                    </td>
                  </tr><?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->

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
    function HapusData(xidhapus) {
      var idhapus = xidhapus;
      $("#texthapus").val(idhapus);
    }

    function DropData() {
      var data_hapus = $("#texthapus").val();
      var aksi = "pernyataan";
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