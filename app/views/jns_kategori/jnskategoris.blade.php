@extends('layouts.master')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Jenis Layanan</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				 Tabel Data Jenis Layanan
			</div>
			<!--Panel body dan table-->
			<div class="panel-body">
				<div class="table-responsive">
				@if(count($jnskategoris))
					<table class="table table-bordered table-hover table-condensed">
						<thead>
						<tr>
							<th width="30px">No</th>
							<th>Jenis Layanan</th>
							<th>Layanan</th>
							<th>Sub-Layanan</th>
							<th>Nilai Rujukan</th>
							<th>satuan</th>
							<th width="135px" align="center">
								<a href="jnskategoris/create" type="button" class="btn btn-block btn-default btn-xs">
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah data</a>
							</th>
						</tr>
						<?php $no = $jnskategoris->getFrom(); ?>
						@foreach ($jnskategoris as $jnskategori)
						</thead>
						<tbody>
					
						<tr>
							<td>{{$no}}</td>
							<td>{{$jnskategori->NamaJnsKategori}}</td>
							<td>{{$jnskategori->kategori->NamaKategori}}</td>
							<td>{{$jnskategori->subkategori->NmSubKategori}}</td>
							<td>{{$jnskategori->NilaiRujukan}}</td>
							<td>{{$jnskategori->satuan->NmSatuan}}</td>
							<td align="center">
							<a class="btn btn-default btn-xs" href="{{ action('JnskategoriController@edit', $jnskategori->KdJnsKategori) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Ubah</a>
							<a class="btn btn-default btn-xs" href="{{ action('JnskategoriController@hapus', $jnskategori->KdJnsKategori) }}" onclick="return confirm('Anda akan menghapus data jenis kategori?');"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> hapus</a>
						</tr>
						<?php $no++; ?>
						@endforeach
						</tbody>
					</table>
				</div>
					<span style="float: left;">
					{{ '(Hasil '. $jnskategoris->getFrom() .' - '. $jnskategoris->getTo() .')    <b>jumlah data :</b> : '. $jnskategoris->getTotal()}}
					</span>
			</div>
			@else
			<div class="alert alert-danger" role="alert">
				<strong>Peringatan !</strong> Belum ada data yang tersimpan di basis data. <a href="jnskategoris/create" class="alert-link">Tambah data jenis kategori</a>
			</div>
		@endif
	</div>
	{{ $jnskategoris->links() }}
</div>
</div>
@stop