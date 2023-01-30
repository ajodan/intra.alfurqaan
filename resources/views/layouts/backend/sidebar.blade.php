<nav class="pcoded-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
            <a href="" class="b-brand">
                {{-- <div class="b-bg">
                    <i class="feather icon-trending-up"></i>
                </div> --}}
                <span class="b-title"><b>INTRA AL-FURQAAN</b></span>
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
        </div>
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">
                @if(auth()->user()->level=='admin')
                <li class="nav-item pcoded-menu-caption">
                    <label>Menu Admin</label>
                </li>
<!-- Role Admin -->
                <li class="nav-item {{ Request::is('admin') || Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Beranda</span></a>
                </li>

                <!-- <li class="nav-item {{ Request::is('admin/laporan') ? 'active' : '' }}">
                    <a href="{{ route('admin.laporan.index') }}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file"></i></span><span class="pcoded-mtext">Generate Laporan</span></a>
                </li> -->
                <li class="nav-item {{ Request::is('admin') ? 'active' : '' }} pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Master Data</span></a>
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
                 <!-- Role Rumatangga -->
                 <li class="nav-item {{ Request::is('dakwah') ? 'active' : '' }} pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Aset/Inventaris</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="{{ route('jenisaset.index') }}" class="">Jenis Inventaris</a></li>
                            <li class=""><a href="{{ route('namaaset.index') }}" class="">Nama Aset</a></li>
                            <li class=""><a href="{{ route('aset.index') }}" class="">Aset/Inventaris</a></li>
                        </ul>
                </li>
                 <!-- Role BMM -->
                 <li class="nav-item {{ Request::is('bmm') ? 'active' : '' }} pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext"></span>Kas Baitul Maal</a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="{{ route('kasbmm.index') }}" class="">Transaksi</a></li>
                            <li class=""><a href="{{ route('jenistransaksibmm.index') }}" class="">Jenis Transaksi</a></li>
                            <li class=""><a href="{{ route('transaksi.index') }}" class="">Tabungan</a></li>
                            <li class=""><a href="{{ route('laporan.index') }}" class="">Laporan Tabungan</a></li>
                        </ul>
                </li>
                 <!-- Role Bendahara -->
                 <li class="nav-item {{ Request::is('bendahara') ? 'active' : '' }} pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext"></span>Kas Masjid</a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="{{ route('kasmasjid.index') }}" class="">Transaksi</a></li>
                            <li class=""><a href="{{ route('jenistransaksi.index') }}" class="">Jenis Transaksi</a></li>
                        </ul>
                </li>
                <!-- Role Pendidikan dan Dakwah -->
                <li class="nav-item {{ Request::is('dakwah') ? 'active' : '' }} pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Kegiatan</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="{{ route('jeniskegiatan.index') }}" class="">Jenis Kegiatan</a></li>
                            <li class=""><a href="{{ route('kategori.index') }}" class="">Kategori Artikel</a></li>
                            <li class=""><a href="{{ route('mubaligh.index') }}" class="">Mubaligh/Ustadz</a></li>
                            <li class=""><a href="{{ route('kegiatan.index') }}" class="">Agenda Kegiatan</a></li>
                            <li class=""><a href="{{ route('jadwaljumat.index') }}" class="">Jadwal Jumat</a></li>
                            <li class=""><a href="{{ route('artikel.index') }}" class="">Artikel/Berita</a></li>
                        </ul>
                    </li>
                 <!-- Role Pendidikan dan Dakwah -->
                <li class="nav-item {{ Request::is('dakwah') ? 'active' : '' }} pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Kajian</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="{{ route('topikkajian.index') }}" class="">Topik Kajian</a></li>
                            <li class=""><a href="{{ route('kajian.index') }}" class="">Kajian</a></li>
                        </ul>
                </li>
                @endif

