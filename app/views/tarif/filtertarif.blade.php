@extends('layouts.master')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Tarif Laboratorium</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				 @foreach ($labcari as $l) {{$l->NmLab}} @endforeach
			</div>
			<!--Panel body dan table-->
			<div class="panel-body">
			<p>Filter berdasarkan laboratorium</p>
			<form role="form" action="{{ action('filtertarif') }}">
			<div class="btn-group">
			<select class="form-control" id="kdlab" name="kdlab">
				@foreach ($lab as $value)<option value="{{$value->KdLab}}">{{$value->NmLab}}</option>@endforeach
			</select>
			</div>
				<div class="btn-group">
					<button type="submit" class="btn btn-default">Cari</button>
				</div>
			</form>
			</br>
				<div class="table-responsive">
					@if(count($tarifs))
					<table class="table table-bordered table-hover table-condensed">
						<thead>
						<tr>
							<th width="30px">No</th>
							<th>Jenis Layanan</th>
							<th>Laboratorium</th>
							<th>Harga</th>
							<th width="135px" align="center">
								<a href="{{ action('TarifController@create') }}" type="button" class="btn btn-block btn-default btn-xs">
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah data</a>
							</th>
						<?php $no = $tarifs->getFrom(); ?>
						@foreach ($tarifs as $biaya)
						</thead>
						<tbody>
						<tr>
							<td>{{$no}}</td>
							<td>{{ $biaya->jnskategori->NamaJnsKategori }}</td>
							<td>{{ $biaya->lab->NmLab }}</td>
							<td>Rp. {{ $biaya->Harga }}</td>
							<td align="center">
							<a class="btn btn-default btn-xs" href="{{ action('TarifController@edit', $biaya->KdTarif) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Ubah</a>
							<a class="btn btn-default btn-xs" href="{{ action('TarifController@hapus', $biaya->KdTarif) }}" onclick="return confirm('Anda akan menghapus data tarif?');"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> hapus</a>
						</td>
						</tr>
						<?php $no++; ?>
						@endforeach
						</tbody>
					</table>
				</div>
					<span style="float: left;">
						{{ '(Hasil '. $tarifs->getFrom() .'-'. $tarifs->getTo() .' )  <b>jumlah data :</b> '. $tarifs->getTotal() }} @foreach ($labcari as $l) <a class="btn btn-default btn-xs" href="{{ action('TarifController@detail',  $l->KdLab) }}"> @endforeach Lihat semua</a>
					</span>
			</div>
			<!--End of Panel body dan table-->
			
			@else
			<div class="alert alert-danger" role="alert">
				<strong>Peringatan !</strong> Belum ada data yang tersimpan di basis data. <a href="create" class="alert-link">Tambah data tarif</a>
			</div>
		@endif
	</div>
		{{$tarifs->appends(Request::except('page'))->links()}}
</div>
</div>
@stop