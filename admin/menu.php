<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <!-- <a href="index3.html" class="nav-link">Home</a> -->
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 green">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="../resources/images/rj.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin | Dashboard</span>
    </a>
<!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

              <li class="nav-item" style="border-bottom: 1px solid #4b545c;">
                <a href="#" class="nav-link" style="border-radius: 24px 4px;">
                  <img src="dist/img/me.jpg" class="img-circle elevation-2" alt="User Image" style="width: 2.1rem;">
                  <p>
                    Faiz Daffa
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="logout.php" class="nav-link" style="border-radius: 24px 4px;">
                      <i class="nav-icon fas fa-sign-out-alt"></i>
                      <p>
                        Logout
                      </p>
                    </a>
                  </li>
                </ul>
              </li>
              <br>
              <li class="nav-item">
                <a href="index.php" class="nav-link <?php if($page=='home'){echo 'aktif';} ?>" style="border-radius: 24px 4px;">
                  <i class="fas fa-home nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
               <li class="nav-item <?php if($open=='dashboard'){echo 'menu-open';} ?>">
                  <a href="#" class="nav-link" style="border-radius: 24px 4px;">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Dashboard
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="datamurid.php" class="nav-link <?php if($page=='datamurid'){echo 'aktif';} ?>" style="border-radius: 24px 4px;">
                        <i class="fas fa-database nav-icon"></i>
                        <p>Data Murid</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="absensi.php" class="nav-link <?php if($page=='absensi'){echo 'aktif';} ?>" style="border-radius: 24px 4px;">
                        <i class="fas fa-book nav-icon"></i>
                        <p>Absen Hari Ini</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="absensifull.php" class="nav-link <?php if($page=='absensifull'){echo 'aktif';} ?>" style="border-radius: 24px 4px;">
                        <i class="fas fa-book nav-icon"></i>
                        <p>Rekapitulasi Absensi</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="scan.php" class="nav-link <?php if($page=='scan'){echo 'aktif';} ?>" style="border-radius: 24px 4px;">
                        <i class="fas fa-barcode nav-icon"></i>
                        <p>Scan Kartu</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="Prosesdata.php" class="nav-link <?php if($page=='pd'){echo 'aktif';} ?>" style="border-radius: 24px 4px;">
                        <i class="fas fa-calculator nav-icon"></i>
                        <p>Hitung K-Means</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="chart.php" class="nav-link <?php if($page=='chart'){echo 'aktif';} ?>"style="border-radius: 24px 4px;">
                        <i class="fas fa-chart-pie nav-icon"></i>
                        <p>Hasil Hitung K-Means</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link <?php if($open=='data_master'){echo 'menu-open';} ?>" style="border-radius: 24px 4px;">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Data Master
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="guru/index.php" class="nav-link <?php if($page=='guru'){echo 'aktif';} ?>" style="border-radius: 24px 4px;">
                        <i class="fas fa-home nav-icon"></i>
                        <p>Data Guru</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="jurusan/index.php" class="nav-link <?php if($page=='jurusan'){echo 'aktif';} ?>" style="border-radius: 24px 4px;">
                        <i class="fas fa-database nav-icon"></i>
                        <p>Data Jurusan</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="ekskul/index.php" class="nav-link <?php if($page=='ekskul'){echo 'aktif';} ?>" style="border-radius: 24px 4px;">
                        <i class="fas fa-book nav-icon"></i>
                        <p>Data Ekskul</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item <?php if($open=='artikel'){echo 'menu-open';} ?>">
                  <a href="#" class="nav-link" style="border-radius: 24px 4px;">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Artikel
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="kategori_artikel/index.php" class="nav-link <?php if($page=='kategori'){echo 'aktif';} ?>" style="border-radius: 24px 4px;">
                        <i class="fas fa-home nav-icon"></i>
                        <p>Data Kategori Artikel</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="artikel/index.php" class="nav-link <?php if($page=='artikel'){echo 'aktif';} ?>" style="border-radius: 24px 4px;">
                        <i class="fas fa-database nav-icon"></i>
                        <p>Data Artikel</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                <a href="visi_misi.php" class="nav-link <?php if($page=='visi'){echo 'aktif';} ?>" style="border-radius: 24px 4px;">
                  <i class="nav-icon fas fa-file"></i>
                  <p>Visi-Misi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="bukutamu.php" class="nav-link <?php if($page=='buku'){echo 'aktif';} ?>" style="border-radius: 24px 4px;">
                  <i class="nav-icon fas fa-file"></i>
                  <p>Buku Tamu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tentang_website.php" class="nav-link <?php if($page=='tw'){echo 'aktif';} ?>" style="border-radius: 24px 4px;">
                  <i class="nav-icon fas fa-file"></i>
                  <p>Tentang Website</p>
                </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      </div>
    <!-- /.sidebar -->
  </aside>