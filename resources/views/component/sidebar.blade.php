<!-- Sidebar inner slimmscroll -->
<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
      <ul>
        <!-- MAIN -->
        <li class="submenu-open">
          <h6 class="submenu-hdr">DASHBOARD</h6>
          <ul>
            <li class="menu-tunggal">
    <a href="{{ route('penjual.dashboard') }}">
        <i data-feather="trending-up"></i>
        <span>Dashboard</span>
    </a>
</li>

<li class="menu-tunggal">
    <a href="{{ route('penjual.laporan') }}">
        <i data-feather="percent"></i>
        <span>Laporan Penjualan</span>
    </a>
</li>

<li class="menu-tunggal">
    <a href="{{ route('penjual.pos') }}">
        <i data-feather="bar-chart"></i>
        <span>Kasir</span>
    </a>
</li>

<li class="menu-tunggal">
    <a href="{{ route('penjual.produk') }}">
        <i data-feather="bar-chart"></i>
        <span>Kelola Stok</span>
    </a>
</li>

          </ul>
        </li>

      </ul>
    </div>
  </div>
</div>
<!-- /Sidebar -->