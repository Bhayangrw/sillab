@extends('layouts.master')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Satuan</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				 Tabel Data Satuan
			</div>
			<!--Panel body dan table-->
			<div class="panel-body">
				<div class="table-responsive">
					@if(count($satuan))
					<table class="table table-bordered table-hover table-condensed">
						<thead>
						<tr>
							<th width="30px">No</th>
							<th hidden>Kode Satuan</th>
							<th>Satuan</th>
							<th>Keterangan</th>
							<th width="135" align="center">
								<a href="satuan/create" type="button" class="btn btn-block btn-default btn-xs">
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah data</a>
							</th>
						</tr>
						<?php $no = $satuan->getFrom(); ?>
						@foreach ($satuan as $value)
						</thead>
						<tbody>
					
						<tr>
							<td>{{ $no }}</td>
							<td hidden>{{ $value->KdSatuan }}</td>
							<td>{{ $value->NmSatuan }}</td>
							<td>{{ $value->Ket }}</td>
							<td align="center">
							<a class="btn btn-default btn-xs" href="{{ action('SatuanController@edit', $value->KdSatuan) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Ubah</a>
							<a class="btn btn-default btn-xs" href="satuan/hapus/{{{$value->KdSatuan }}}" onclick="return confirm('Anda akan menghapus data satuan?');"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> hapus</a>
							<!--<a class="btn btn-default btn-xs" href="satuan/detail/{{{$value->KdSatuan }}}"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Detail</a>-->
						</tr>
						<?php $no++; ?>
						@endforeach
						</tbody>
					</table>
				</div>
					<span style="float: left;">
						{{ '(Hasil '. $satuan->getFrom() .' - '. $satuan->getTo() .' ) <b>jumlah data :</b> '. $satuan->getTotal()}}
					</span>
			</div>
			<!--End of Panel body dan table-->
			
			@else
			<div class="alert alert-danger" role="alert">
				<strong>Peringatan !</strong> Belum ada data yang tersimpan di basis data. <a href="satuan/create" class="alert-link">Tambah data satuan</a>
			</div>
		@endif
	</div>
	{{ $satuan->links() }}
</div>
</div>
@stop