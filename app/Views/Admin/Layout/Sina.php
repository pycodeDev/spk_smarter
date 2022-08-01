  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
          </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                  <?= $_SESSION['name']; ?>
                  <i class="far fa-user"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                  <span class="dropdown-item dropdown-header">Menu User</span>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                      <i class="fas fa-key mr-1"></i> Change Password
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="/logout" class="dropdown-item">
                      <i class="fas fa-sign-out-alt mr-1"></i> Logout
                  </a>
                  <div class="dropdown-divider"></div>
                  <!-- <a href="#" class="dropdown-item dropdown-footer">See All Notifications</!-->
              </div>
          </li>
          <li class="nav-item">
              <a class="nav-link" data-widget="control-sidebar" style="display:none;" data-slide="true" href="#">
                  <i class="fas fa-th-large"></i>
              </a>
          </li>
      </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">SPK TrakNus</span>
      </a>

      <?php
        $uri = current_url(true);
        $a =  (string)$uri;
        $a = explode("/", $a);
        ?>

      <!-- Sidebar -->
      <div class="sidebar">

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item has-treeview ">
                      <a href="/dashboard" class="nav-link <?= $a[3] == 'dashboard' ? 'active' : '' ?>">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>
                  <li class="nav-item has-treeview ">
                      <a href="/profil" class="nav-link <?= $a[3] == 'profil' ? 'active' : '' ?>">
                          <i class="nav-icon fas fa-user"></i>
                          <p>
                              Profil
                          </p>
                      </a>
                  </li>
                  <li class="nav-item has-treeview ">
                      <a href="/produk" class=" nav-link <?= $a[3] == 'produk' ? 'active' : '' ?>">
                          <i class="nav-icon fab fa-product-hunt"></i>
                          <p>
                              Kelola Produk
                          </p>
                      </a>
                  </li>
                  <li class="nav-item has-treeview ">
                      <a href="/stok" class="nav-link <?= $a[3] == 'stok' ? 'active' : '' ?>">
                          <i class="nav-icon fas fa-store-alt"></i>
                          <p>
                              Stok Produk
                          </p>
                      </a>
                  </li>
                  <li class="nav-item has-treeview ">
                      <a href="/produk_masuk" class="nav-link <?= $a[3] == 'produk_masuk' ? 'active' : '' ?>">
                          <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                          <p>
                              Kelola Produk Masuk
                          </p>
                      </a>
                  </li>
                  <li class="nav-item has-treeview ">
                      <a href="/produk_keluar" class="nav-link <?= $a[3] == 'produk_keluar' ? 'active' : '' ?>">
                          <i class="nav-icon fas fa-dollar-sign "></i>
                          <p>
                              Kelola Transaksi Penjualan
                          </p>
                      </a>
                  </li>
                  <li class="nav-item has-treeview <?= $a[3] == 'kriteria' || $a[3] == 'sub_kriteria' || $a[3] == 'alternatif' || $a[3] == 'rank' ? 'menu-open' : '' ?>">
                      <a href="#" class="nav-link ">
                          <i class="nav-icon fas fa-fw fa-chart-area"></i>
                          <p>
                              Perangkingan Produk
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="/kriteria" class="nav-link <?= $a[3] == 'kriteria' ? 'active' : '' ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Kriteria</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="/sub_kriteria" class="nav-link <?= $a[3] == 'sub_kriteria' ? 'active' : '' ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Sub Kriteria</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="/alternatif" class="nav-link <?= $a[3] == 'alternatif' ? 'active' : '' ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Alternatif</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="/rank" class="nav-link <?= $a[3] == 'rank' ? 'active' : '' ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Perangkingan</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item has-treeview ">
                      <a href="/laporan" class="nav-link <?= $a[3] == 'laporan' ? 'active' : '' ?>">
                          <i class="nav-icon fas fa-copy "></i>
                          <p>
                              Laporan
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>