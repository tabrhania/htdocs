<?php ?>
<ul class="sidebar navbar-nav">
      <li class="nav-item <?php if($this->uri->segment(1)=="dashboard"){echo 'nav-item active';} ?>">
        <a class="nav-link" href="<?php echo base_url ("dashboard");?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
        
      </li>
      <li class="nav-item dropdown<?php if($this->uri->segment(2)=="barang"){echo 'list-item active';} ?>" >
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Master</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo base_url ("admin/barang");?>">Barang</a>
          <a class="dropdown-item">Karyawan</a>
          <a class="dropdown-item">User</a>
          <a class="dropdown-item">Supplier</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Transaksi</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" >Penjualan</a>
          <a class="dropdown-item" >Pembelian</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-table"></i>
          <span>Laporan</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" >Laporan Harian </a>
          <a class="dropdown-item" >Laporan Bulanan </a>
          <a class="dropdown-item" >Laporan Tahunan</a>
        </div>
    </ul>