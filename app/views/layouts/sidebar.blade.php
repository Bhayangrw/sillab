<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                        <form role="form" action="{{action('HistoryController@find')}}">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" id="datapasien" name="datapasien" placeholder="Pencarian Pasien" required>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                            <!-- /input-group -->
                        </li>
						<li>
                            <a href="{{URL::to('registrasi/search')}}"><i class="fa fa-file fa-fw"></i> Pendaftaran</a>
                        </li>
						<li>
                            <a href="{{ URL::to('rujukan') }}"><i class="fa fa-edit fa-fw"></i> Rujuk Spesimen</a>
                        </li>
						<li>
                            <a href="{{ URL::to('hasilpemeriksaan/search') }}"><i class="fa fa-file-text fa-fw"></i> Hasil Pemeriksaan</a>
                        </li>
						<li>
                            <a href="#"><i class="fa fa-calculator fa-fw"></i> Billing<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								<li>
                                    <a href="{{ URL::to('billings') }}">Transaksi</a>
                                </li>
								<li>
                                    <a href="{{ URL::to('tarifs') }}">Tarif</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Pelaporan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ URL::to('lapregistrasi') }}">Registrasi Pasien</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('laptest') }}">Kegiatan Laboratorium</a>
                                </li>
								<li>
                                    <a href="{{ URL::to('lapekspedisi') }}">Ekpedisi pengambilan</a>
                                </li>
								<li>
                                    <a href="{{ URL::to('billings/rekapbil') }}">Rekap Transaksi Billing</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{URL::to('grafik')}}"><i class="fa fa-bar-chart-o fa-fw"></i> Grafik</a>
                        </li>
                        <!--master data menu--><li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Master Data<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
							<li>
								<a href="{{ URL::to('labs') }}">Laboratorium</a>
							</li>
							<li>
								<a href="{{ URL::to('jnskategoris') }}">Jenis Layanan</a>
							</li>
							<li>
								<a href="{{ URL::to('subkategoris') }}">SubKategori Layanan</a>
							</li>
							<li>
								<a href="{{ URL::to('kategoris') }}">Kategori Layanan</a>
							</li>
							<li>
								<a href="{{ URL::to('satuan') }}">Satuan</a>
							</li>											
                            </ul>
                        <!--master data menu--></li>
						
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->