<!-- Menu Role HUMASTI -->
                @if(auth()->user()->level=='humasti')
                  <!-- Role Rumatangga -->
                  <li class="nav-item {{ Request::is('dakwah') ? 'active' : '' }} pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Aset/Inventaris</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="{{ route('jenisaset.index') }}" class="">Jenis Inventaris</a></li>
                            <li class=""><a href="{{ route('namaaset.index') }}" class="">Nama Aset</a></li>
                            <li class=""><a href="{{ route('aset.index') }}" class="">Aset/Inventaris</a></li>
                        </ul>
                </li>
                <!-- Role Pendidikan dan Dakwah -->
                <li class="nav-item {{ Request::is('dakwah') ? 'active' : '' }} pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Kegiatan</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="{{ route('jeniskegiatan.index') }}" class="">Jenis Kegiatan</a></li>
                            <li class=""><a href="{{ route('kategori.index') }}" class="">Kategori Artikel</a></li>
                            <li class=""><a href="{{ route('mubaligh.index') }}" class="">Mubaligh/Ustadz</a></li>
                            <li class=""><a href="{{ route('kegiatan.index') }}" class="">Agenda Kegiatan</a></li>
                            <li class=""><a href="{{ route('jadwaljumat.index') }}" class="">Jadwal Jumat</a></li>
                            <li class=""><a href="{{ route('artikel.index') }}" class="">Artikel/Berita</a></li>
                            
                        </ul>
                    </li>
                 <!-- Role Pendidikan dan Dakwah -->
                  <li class="nav-item {{ Request::is('dakwah') ? 'active' : '' }} pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Kajian</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="{{ route('topikkajian.index') }}" class="">Topik Kajian</a></li>
                            <li class=""><a href="{{ route('kajian.index') }}" class="">Kajian</a></li>
                        </ul>
                </li>
                @endif

<!-- Menu Role bph -->
            @if(auth()->user()->level=='bph')
                <!-- Role Bendahara -->
                <li class="nav-item {{ Request::is('bendahara') ? 'active' : '' }} pcoded-hasmenu">
                <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Kas Masjid</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="{{ route('jenistransaksi.index') }}" class="">Jenis Transaksi</a></li>
                        <li class=""><a href="{{ route('kasmasjid.index') }}" class="">Transaksi</a></li>
                        <li class=""><a href="https://drive.google.com/file/d/16XTAFjGHri3Fj3CZ3R_Kq7--pqydujQW/view" target="_blank"" class="">Panduan Bendahara</a></li>
                    </ul>
                </li>

                <!-- Role BMM -->
                <li class="nav-item {{ Request::is('bmm') ? 'active' : '' }} pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Menu Tabungan</span></a>
                        <ul class="pcoded-submenu">
                            <li class="nav-item {{ Request::segment(1) == 'transaksi' ? '' : '' }}">
                                <a href="{{ route('transaksi.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Transaksi</span></a>
                            </li>
                            <li class="nav-item {{ Request::segment(1) == 'transaksi' ? '' : '' }}">
                                <a href="{{ route('laporan.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Laporan</span></a>
                            </li>       
                        </ul>
                </li>
                <li class="nav-item {{ Request::is('bmm') ? 'active' : '' }} pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Menu Kas BMM</span></a>
                        <ul class="pcoded-submenu">
                            <li class="nav-item {{ Request::segment(1) == 'kasbmm' ? '' : '' }}">
                                <a href="{{ route('transaksi.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Transaksi</span></a>
                            </li>
                            <li class="nav-item {{ Request::segment(1) == 'transaksi' ? '' : '' }}">
                                <a href="{{ route('laporan.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Laporan</span></a>
                            </li>  
                            <li class="nav-item {{ Request::segment(1) == 'kasbmm' ? '' : '' }}">
                                <a href="{{ route('kasbmm.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Transaksi</span></a>
                            </li>
            
                            <li class="nav-item {{ Request::segment(1) == 'jenistransaksibmm' ? '' : '' }}">
                                <a href="{{ route('jenistransaksibmm.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Jenis Transaksi</span></a>
                            </li>
                            <li class="nav-item {{ Request::segment(1) == 'jenistransaksibmm' ? '' : '' }}">
                                <a href="https://drive.google.com/file/d/10eqInMmbKRY5Yhi5yn7FX0gGwMed7BWE/view" target="_blank" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Panduan BMM</span></a>
                            </li> 
                        </ul>
                </li>
                
                <li class="nav-item {{ Request::is('rumahtangga') ? 'active' : '' }} pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Aset/Inventaris</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="{{ route('jenisaset.index') }}" class="">Jenis Inventaris</a></li>
                            <li class=""><a href="{{ route('namaaset.index') }}" class="">Nama Aset</a></li>
                            <li class=""><a href="{{ route('aset.index') }}" class="">Aset/Inventaris</a></li>
                            <li class=""><a href="https://drive.google.com/file/d/1wZ5a09Xs7UW24ZTNo7q4LHAuNVSywNwS/view" target="_blank" " class="">Panduan Rumah Tangga</a></li>
                        </ul>
                    </li>
                <!-- Role Pendidikan dan Dakwah -->
                <li class="nav-item {{ Request::is('dakwah') ? 'active' : '' }} pcoded-hasmenu">
                <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Kegiatan</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="{{ route('jeniskegiatan.index') }}" class="">Jenis Kegiatan</a></li>
                        <li class=""><a href="{{ route('kategori.index') }}" class="">Kategori Artikel</a></li>
                        <li class=""><a href="{{ route('mubaligh.index') }}" class="">Mubaligh/Ustadz</a></li>
                        <li class=""><a href="{{ route('kegiatan.index') }}" class="">Agenda Kegiatan</a></li>
                        <li class=""><a href="{{ route('jadwaljumat.index') }}" class="">Jadwal Jumat</a></li>
                        <li class=""><a href="{{ route('artikel.index') }}" class="">Artikel/Berita</a></li>
                    </ul>
                </li>
                <!-- Role Pendidikan dan Dakwah -->
                <li class="nav-item {{ Request::is('dakwah') ? 'active' : '' }} pcoded-hasmenu">
                <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Kajian</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="{{ route('topikkajian.index') }}" class="">Topik Kajian</a></li>
                        <li class=""><a href="{{ route('kajian.index') }}" class="">Kajian</a></li>
                        <li class=""><a href="https://drive.google.com/file/d/1EHG6Wi2_lxCuRXjkiH3uLSyFPzFYAE1h/view" target="_blank"" class="">Panduan Ibadah & Dakwah </a></li>
                       
                    </ul>
                </li>
            @endif

