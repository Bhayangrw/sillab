<!DOCTYPE html>
@extends('layouts.master')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header" align="center"><b>Invoice Hasil Pemeriksaan Laboratorium</b><p>
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
								<th width="130px" style="border-top: none;">Nama Pasien</th>
								<td style="border-top: none;">: &nbsp; {{$pasien->Nama}} ({{$pasien->id_pasien}})</td>
								<td style="border-top: none;" align="right"><b>
									@if (($rujukan == null))
									Pasien Puskesmas
									@else 
									Pasien Rujukan
									@endif
								</b></td>
							</tr>
							<tr>
								<th style="border-top: none;">Jenis Kelamin</th>
								<td style="border-top: none;">: &nbsp;
									{{$pasien->Kelamin}}
								</td>
								<td style="border-top: none;" align="right">
									@if (($rujukan == null))
									<b>Laboratorium Puskesmas</b>
									@else
									<b>Laboratorium {{$rujukan->NmLab}}</b>
									@endif
								</td>
							</tr>
							<tr>
								<th style="border-top: none;">Tanggal Periksa</th>
								<td style="border-top: none;">: &nbsp;  {{date("d F Y",strtotime($pasien->tgl_reg))}}</td>
							</tr>
							</table>
							</div>
							<div class="col-lg-12">
							<table class="table table-bordered table-condensed">
							<tr>
							<th>No</th>
							<th>Jenis Pemeriksaan</th>
							<th>Satuan</th>
							<th>Nilai Normal</th>
							<th>Harga</th>
							<th hidden>{{$no=1}}</th>
							</tr>
							@foreach ($pemeriksaan as $value)
							<tr>
							<td>{{$no++}}.</td>
							<td>{{$value->NamaJnsKategori}}</td>
							<td>{{$value->NmSatuan}}</td>
							<td>{{$value->NilaiRujukan}}</td>
							<td align="right">{{$value->Harga}}</td>
							</tr>
							@endforeach
							<tr>
							<td colspan="4" align="right"><b>Total Bayar </b></td>
							<td colspan="1" align="right"><b>Rp. {{$hargatotal}}</b></td>
							</tr>
							</table>
							<table>
							<tr>
							<td>
							<button class="btn btn-default btn noPrint" onclick="window.print()">
							<span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak</button>
							</td>
							</tr>
							</table>
							
							
							</div><!--end of table-->
							
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