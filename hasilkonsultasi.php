<?php
include './admin/koneksi.php';
// mengaktifkan session
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistem Pakar Diagnosis Gangguan Kecemasan -  Hasil Diagnosa</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="./assets/img/gambar-favicon.png" rel="icon">
  <link href="./assets/img/gambar-apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="./assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link href="./assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="./assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="./assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="./assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="./assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="./assets/css/style.css" rel="stylesheet">

  <style>

    .form {
			width: 99%;
			background: linear-gradient(to left, #FFF, #EEE);
			border: 1px solid #CCC;
			border-radius: 5px 5px;
			padding: 3px 3px 3px 5px;
      text-align: center;
		}

    .th {
      background: linear-gradient(to right, #8269aa, #ccbbe4);
    }

    .diagnosa {
      margin-left: 1px;
      margin-right: 10px;
      max-height: 300px;
      overflow: auto;
      border: 3px linear-gradient(to right, #8269aa, #ccbbe4);
      letter-spacing: 2px;
      text-align: justify;
      background: linear-gradient(to left, #FFF, #EEE);
      padding: 20px;
    }

    .catatan {
      margin-left: 1px;
      margin-right: 10px;
      max-height: 300px;
      overflow: auto;
      border: 3px solid #9370db;
      letter-spacing: 2px;
      text-align: justify;
      background: #ccbbe4;
      padding: 20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1 class="text-center mt-5" style="color: #483d8b;" font-family: Poppins, sans-serif;>Hasil Diagnosis Gangguan Kecemasan</h1><br><br>
    <!-- /.card-header -->
			<div class="form">
				<table class="table table-hover">
					<thead class="th">
						<tr>
							<th style="width: 10%">No</th>
							<th style="width: 20%">Kode Gejala</th>
							<th style="width: 60%">Gejala yang Dialami</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$gejala = [];
						$no = 1;
            if (isset($_POST['evidence'])) { {
              $gejaladipilih = $_POST['evidence'];
              foreach ($gejaladipilih as $gjlplh) {
                $qry = mysqli_query($koneksi, "SELECT * FROM gejala WHERE kode_gejala='$gjlplh' ");
                while ($data = mysqli_fetch_array($qry)) {
                  echo "<tr>";
									echo "<td>" . $no . "</td>";
									echo "<td>" . $data['kode_gejala'] . "</td>";
									echo "<td align=justify>" . $data['nama_gejala'] . "</td>";

									$no+=1;
                }
              }
                }
              }
					?>
					</tbody>
				</table>
			</div>
			<!-- /.card-body -->
    <?php
    $koneksi = mysqli_connect("localhost", "root", "", "gangguankecemasan");

    // cek koneksi
    if (mysqli_connect_errno()) {
      echo "Koneksi database gagal : " . mysqli_connect_error();
    }
    
    ?>
    <?php
    $nama_pasien = $_POST['name'];
    $umur = $_POST['umur'];

    //Mengambil Nilai Belief Gejala yang Dipilih
    if (isset($_POST['evidence'])) { 
      
        $sql = "SELECT GROUP_CONCAT(gangguan.kode_gangguan), rule.nilai_densitas FROM rule 
                JOIN gangguan ON rule.kode_gangguan = gangguan.kode_gangguan WHERE rule.kode_gejala 
                IN('" . implode("','", $_POST['evidence']) . "') GROUP BY rule.kode_gejala";
                
        $result=$koneksi->query($sql);
        $gejala=array();
        while($row=$result->fetch_row()){
          $gejala[]=$row;
        }

        //--- menentukan environement
        $sql="SELECT GROUP_CONCAT(gangguan.kode_gangguan) FROM gangguan";
        $result=$koneksi->query($sql);
        $row=$result->fetch_row();
        $fod=$row[0];

        //--- menentukan nilai densitas
					$densitas_baru=array();
					while(!empty($gejala)){
						$densitas1[0]=array_shift($gejala);
						$densitas1[1]=array($fod,1-$densitas1[0][1]);
						$densitas2=array();
            if(empty($densitas_baru)){
							$densitas2[0]=array_shift($gejala);
						}
            else{
							foreach($densitas_baru as $k=>$r){
								if($k!="&theta;"){
									$densitas2[]=array($k,$r);
								}
							}
						}
						$theta=1;
						foreach($densitas2 as $d) $theta-=$d[1];
						$densitas2[]=array($fod,$theta);
						$m=count($densitas2);
						$densitas_baru=array();
						for($y=0;$y<$m;$y++){
							for($x=0;$x<2;$x++){
								if(!($y==$m-1 && $x==1)){
									$v=explode(',',$densitas1[$x][0]);
									$w=explode(',',$densitas2[$y][0]);
									sort($v);
									sort($w);
									$vw=array_intersect($v,$w);
									if(empty($vw)){
										$k="&theta;";
									}else{
										$k=implode(',',$vw);
									}
									if(!isset($densitas_baru[$k])){
										$densitas_baru[$k]=$densitas1[$x][1]*$densitas2[$y][1];
									}else{
										$densitas_baru[$k]+=$densitas1[$x][1]*$densitas2[$y][1];
									}
								}
							}
						}
						foreach($densitas_baru as $k=>$d){
							if($k!="&theta;"){
								$densitas_baru[$k]=$d/(1-(isset($densitas_baru["&theta;"])?$densitas_baru["&theta;"]:0));
							}
						}
        }

        //menentukan urutan penyakit
        // menghancurkan variabel yang ditentukan
        unset($densitas_baru["&theta;"]);
        // mengurutkan array berdasarkan nilai
        arsort($densitas_baru);

        $arrPenyakit = array();
        $qry = mysqli_query($koneksi, "SELECT * FROM gangguan");
        while ($data = mysqli_fetch_array($qry)) {
          $arrPenyakit["$data[kode_gangguan]"] = $data['nama_gangguan'];
        }
        $datasolusi = array();
        $datasolusi = array_intersect_key($arrPenyakit, $densitas_baru);
        foreach ($datasolusi as $k => $a) {
          foreach ($densitas_baru as $kdpenyakit => $ranking) {
            if ($k == $kdpenyakit) {
              //mengambil solusi penyakit
              $strS = mysqli_query($koneksi, "SELECT * FROM gangguan WHERE kode_gangguan='$k' ");
              $dataS = mysqli_fetch_array($strS);
            }
          }
        }

        //menampilkan hasil
        echo "<br>";
        echo "<p style = 'text-align:center;'>";
        $codes = array_keys($densitas_baru);
        $final_codes = explode(',', $codes[0]);
    
        $sql = "SELECT GROUP_CONCAT(nama_gangguan) FROM gangguan 
        WHERE kode_gangguan IN('" . implode("','", $final_codes) . "')";
        $result = $koneksi->query($sql);
        $row = $result->fetch_row();
        echo "<div class=\"diagnosa\">";
        echo "<p><b>Kesimpulan Hasil Diagnosa Awal Gangguan Kecemasan:</b></p>";
        echo "<p>Jenis gangguan kecemasan yang terdeteksi adalah <b>{$row[0] }</b> dengan derajat kepercayaan sebesar <b>" . round($densitas_baru[$codes[0]] * 100, 2) . "%</b></p>";
        echo "<br>";
        echo "<p><b>Solusi Penanganan dari {$row[0] }:</b></p>";
        echo "<p>" . $dataS['solusi'] . "</p>";
        echo "</div>";

        $querySimpanP = mysqli_query($koneksi, "INSERT INTO pasien (nama_pasien,umur,kode_gangguan,kode_gejala,hasil)
                        VALUES ('$nama_pasien','$umur','$final_codes[0]','".serialize($_POST['evidence'])."','". round($densitas_baru[$codes[0]] * 100, 2) ."') ");
      
      }
    ?><br>
    <div class="catatan">
      <p><i class="bi bi-exclamation-triangle"></i>
        <b>Catatan</b>
      </p>
      <p>
        Untuk memperoleh penatalaksanaan yang lebih spesifik, maka akan dilakukan pemeriksaan fisik lebih lanjut.
      </p>
    </div>
<br><br>
    <div class=" d-flex justify-content-center">
      <a href="./index.php" class="btn btn-danger btn-sm" style="padding: 6px 80px;"> <i class="bi bi-box-arrow-left"></i> Kembali</a>
    </div>
  </div>

</body>

</html>