@extends('layouts.master')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Data Pasien<small> :: Riwayat Pemeriksaan</small></h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				 Daftar Riwayat Pemeriksaan Laboratorium
			</div>
			<!--Panel body dan table-->
			<div class="panel-body">
				<div class="table-responsive">
					@if(count($datpasien))
					<table class="table table-nospasi">
						@foreach ($pasien as $p)
									<tr>
										<th style="border-top: none;">No.Medrek</th>
										<td style="border-top: none;">:&nbsp;{{$p->Id_Pasien}}</td>
										<td style="border-top: none;"><b>Status Keluarga&nbsp;</b>&nbsp;&nbsp;&nbsp;&nbsp;:
											{{$p->Nama_Status_Kel}}
										</td>
									</tr>
									<tr>
										<th width="130px" style="border-top: none;">Nama Pasien</th>
										<td style="border-top: none;">: {{$p->Nama}}</td>
										<td style="border-top: none;"><b>Asuransi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>&nbsp;&nbsp;&nbsp;&nbsp;:
											{{$p->Nama_Asuransi}}
										</td>
									</tr>
									<tr>
										<th style="border-top: none;">Jenis Kelamin</th>
										<td style="border-top: none;">:&nbsp;{{$p->Kelamin}}</td>
										<td style="border-top: none;"><b>Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>&nbsp;&nbsp;&nbsp;&nbsp;:
											{{$p->alamat}}, rt/rw {{$p->RT}}/{{$p->RW}}, Kel.{{$p->Nama_Kelurahan}}, Kec.{{$p->Nama_Kecamatan}} - {{$p->kota}}
										</td>
									</tr>
									<tr>
										<th style="border-top: none;">Tanggal Lahir</th>
										<td style="border-top: none;">:&nbsp;{{date("d-m-Y",strtotime($p->Tgl_lahir))}}</td>
										<td style="border-top: none;"><b>No.Telp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>&nbsp;&nbsp;&nbsp;&nbsp;:
											{{$p->telepon}}
										</td>
									</tr>
								</table>
							@endforeach
					<table class="table table-bordered table-hover table-condensed">
						<thead>
						<tr>
							<th width="30px">No</th>
							<th>Periksa</th>
							<th>Pengambilan</th>
							<th>No.Reglab</th>
							<th>Spesimen</th>
							<th>Layanan</th>
							<th>Hasil</th>
							<th>Nilai</th>
						</tr>
						<?php $no=1 ?>
						@foreach ($datpasien as $value)
						<?php
							$a = Pemeriksaan::select('*')->where('NoRegLab', '=', $value->NoRegLab)->get();
							$rujukan = DB::table('v_rujukandetail')->where('NoRegLab', '=', $value->NoRegLab)->first();
						?>
						</thead>
						<tbody>
						<tr>
							<td>{{$no++}}</td>
							<td>{{date("d-m-Y",strtotime($value->tgl_reg))}}</td>
							<td></td>
							<td>{{ $value->NoRegLab }}</td>
							<td>@if (($rujukan == null))
											Non-Rujukan
										@else
											Rujukan ke {{$rujukan->NmLab}}
										@endif
							</td>

							<td hidden>{{$nos=1}}</td>
							<td>
							@foreach ($a as $hasil)
							{{$nos++}}.&nbsp;{{ $hasil->NamaJnsKategori }}<br>
							@endforeach
							</td>
							<td>@foreach ($a as $hasil){{$hasil->HasilPeriksa}}<br>@endforeach</td>
							<td>@foreach ($a as $hasil){{$hasil->NilaiRujukan}}<br>@endforeach</td>
						</tr>
						@endforeach
						</tbody>
					</table>
				</div>
					<span style="float: left;">
						{{ '(Hasil  '. $datpasien->getFrom() .'-'. $datpasien->getTo() .')  <b>jumlah data :</b> '. $datpasien->getTotal()}}
					</span>
			</div>
			<!--End of Panel body dan table-->
			
			@else
			<div class="alert alert-danger" role="alert">
				<strong>Peringatan !</strong> Data yang anda cari tidak ada!
			</div>
		@endif
	</div>
	{{$datpasien->appends(Request::except('page'))->links()}}
</div>
</div>
@stop