<!-- Menu Role BMM -->
            @if(auth()->user()->level=='bmm')
                <li class="nav-item {{ Request::is('bmm') ? 'active' : '' }} pcoded-menu-caption">
                    <label>Menu Tabungan</label>
                </li>
                <li class="nav-item {{ Request::segment(1) == 'transaksi' ? '' : '' }}">
                    <a href="{{ route('transaksi.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Transaksi</span></a>
                </li>
                <li class="nav-item {{ Request::segment(1) == 'transaksi' ? '' : '' }}">
                    <a href="{{ route('laporan.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Laporan</span></a>
                </li>

                <li class="nav-item {{ Request::is('bmm') ? 'active' : '' }} pcoded-menu-caption">
                    <label>Menu Kas BMM</label>
                </li>

                <li class="nav-item {{ Request::segment(1) == 'kasbmm' ? '' : '' }}">
                    <a href="{{ route('kasbmm.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Transaksi</span></a>
                </li>

                <li class="nav-item {{ Request::segment(1) == 'jenistransaksibmm' ? '' : '' }}">
                    <a href="{{ route('jenistransaksibmm.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Jenis Transaksi</span></a>
                </li>
                <li class="nav-item {{ Request::segment(1) == 'download' ? '' : '' }}">
                    <a href="https://drive.google.com/file/d/10eqInMmbKRY5Yhi5yn7FX0gGwMed7BWE/view" target="_blank" class="btn btn-large pull-right"><i class="icon-download-alt"> </i> Download Panduan </a>
                </li>
            @endif
<!-- Menu Role Bendahara DKM -->
                @if(auth()->user()->level=='bendahara')
                <li class="nav-item {{ Request::is('bendahara') ? 'active' : '' }} pcoded-menu-caption">
                    <label>Menu Kas Masjid</label>
                </li>
                <li class="nav-item {{ Request::segment(1) == 'jenistransaksi' ? '' : '' }}">
                    <a href="{{ route('jenistransaksi.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Jenis Transaksi</span></a>
                </li>
                <li class="nav-item {{ Request::segment(1) == 'kasmasjid' ? '' : '' }}">
                    <a href="{{ route('kasmasjid.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Transaksi</span></a>
                </li>
                <li class="nav-item {{ Request::segment(1) == 'download' ? '' : '' }}">
                    <a href="https://drive.google.com/file/d/16XTAFjGHri3Fj3CZ3R_Kq7--pqydujQW/view" target="_blank" class="btn btn-large pull-right"><i class="icon-download-alt"> </i> Download Panduan </a>
                </li>
                @endif
              
                
