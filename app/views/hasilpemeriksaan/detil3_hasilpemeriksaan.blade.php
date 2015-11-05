@extends('layouts.master')
@section('content')

<div class="row">
			<div class="col-lg-12">
	            <h3 class="page-header" align="center"><b>Laporan Hasil Pemeriksaan Spesimen</b><p>
				{{{ isset(Auth::user()->name) ? Auth::user()->lab->NmLab : Auth::user()->email }}}<br>
				<small>{{{ isset(Auth::user()->name) ? Auth::user()->lab->Alamat : Auth::user()->email }}}</small></h3>
	        </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							Data detail Rujukan
                        </div>
                        <div class="panel-body">
            <div class="row">
			
                <div class="col-lg-12">
						<div class="table-responsive">
								<table class="table table-bordered table-hover table-condensed">
									<tr>
										<th>Nomor Registrasi</th><td>{{$reglab->NoRegLab}}</td>
									</tr>
									<tr>
										<th>Nama Pasien</th><td>{{$reglab->pasien->NamaPasien}}</td>
									</tr>
									<tr>
										<th>Tgl Lahir</th><td>{{ date("d F Y",strtotime($reglab->pasien->TTL)) }}</td>
									</tr>
									<tr>
										<th>Alamat</th><td>{{$reglab->pasien->Alamat}}</td>
									</tr>
									<tr>
										<th>Jenis Kelamin</th>
										<td>
											@if (($reglab->pasien->JenisKelamin) == 0 )
												Laki-laki
											@else
												Perempuan
											@endif
										</td>
									</tr>
								</table>
								<table class="table table-bordered table-hover table-condensed">
								<thead>
									<tr>
										<th>No</th>
										<th>Pemeriksaan</th>
										<th>Hasil</th>
										<th>NilaiRujukan</th>
										<th>Satuan</th>
									</tr>
								<?php  $no = $pemeriksaan->getFrom();?>
								@foreach($pemeriksaan as $value)
								</thead>
								<tbody>
									<tr>
										<td>{{ $no }}</td>
										<td>{{ $value->tarif->jnskategori->NamaJnsKategori }}</td>
										<td>{{ $value->HasilPeriksa }}</td>
										<td>{{ $value->tarif->jnskategori->NilaiRujukan }}</td>
										<td>{{ $value->tarif->jnskategori->satuan->NmSatuan }}</td>
									</tr>
								<?php  $no++?>
								@endforeach
								</tbody>
								
								</table>

								<table class="table table-bordered table-hover table-condensed">
								<thead>
									<tr>
										<th>Pemeriksaan</th>
										<th>Hasil</th>
										<th>NilaiRujukan</th>
										<th>Satuan</th>
									</tr>
								@foreach($pemeriksaan as $sub)
									<?php
										$subjns = Subkategori::where('KdSubKategori', '=', $sub->tarif->jnskategori->Subkategori->KdSubKategori)->first();
									?>
									
										<tr>
											<th>{{ $subjns->NmSubKategori }}</th>
										</tr>
										
									
								@endforeach
								</table>

								@for($i=1, $i<=1, i++)
									
								@endfor

								<div class="col-lg-12" align="right">Pemeriksa,</div>
								<br><br><br>
								<div class="col-lg-12" align="right">________</div>
								<br>

								<button class="btn btn-default btn noPrint" onclick="window.print()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak</button>
						</div>
					</div>
					</div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
	
@stop