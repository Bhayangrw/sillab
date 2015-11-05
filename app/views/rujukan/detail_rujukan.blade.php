
@extends('layouts.master')
@section('content')

<div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" align="center"><b>Surat Rujukan Pemeriksaan Laboratorium</b><p>
					{{{ isset(Auth::user()->name) ? Auth::user()->lab->NmLab : Auth::user()->email }}}<br>
					<small>{{{ isset(Auth::user()->name) ? Auth::user()->lab->Alamat : Auth::user()->email }}}</small></h3>
                </div>
            <!-- /.row -->
           <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
						<?php
							$a = ViewRujukandetail::select('NamaJnsKategori')->where('NmrSpesimen', '=', $rujukan->NmrSpesimen)->get();
						?>
						<div class="table-responsive">
								<table class="table table-bordered table-condensed">
									<tr>
										<th width="180px">Nomor Spesimen</th><td width="20px">:</td><td>{{$rujukan->NmrSpesimen}}</td>
									</tr>
									<tr>
										<th>Nama Pasien</th><td>:</td><td>{{$rujukan->nama}}</td>
									</tr>
									<tr>
										<th>Jenis Spesimen</th><td>:</td><td>{{$rujukan->JnsSpesimen}}</td>
									</tr>
									<tr>
										<th>Pemeriksaan</th><td>:</td>
										<td><div hidden>{{ $no = 1; }}</div>
										@foreach ($a as $hasil)
										{{$no++}}. &nbsp;{{ $hasil->NamaJnsKategori }}<br>
										@endforeach
										</td>
									</tr>
									<tr>
										<th>Pengambilan spesimen</th><td>:</td>
										<td>
											@if ($rujukan->AmbilSpesimen == 0000-00-00)
											-
											@else
												{{ date("d F Y",strtotime($rujukan->AmbilSpesimen)) }}
											@endif
										</td>
									</tr>
									<tr>
										<th>Rujuk Ke</th><td>:</td><td>{{$rujukan->NmLab}}</td>
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
								
						</div>
					</div>

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
	
@stop