<!-- Menu Role Rumah Tangga -->
                @if(auth()->user()->level=='rumahtangga')
                <li class="nav-item {{ Request::is('rumahtangga') ? 'active' : '' }} pcoded-menu-caption">
                    <label>Menu Prasarana</label>
                </li>
                <li class="nav-item {{ Request::segment(1) == 'jenisaset' ? '' : '' }}">
                    <a href="{{ route('jenisaset.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Jenis Aset</span></a>
                </li>
                <li class="nav-item {{ Request::segment(1) == 'namaaset' ? '' : '' }}">
                    <a href="{{ route('namaaset.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Nama Aset</span></a>
                </li>
                <li class="nav-item {{ Request::segment(1) == 'aset' ? '' : '' }}">
                    <a href="{{ route('aset.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Aset/Inventaris</span></a>
                </li>
                <li class="nav-item {{ Request::segment(1) == 'download' ? '' : '' }}">
                    <a href="https://drive.google.com/file/d/1wZ5a09Xs7UW24ZTNo7q4LHAuNVSywNwS/view" target="_blank" class="btn btn-large pull-right"><i class="icon-download-alt"> </i> Download Panduan </a>
                </li>
               
                @endif

<!-- Menu Role Dakwah -->
                @if(auth()->user()->level=='dakwah')
                <li class="nav-item {{ Request::is('dakwah') ? 'active' : '' }} pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Kegiatan</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="{{ route('jeniskegiatan.index') }}" class="">Jenis Kegiatan</a></li>
                            <li class=""><a href="{{ route('kategori.index') }}" class="">Kategori Artikel</a></li>
                            <li class=""><a href="{{ route('mubaligh.index') }}" class="">Mubaligh/Ustadz</a></li>
                            <li class=""><a href="{{ route('kegiatan.index') }}" class="">Agenda Kegiatan</a></li>
                            <li class=""><a href="{{ route('jadwaljumat.index') }}" class="">Jadwal Jumat</a></li>
                            <li class=""><a href="{{ route('artikel.index') }}" class="">Artikel/Berita</a></li>
                        </ul>
                    </li>
                 <!-- Role Pendidikan dan Dakwah -->
                  <li class="nav-item {{ Request::is('dakwah') ? 'active' : '' }} pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Kajian</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="{{ route('topikkajian.index') }}" class="">Topik Kajian</a></li>
                            <li class=""><a href="{{ route('kajian.index') }}" class="">Kajian</a></li>
                            <li class=""><a href="https://drive.google.com/file/d/1EHG6Wi2_lxCuRXjkiH3uLSyFPzFYAE1h/view" target="_blank" class="">Panduan Dakwah $ Ibadah</a></li>
                        </ul>
                </li>
                
                @endif


                {{-- @if(auth()->user()->level=='jamaah') --}}
                {{-- <li class="nav-item pcoded-menu-caption">
                    <label>Menu Tabungan</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('jamaah.transfer.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Transfer</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('jamaah.transfer.histori') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Histori Transfer</span></a>
                </li> --}}
                {{-- @endif --}}

                <li class="nav-item {{ Request::is('') ? 'active' : '' }} pcoded-menu-caption">
                    <label>Menu Umum</label>
                </li>

                <li class="nav-item {{ Request::is('user/home') ? 'active' : '' }}">
                    <a href="{{ route('user.home') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Beranda</span></a>
                </li>
                <li class="nav-item {{ Request::is('user/profile') ? 'active' : '' }}">
                    <a href="{{ route('user.profile.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Profil</span></a>
                </li>
                <li class="nav-item {{ Request::is('user/change-password') ? 'active' : '' }}">
                    <a href="{{ route('user.change-password.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-unlock"></i></span><span class="pcoded-mtext">Ubah Password</span></a>
                </li>
                <li class=""><a href="https://drive.google.com/file/d/1Br216gfHN6qOrjFWVuorrv1k2uHksRpd/view" target="_blank" class="">Panduan Teknis</a></li>
            </ul>
        </div>
    </div>
</nav>

