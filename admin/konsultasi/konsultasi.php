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
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <?php require_once '../component/header.php' ?>

  <!-- ======= Sidebar ======= -->
  <?php require_once '../component/sidebar.php' ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Basis Kasus Pemodelan data</h1>
    </div><!-- End Page Title -->
    <br>

    <section>
      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">

            <table class="table table-hover">
              <thead class="th">
                <tr>
                  <th>No</th>
                  <th>Nama Klien</th>
                  <th>Umur</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "../koneksi.php";
                $sql = "SELECT * FROM klien ORDER BY id_klien";
                $qry = mysqli_query($koneksi, $sql) or die("SQL Error" . mysqli_error($koneksi));
                $no = 0;
                while ($data = mysqli_fetch_array($qry)) {
                  $no++;
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td align=justify><?php echo $data['nama_klien']; ?></td>
                    <td align=center><?php echo $data['umur']; ?> Tahun</td>
                    <td><a href="./detail.php?detail=<?php echo $data['id_klien']; ?>" class="btn  bg-info btn-sm" style="color: white;"><i class="bi bi-info-square"></i> Detail</a></td>
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