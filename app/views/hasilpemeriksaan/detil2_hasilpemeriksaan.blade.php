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
			<font size="2">
                <div class="col-lg-12">
						<div class="table-responsive">

								<table class="table table-bordered table-hover table-condensed">
									<tr width="100%">
										<th width="20%">Nomor Medrec</th><td width="30%">{{$reglab->pasien->id_pasien}}</td>
										<th width="20%">Nomor Registrasi</th><td width="30%">{{$reglab->NoRegLab}}</td>
									</tr>
									<tr>
										<th>Nama Pasien</th><td>{{$reglab->pasien->nama}}</td>
										<th>Tanggal Periksa</th><td>{{ date('d F Y', strtotime($reglab->created_at)) }}</td>
									</tr>
									<tr>
										<th>Tgl Lahir</th><td>{{ date("d F Y",strtotime($reglab->pasien->tgl_lahir)) }}</td>
										<th>Jam Periksa</th><td>{{ date('H:i:s', strtotime($reglab->created_at)) }}</td>
									</tr>
									<tr>
										<th>Alamat</th><td>{{$reglab->pasien->alamat}}</td>
										<th></th><td></td>
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
										<th></th><td></td>
									</tr>
								</table>
								<table class="table table-bordered table-hover table-condensed">
								<thead>
									<tr>
										<th>No</th>
										<th>Pemeriksaan</th>
										<th>Hasil</th>
										<th>NilaiRujukan</th>
										<th>Keterangan</th>
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
										<td>
	                                        @if (($value->Ket_Hasil) == 0 )
	                                            Normal
	                                        @else
	                                            Abnormal
	                                        @endif
		                                </td>
										<td>{{ $value->tarif->jnskategori->satuan->NmSatuan }}</td>
									</tr>
								<?php  $no++?>
								@endforeach
								</tbody>
								
								</table>

								<div class="col-lg-12" align="right">Pemeriksa,</div>
								<br><br><br>
								<div class="col-lg-12" align="right">________</div>
								<br><hr>
								<div>
									Printed By: {{ Auth::user()->name }} /  {{ date("d-F-Y")}} {{date("h:i:s")}}
								</div>
								<button class="btn btn-default btn noPrint" onclick="window.print()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak</button>
						</div>
				</div>
			</font>
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