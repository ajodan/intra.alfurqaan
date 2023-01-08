<nav class="pcoded-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
            <a href="" class="b-brand">
                <div class="b-bg">
                    <i class="feather icon-trending-up"></i>
                </div>
                <span class="b-title">INTRA</span>
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
        </div>
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">
                @if(auth()->user()->level=='admin')
                <li class="nav-item pcoded-menu-caption">
                    <label>Menu Admin</label>
                </li>

                <li class="nav-item {{ Request::is('admin') || Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Beranda</span></a>
                </li>

                <!-- <li class="nav-item {{ Request::is('admin/laporan') ? 'active' : '' }}">
                    <a href="{{ route('admin.laporan.index') }}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file"></i></span><span class="pcoded-mtext">Generate Laporan</span></a>
                </li> -->
                <li class="nav-item {{ Request::is('admin') ? 'active' : '' }} pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Manage Data</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="{{ route('admin.user.index') }}" class="">Pengguna</a></li>
                        <li class=""><a href="{{ route('admin.level.index') }}" class="">Level</a></li>
                        <li class=""><a href="{{ route('admin.jabatan.index') }}" class="">Jabatan</a></li>
                        <li class=""><a href="{{ route('admin.pengurus.index') }}" class="">Pengurus</a></li>
                        <li class=""><a href="{{ route('admin.jamaah.index') }}" class="">Jamaah</a></li>
                        <li class=""><a href="{{ route('admin.rekening.index') }}" class="">Rekening</a></li>
                        <li class=""><a href="{{ route('admin.peranmubaligh.index') }}" class="">Peran Mubaligh</a></li>
                        <li class=""><a href="{{ route('admin.yatimduafa.index') }}" class="">Yatim Duafa</a></li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('bmm') ? 'active' : '' }} pcoded-menu-caption">
                    <label>Menu Tabungan</label>
                </li>

                <li class="nav-item {{ Request::segment(1) == 'transaksi' ? 'active' : '' }}">
                    <a href="{{ route('transaksi.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Transaksi</span></a>
                </li>
                <li class="nav-item {{ Request::segment(1) == 'transaksi' ? '' : '' }}">
                    <a href="{{ route('laporan.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Laporan</span></a>
                </li>
                <li class="nav-item {{ Request::is('bendahara') ? 'active' : '' }} pcoded-menu-caption">
                    <label>Menu Kas Masjid</label>
                </li>

                <li class="nav-item {{ Request::segment(1) == 'kasmasjid' ? 'active' : '' }}">
                    <a href="{{ route('kasmasjid.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Transaksi</span></a>
                </li>
                <li class="nav-item {{ Request::segment(1) == 'jenistransaksi' ? 'active' : '' }}">
                    <a href="{{ route('jenistransaksi.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Jenis Transaksi</span></a>
                </li>

                <li class="nav-item {{ Request::is('ibadah') ? 'active' : '' }} pcoded-menu-caption">
                    <label>Menu Kegiatan</label>
                </li>

                <li class="nav-item {{ Request::segment(1) == 'jeniskegiatan' ? 'active' : '' }}">
                    <a href="{{ route('jeniskegiatan.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Jenis Kegiatan</span></a>
                </li>
                <li class="nav-item {{ Request::segment(1) == 'mubaligh' ? 'active' : '' }}">
                    <a href="{{ route('mubaligh.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Mubaligh</span></a>
                </li>
                <li class="nav-item {{ Request::segment(1) == 'kegiatan' ? 'active' : '' }}">
                    <a href="{{ route('kegiatan.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Kegiatan</span></a>
                </li>

                <li class="nav-item {{ Request::is('ibadah') ? 'active' : '' }} pcoded-menu-caption">
                    <label>Menu Kajian</label>
                </li>
                <li class="nav-item {{ Request::segment(1) == 'kajian' ? 'active' : '' }}">
                    <a href="{{ route('topikkajian.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Topik Kajian</span></a>
                </li>
                <li class="nav-item {{ Request::segment(1) == 'kajian' ? 'active' : '' }}">
                    <a href="{{ route('kajian.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Kajian</span></a>
                </li>




                @endif

                @if(auth()->user()->level=='bmm')
                <li class="nav-item {{ Request::is('bmm') ? 'active' : '' }} pcoded-menu-caption">
                    <label>Menu Tabungan</label>
                </li>

                <li class="nav-item {{ Request::segment(1) == 'transaksi' ? 'active' : '' }}">
                    <a href="{{ route('transaksi.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Transaksi</span></a>
                </li>

                @endif

                @if(auth()->user()->level=='bendahara')
                <li class="nav-item {{ Request::is('bendahara') ? 'active' : '' }} pcoded-menu-caption">
                    <label>Menu Kas Masjid</label>
                </li>

                <li class="nav-item {{ Request::segment(1) == 'kasmasjid' ? 'active' : '' }}">
                    <a href="{{ route('kasmasjid.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Transaksi</span></a>
                </li>
                <li class="nav-item {{ Request::segment(1) == 'jenistransaksi' ? 'active' : '' }}">
                    <a href="{{ route('jenistransaksi.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Jenis Transaksi</span></a>
                </li>
                @endif

                @if(auth()->user()->level=='jamaah')
                <li class="nav-item pcoded-menu-caption">
                    <label>Menu Tabungan</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('jamaah.transfer.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Transfer</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('jamaah.transfer.histori') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Histori Transfer</span></a>
                </li>
                @endif

                <li class="nav-item {{ Request::is('') ? 'active' : '' }} pcoded-menu-caption">
                    <label>Menu Umum</label>
                </li>

                <li class="nav-item {{ Request::is('user/home') ? 'active' : '' }}">
                    <a href="{{ route('user.home') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Home</span></a>
                </li>
                <li class="nav-item {{ Request::is('user/profile') ? 'active' : '' }}">
                    <a href="{{ route('user.profile.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Profile</span></a>
                </li>
                <li class="nav-item {{ Request::is('user/change-password') ? 'active' : '' }}">
                    <a href="{{ route('user.change-password.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-unlock"></i></span><span class="pcoded-mtext">Ubah Password</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>