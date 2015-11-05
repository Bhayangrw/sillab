<!DOCTYPE html>
@extends('layouts.master')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header" align="center"><b>Laporan Data Registrasi Pasien Laboratorium</b><p>
			{{{ isset(Auth::user()->name) ? Auth::user()->lab->NmLab : Auth::user()->email }}}<br>
		<small>{{{ isset(Auth::user()->name) ? Auth::user()->lab->Alamat : Auth::user()->email }}}</small></h3>
		</div>
		&nbsp;
		<div class="panel-body">
            <div class="row">
				<div class="table-responsive">
					<div class="col-lg-12">
						<table class="table table-nospasi">
							<tr>
								<th width="160px" style="border-top: none;">Tanggal Pemeriksaan</th>
								<td style="border-top: none;">: &nbsp; Dari <b><i>{{date("d F Y",strtotime($tgl1))}}</i></b> Sampai <i><b>{{date("d F Y",strtotime($tgl2))}}</i></b></td>
							</tr>
						</table>
					</div>
					<div class="col-lg-12">
						
						<table class="table table-bordered table-hover table-condensed">
							<thead>
								<tr>
									<th width="30px">No</th>
									<th>Tanggal</th>
									<th>No RegLab</th>
									<th>No. Medrek</th>
									<th>Nama </th>
									<th>Jenis Layanan</th>
									<th>Spesimen</th>
								</tr>
								<?php $no = $reglab->getFrom(); ?>
								@foreach ($reglab as $value)
								<?php
									$rujukan = DB::table('v_rujukan')->select('*')->where('NoRegLab', '=', $value->NoRegLab)->first();
									$a = Pemeriksaan::select('*')->where('NoRegLab', '=', $value->NoRegLab)->get();
								?>
								</thead>
								<tbody>
								
								<tr>
								<td>{{ $no }}.</td>
								<td>{{date("d-m-Y",strtotime($value->tgl_reg))}}</td>
								<td>{{ $value->NoRegLab }}</td>
								<td>{{ $value->id_pasien}}</td>
								<td>{{ $value->Nama}}</td>
								<td hidden>{{$nos=1}}</td>
								<td>@foreach ($a as $hasil)
								{{$nos++}}. &nbsp; {{ $hasil->NamaJnsKategori }}<br>
								@endforeach
								</td>
								<td>
								@if (($rujukan==null))
								Non-Rujukan
								@else
								Rujukan
								@endif
								</td>
								</tr>
							<?php $no++; ?>
							@endforeach
							</tbody>
							</table>
							
							<button class="btn btn-default btn noPrint" onclick="window.print()">
							<span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak</button>
							</div><!--end oftable-->
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
							
							</div>
							<!-- /.col-lg-12 -->
							</div>
							@stop							