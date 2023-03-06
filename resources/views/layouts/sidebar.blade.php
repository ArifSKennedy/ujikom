<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <i class="nav-icon far fa fa-cube"></i>
        <span class="brand-text font-weight-light">Market</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url(auth()->user()->foto ?? '') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                            <span class="right badge badge-primary">Grafik</span>
                        </p>
                    </a>
                </li>
                        
                {{-- Menu Master --}}
                @if (auth()->user()->level == 1)
                <li class="nav-header">Master</li>
                <li class="nav-item">
                    <a href="{{ route('kategori.index') }}" class="nav-link">
                        <i class="nav-icon far fa fa-cube"></i>
                        <p>Kategori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('produk.index') }}" class="nav-link">
                        <i class="nav-icon far fa fa-cubes"></i>
                        <p>Produk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('member.index') }}" class="nav-link">
                        <i class="nav-icon far fa fa-credit-card"></i>
                        <p>Member</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('supplier.index') }}" class="nav-link">
                        <i class="nav-icon far fa fa-truck"></i>
                        <p>Supplier</p>
                    </a>
                </li>
                {{-- end master --}}

                <li class="nav-header">Transaksi</li>
                <li class="nav-item">
                    <a href="{{ route('pengeluaran.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-tint"></i>
                        <p>Pengeluaran</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pembelian.index') }}" class="nav-link">
                        <i class="nav-icon far fa fa-download"></i>
                        <p>Pembelian</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('penjualan.index') }}" class="nav-link">
                        <i class="nav-icon far fa fa-shopping-cart"></i>
                        <p>Penjualan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('transaksi.index') }}" class="nav-link">
                        <i class="nav-icon far fa fa-cart-arrow-down"></i>
                        <p>Transaksi Aktif</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('transaksi.baru') }}" class="nav-link">
                        <i class="nav-icon far fa fa-plus" aria-hidden="true"></i>
                        <p>Transaksi Baru</p>
                    </a>
                </li>
                

                <li class="nav-header">Report</li>
                <li class="nav-item">
                    <a href="{{ route('laporan.index') }}" class="nav-link">
                        <i class="nav-icon far fa fa-paper-plane"></i>
                        <p>Laporan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link">
                        <i class="nav-icon far fa fa-users"></i>
                        <p>User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('setting.index') }}" class="nav-link">
                        <i class="nav-icon far fa fa-users"></i>
                        <p>Setting</p>
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('transaksi.index') }}" class="nav-link">
                        <i class="nav-icon far fa fa-cart-arrow-down"></i>
                        <p>Transaksi Aktif</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('transaksi.baru') }}" class="nav-link">
                        <i class="nav-icon far fa fa-plus" aria-hidden="true"></i>
                        <p>Transaksi Baru</p>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
