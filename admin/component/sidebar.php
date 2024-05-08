<?php 
$currentFile = basename($_SERVER['PHP_SELF']);
?>

<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">
  <li class="nav-item">
    <a class="nav-link <?= ($currentFile != 'index.php') ? 'collapsed' : ''; ?>" href="../index.php">
      <i class="bi bi-house"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link <?= ($currentFile != 'pemodelan.php' && $currentFile != 'tambahpemodelan.php' && $currentFile != 'editpemodelan.php') ? 'collapsed' : ''; ?>" href="../pemodelan/pemodelan.php">
      <i class="bi bi-file-medical"></i>
      <span>Model Data</span>
    </a>
  </li><!-- End Components Nav -->

  <li class="nav-item">
    <a class="nav-link <?= ($currentFile != 'pernyataan.php' && $currentFile != 'tambahpernyataan.php' && $currentFile != 'editpernyataan.php') ? 'collapsed' : ''; ?>" href="../pernyataan/pernyataan.php">
      <i class="bi bi-eyedropper"></i>
      <span>Pernyataan</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link <?= ($currentFile != 'rules.php' && $currentFile != 'tambahrules.php' && $currentFile != 'editrules.php') ? 'collapsed' : ''; ?>" href="../rules/rules.php">
      <i class="bi bi-diagram-3"></i>
      <span>Basis Pengetahuan</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
    <a class="nav-link <?= ($currentFile != 'konsultasi.php' && $currentFile != 'detail.php') ? 'collapsed' : ''; ?>" href="../konsultasi/konsultasi.php">
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