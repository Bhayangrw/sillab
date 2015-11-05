<!DOCTYPE html>
@extends('layouts.master')
@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" align="center"><b>Laporan Kegiatan Laboratorium</b><p>
					{{{ isset(Auth::user()->name) ? Auth::user()->lab->NmLab : Auth::user()->email }}}<br>
					<small>{{{ isset(Auth::user()->name) ? Auth::user()->lab->Alamat : Auth::user()->email }}}</small></h3>
                </div>
				&nbsp;
            <div class="panel-body">
			@if(count($lapkeglab))
				<div class="table-responsive">
								<table class="table table-nospasi">
									<tr>
										<th width="160px" style="border-top: none;">Tanggal Pemeriksaan</th>
										<td style="border-top: none;">: &nbsp;  
											@if (($tgl1 && $tgl2)==null)
												-
											@else
											Dari&nbsp;<b><i>{{date("d-m-Y",strtotime($tgl1))}}</i></b> Sampai <i><b>{{date("d-m-Y",strtotime($tgl2))}}</i></b></td>
											@endif
									</tr>
								</table>
					<table class="table table-bordered table-condensed">
						<thead>
						<tr align="center" >
							<td rowspan="2" width="30px"><b>No</b></td>
							<td rowspan="2"><b>Jenis Layanan</b></td>
							<td rowspan="2" width="50px"><b>Jumlah</b></td>
							<td rowspan="2" width="50px"><b>Dirujuk</b></td>
							<td align="center" colspan="2"><b>Hasil</b></td>
						</tr>
						<tr align="center">
							<td width="45px"><b>N</b></td><td width="45px"><b>Ab N</td></b>
						</tr>
						</thead>
						<tbody>
						<?php $no=1;  ?>
						@foreach ($lapkeglab as $value)
						
						<?php
							$sub = DB::table('v_pemeriksaandetail')
									->where('Kdlab','=', $kdlab)
									->select('KdSubKategori','NmSubKategori')
									->where('KdKategori', '=', $value->KdKategori)
									->groupBy('KdSubKategori')
									->get();
						?>

						<tr>
							<td>{{$no++}}.</td>
							<td>
								<u><b>Kategori : {{$value->NamaKategori}}<b></u>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<!--looping sub-kategori -->@foreach ($sub as $subkategori)
							<tr>
								<td></td><td><b>Sub Kategori : {{$subkategori->NmSubKategori}}<b></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<?php
							$jns = DB::table('v_pemeriksaandetail')
									->where('Kdlab','=', $kdlab)
									->select('KdJnsKategori','NamaJnsKategori')
									->where('KdSubKategori', '=', $subkategori->KdSubKategori)
									->where('KdKategori', '=', $value->KdKategori)
									->groupBy('KdJnsKategori')
									->get();

							?>
							<!--looping jenis-kategori -->@foreach ($jns as $jnskategori)
							<?php
								$jnstot = DB::table('v_bukanrujukan')->select(DB::raw('count(*) as jnstotal'))
									->where('Kdlab','=', $kdlab)
											->whereBetween('tgl_reg', array($tgl1, $tgl2))
											->where('KdJnsKategori', '=', $jnskategori->KdJnsKategori)
											->get();

								$nsum = DB::table('v_transaksidetail')->select(DB::raw('count(*) as ntotal'))
									->where('Kdlab','=', $kdlab)
											->whereBetween('tgl_reg', array($tgl1, $tgl2))
											->where('KdJnsKategori', '=', $jnskategori->KdJnsKategori)
											->Where('Ket_Hasil', '=', '0')
											->get();

								$absum = DB::table('v_transaksidetail')->select(DB::raw('count(*) as abtotal'))
									->where('Kdlab','=', $kdlab)
											->whereBetween('tgl_reg', array($tgl1, $tgl2))
											->where('KdJnsKategori', '=', $jnskategori->KdJnsKategori)
											->Where('Ket_Hasil', '=', '1')
											->get();

								$nket = DB::table('v_bukanrujukan')->select('Keterangan', DB::raw('count(Keterangan) as kettotal'))
									->where('Kdlab','=', $kdlab)
											->whereBetween('tgl_reg', array($tgl1, $tgl2))
											->where('KdJnsKategori', '=', $jnskategori->KdJnsKategori)
											->groupBy('Keterangan')
											->get();

								$nrujukan = DB::table('v_rujukandetail')->select(DB::raw('count(*) as rujukantot'))
									->where('Kdlab','=', $kdlab)
											->whereBetween('tgl_reg', array($tgl1, $tgl2))
											->where('KdJnsKategori', '=', $jnskategori->KdJnsKategori)
											->get();
							?>
							
							<tr>
								<td></td>
								<td> {{$jnskategori->NamaJnsKategori}}</td>
								<td>@foreach ($jnstot as $v) {{$v->jnstotal}} @endforeach</td>
								<td>@foreach ($nrujukan as $r) {{$r->rujukantot}} @endforeach</td>
								<td>@foreach ($nsum as $n) {{$n->ntotal}} @endforeach</td>
								<td>@foreach ($absum as $ab) {{$ab->abtotal}} @endforeach</td>
							</tr>
							<!--Looping jenis-kategori -->@endforeach
							<!--Looping sub-kategori -->@endforeach
							</td>
						</tr>
						@endforeach
						</tbody>
					</table>
		</div><!--end of table-->
						
					<button class="btn btn-default btn noPrint" onclick="window.print()">
					<span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak</button>	
					<div class="col-lg-12">
						<table class="table table-nospasi">
							<tr>
							<td width="350px" style="border-top: none;"></td>
								<td style="border-top: none;" align="center">Mengetahui,<br>Petugas Laboratorium<br><br><br><br>___________________</td>
							</tr>
						</table>
					</div>
					</div>
                    </div>
                <!-- /.col-lg-12 -->
            </div>
@endif
@stop