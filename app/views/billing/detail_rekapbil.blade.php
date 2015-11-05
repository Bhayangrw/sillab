<!DOCTYPE html>
@extends('layouts.master')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header" align="center"><b>Laporan Transaksi Billing Laboratorium</b><p>
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
								<td style="border-top: none;">: &nbsp; @if (($tgl1 && $tgl2)==null)
									-
									@else
								Dari tanggal&nbsp;<b><i>{{date("d-m-Y",strtotime($tgl1))}}</i></b> Sampai <i><b>{{date("d-m-Y",strtotime($tgl2))}}</i></b></td>
							@endif</td>
						</tr>
					</table>
				</div>
				<div class="col-lg-12">
					
					@if (($spesimen)==1)
					<table class="table table-bordered table-hover table-condensed">
						<thead>
							<tr>
								<th colspan="5">Pasien Spesimen Rujukan</th>
							</tr>
							<tr>
								<th width="30px">No</th>
								<th>Tanggal Pemeriksaan</th>
								<th>Total Pasien</th>
								<th>Total Pemeriksaan</th>
								<th>Harga Total</th>
							</tr>
						</thead>
					<?php 
					$no=1;
					?>
					@foreach ($bils as $value)
					<?php
					$jmlpasien = DB::table('v_rujukan')
					->groupBy('NoRegLab')
					->select(DB::raw('count(NoRegLab)'))
					->where('tgl_reg','=',$value->tgl_reg);
					
					$detailtransaksi = DB::table('v_rujukan')
					->select(DB::raw('count(*)'))
					->where('tgl_reg','=',$value->tgl_reg);
					?>
					<tbody>
					<tr>
					<td>{{$no++}}.</td>
					<td>{{date("d F Y",strtotime($value->tgl_reg))}}</td>
					<td>{{$jmlpasien->count('NoRegLab')}} Orang</td>
					<td>{{$detailtransaksi->count('*')}} Jenis Pemeriksaan</td>
					<td align='right'>{{$value->hargatot}}</td>
					</tr>
					@endforeach
					<tr>
					<td colspan='5' align="right"> 
					<b>Rp. @foreach ($bils2 as $value) {{$value->hargatot}} @endforeach</b>
					</td>
					</tr>
					</tbody>
					</table>	
					
					@elseif (($spesimen)==2)
					<table class="table table-bordered table-hover table-condensed">
					<thead>
					<tr>
					<th colspan="5">Pasien Spesimen Non-Rujukan</th>
					</tr>
					<tr>
					<th width="30px">No</th>
					<th>Tanggal Pemeriksaan</th>
					<th>Total Pasien</th>
					<th>Total Pemeriksaan</th>
					<th>Harga Total</th>
					</tr>
					</thead>
					<?php 
					$no=1;
					?>
					@foreach ($bils as $value)
					<?php
					$jmlpasien = DB::table('v_bukanrujukandetail')
					->select(DB::raw('count(NoRegLab)'))
					->where('tgl_reg','=',$value->tgl_reg);
					
					$detailtransaksi = DB::table('v_bukanrujukan')
					->select(DB::raw('count(*)'))
					->where('tgl_reg','=',$value->tgl_reg);
					?>
					<tbody>
					<tr>
					<td>{{$no++}}.</td>
					<td>{{date("d F Y",strtotime($value->tgl_reg))}}</td>
					<td>{{$jmlpasien->count('NoRegLab')}} Orang</td>
					<td>{{$detailtransaksi->count('*')}} Jenis Pemeriksaan</td>
					<td align='right'>{{$value->hargatot}}</td>
					</tr>
					@endforeach
					<tr>
					<td colspan='5' align="right"> 
					<b>Rp. @foreach ($bils2 as $value) {{$value->hargatot}} @endforeach</b>
					</td>
					</tr>
					</tbody>
					</table>		
					
					@else
					<table class="table table-bordered table-hover table-condensed">
					<thead>
					<tr>
					<th colspan="5">Rekap Semua</th>
					</tr>
					<tr>
					<th width="30px">No</th>
					<th>Tanggal Pemeriksaan</th>
					<th>Total Pasien</th>
					<th>Total Pemeriksaan</th>
					<th>Harga Total</th>
					</tr>
					</thead>
					<?php 
					$no=1;
					?>
					@foreach ($bils as $value)
					<?php
					$jmlpasien = DB::table('reglab')
					->select(DB::raw('count(NoRegLab)'))
					->where('tgl_reg','=',$value->tgl_reg);
					
					$detailtransaksi = DB::table('v_transaksidetail')
					->select(DB::raw('count(*)'))
					->where('tgl_reg','=',$value->tgl_reg);
					?>
					<tbody>
					<tr>
					<td>{{$no++}}.</td>
					<td>{{date("d F Y",strtotime($value->tgl_reg))}}</td>
					<td>{{$jmlpasien->count('NoRegLab')}} Orang</td>
					<td>{{$detailtransaksi->count('*')}} Jenis Pemeriksaan</td>
					<td align='right'>{{$value->hargatot}}</td>
					</tr>
					@endforeach
					<tr>
					<td colspan='5' align="right"> 
					<b>Rp. @foreach ($bils2 as $value) {{$value->hargatot}} @endforeach</b>
					</td>
					</tr>
					</tbody>
					</table>
					
					@endif
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