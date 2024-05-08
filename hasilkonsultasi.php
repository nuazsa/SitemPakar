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
    <h1 class="text-center mt-5" style="color: #483d8b;" font-family: Poppins, sans-serif;>Hasil Penentuan Model Data</h1><br><br>
    <!-- /.card-header -->
			<div class="form">
				<table class="table table-hover">
					<thead class="th">
						<tr>
							<th style="width: 10%">No</th>
							<th style="width: 20%">Kode</th>
							<th style="width: 60%">Pernyataan</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$pernyataan = [];
						$no = 1;
            if (isset($_POST['evidence'])) { {
              $pernyataandipilih = $_POST['evidence'];
              foreach ($pernyataandipilih as $gjlplh) {
                $qry = mysqli_query($koneksi, "SELECT * FROM pernyataan WHERE kode_pernyataan='$gjlplh' ");
                while ($data = mysqli_fetch_array($qry)) {
                  echo "<tr>";
									echo "<td>" . $no . "</td>";
									echo "<td>" . $data['kode_pernyataan'] . "</td>";
									echo "<td align=justify>" . $data['nama_pernyataan'] . "</td>";

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
    $nama_klien = $_POST['name'];
    $umur = $_POST['umur'];

    //Mengambil Nilai Belief pernyataan yang Dipilih
    if (isset($_POST['evidence'])) { 
      
        $sql = "SELECT GROUP_CONCAT(model.kode_model), rule.nilai_densitas FROM rule 
                JOIN model ON rule.kode_model = model.kode_model WHERE rule.kode_pernyataan 
                IN('" . implode("','", $_POST['evidence']) . "') GROUP BY rule.kode_pernyataan";
                
        $result=$koneksi->query($sql);
        $pernyataan=array();
        while($row=$result->fetch_row()){
          $pernyataan[]=$row;
        }

        //--- menentukan environement
        $sql="SELECT GROUP_CONCAT(model.kode_model) FROM model";
        $result=$koneksi->query($sql);
        $row=$result->fetch_row();
        $fod=$row[0];

        //--- menentukan nilai densitas
					$densitas_baru=array();
					while(!empty($pernyataan)){
						$densitas1[0]=array_shift($pernyataan);
						$densitas1[1]=array($fod,1-$densitas1[0][1]);
						$densitas2=array();
            if(empty($densitas_baru)){
							$densitas2[0]=array_shift($pernyataan);
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

        //menentukan urutan model
        // menghancurkan variabel yang ditentukan
        unset($densitas_baru["&theta;"]);
        // mengurutkan array berdasarkan nilai
        arsort($densitas_baru);

        $arrPenyakit = array();
        $qry = mysqli_query($koneksi, "SELECT * FROM model");
        while ($data = mysqli_fetch_array($qry)) {
          $arrPenyakit["$data[kode_model]"] = $data['nama_model'];
        }
        $datasolusi = array();
        $datasolusi = array_intersect_key($arrPenyakit, $densitas_baru);
        foreach ($datasolusi as $k => $a) {
          foreach ($densitas_baru as $kdpenyakit => $ranking) {
            if ($k == $kdpenyakit) {
              //mengambil solusi penyakit
              $strS = mysqli_query($koneksi, "SELECT * FROM model WHERE kode_model='$k' ");
              $dataS = mysqli_fetch_array($strS);
            }
          }
        }

        //menampilkan hasil
        echo "<br>";
        echo "<p style = 'text-align:center;'>";
        $codes = array_keys($densitas_baru);
        $final_codes = explode(',', $codes[0]);
    
        $sql = "SELECT GROUP_CONCAT(nama_model) FROM model 
        WHERE kode_model IN('" . implode("','", $final_codes) . "')";
        $result = $koneksi->query($sql);
        $row = $result->fetch_row();

        $querySimpanP = mysqli_query($koneksi, "INSERT INTO klien (nama_klien,umur,kode_model,kode_pernyataan,hasil)
                        VALUES ('$nama_klien','$umur','$final_codes[0]','".serialize($_POST['evidence'])."','". round($densitas_baru[$codes[0]] * 100, 2) ."') ");
        // Mendapatkan ID dari data yang baru saja di-insert
        $id_baru = mysqli_insert_id($koneksi);

        $result = $koneksi->query("SELECT * FROM klien JOIN model ON klien.kode_model = model.kode_model WHERE id_klien='$id_baru'");

        $no = 1;
        while($row1 = mysqli_fetch_array($result)):
            $solusi = $row1['solusi'];
          $no++;
        endwhile;
                  
        echo "<div class=\"diagnosa\">";
        echo "<p><b>Kesimpulan Hasil Penentuan Model Data:</b></p>";
        echo "<p>Jenis model data yang cocok adalah <b>{$row[0] }</b> dengan derajat kepercayaan sebesar <b>" . round($densitas_baru[$codes[0]] * 100, 2) . "%</b></p>";
        echo "<br>";
        echo "<p><b>Penjelasan & Saran {$row[0] }:</b></p>";
        echo "<p>" . $solusi . "</p>";
        echo "</div>";
    
      
      }
    ?><br>
    <div class="catatan">
      <p><i class="bi bi-exclamation-triangle"></i>
        <b>Catatan</b>
      </p>
      <p>
        Untuk memperoleh penatalaksanaan yang lebih spesifik, maka lakukan diskusi lebih lanjut dengan Administrator Basis Data.
      </p>
    </div>
<br><br>
    <div class=" d-flex justify-content-center">
      <a href="./index.php" class="btn btn-danger btn-sm" style="padding: 6px 80px;"> <i class="bi bi-box-arrow-left"></i> Kembali</a>
    </div>
  </div>

</body>

</html>