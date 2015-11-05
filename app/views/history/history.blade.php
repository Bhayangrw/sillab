@extends('layouts.master')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Data Pasien</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				 Riwayat Pemeriksaan Laboratorium
			</div>
			<!--Panel body dan table-->
			<div class="panel-body">
				<div class="table-responsive">
					@if(count($datpasien))
					<table class="table table-bordered table-hover table-condensed">
						<thead>
						<tr>
							<th width="30px">No</th>
							<th>No Medrek</th>
							<th>Nama Pasien</th>
							<th>Jenis Kelamin</th>
							<th>Status</th>
							<th>Alamat</th>
							<th>Telp</th>
							<th>Asuransi</th>
							<th width="70px" align="center">
								<div align="center">Aksi</div>
							</th>
						</tr>
						<?php $no=1 ?>
						@foreach ($datpasien as $value)
						</thead>
						<tbody>
						<tr>
							<td>{{$no++}}</td>
							<td>{{$value->Id_Pasien}}</td>
							<td>{{$value->Nama }}</td>
							<td>{{$value->Kelamin }}</td>
							<td>{{$value->Nama_Status_Kel }}</td>
							<td>{{$value->alamat}}, {{$value->Nama_Kecamatan}} - {{$value->kota}}</td>
							<td>{{$value->telepon }}</td>
							<td>{{$value->Nama_Asuransi }}</td>
							<td>
								<a class="btn btn-default btn-xs" href="{{ action('HistoryController@detail', $value->Id_Pasien) }}" target="_blank">
									<span class="glyphicon glyphicon-book" aria-hidden="true"></span> Riwayat
								</a>
							</td>
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
	{{ $datpasien->links() }}
</div>
</div>
@stop