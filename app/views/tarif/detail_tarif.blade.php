<!DOCTYPE html>
@extends('layouts.master')
@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" align="center"><b>Daftar Tarif Layanan Laboratorium</b><p>
					{{{ isset(Auth::user()->name) ? Auth::user()->lab->NmLab : Auth::user()->email }}}<br>
					<small>{{{ isset(Auth::user()->name) ? Auth::user()->lab->Alamat : Auth::user()->email }}}</small></h3>

                </div>
            <div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-condensed">
						<thead>
						<tr align="center" >
							<td width="30px"><b>No</b></td>
							<td><b>Jenis Layanan</b></td>
							<td width="100px"><b>Harga</b></td>
						</tr>
						</thead>
						<tbody>
						<?php $no=1;  ?>
						@foreach ($detarif as $value)
						
						<?php
							$sub = DB::table('v_pemeriksaandetail')
									->where('KdLab', '=', $kodelab)
									->where('KdKategori', '=', $value->KdKategori)
									->groupBy('KdSubKategori')
									->get();
						?>

						<tr>
							<td>{{$no++}}.</td>
							<td>
								<u><b>Kategori : {{$value->NamaKategori}}<b></u>
							<td></td>
							<!--looping sub-kategori -->@foreach ($sub as $subkategori)
							<tr>
								<td></td><td><b>Sub Kategori : {{$subkategori->NmSubKategori}}<b></td>
								<td></td>
							</tr>
							<?php
							$jns = DB::table('v_pemeriksaandetail')
									->where('KdLab', '=', $kodelab)
									->where('KdSubKategori', '=', $subkategori->KdSubKategori)
									->where('KdKategori', '=', $value->KdKategori)
									->groupBy('KdJnsKategori')
									->get();

							?>
							<!--looping jenis-kategori -->@foreach ($jns as $jnskategori)
							<?php

							$hrg = DB::table('v_pemeriksaandetail')
									->where('KdLab', '=', $kodelab)
									->where('KdJnsKategori', '=', $jnskategori->KdJnsKategori)
									->groupBy('KdJnsKategori')
									->get();

							?>

							<tr>
								<td></td>
								<td> {{$jnskategori->NamaJnsKategori}}</td>
								<td align="right">@foreach ($hrg as $harga) {{$harga->Harga}} @endforeach</td>
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
@stop