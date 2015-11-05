@extends('layouts.master')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">SubKategori-Layanan</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-6">
	<!-- Alert sukses -->
						@if (Session::has('register_success'))
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									{{ Session::get('register_success') }}
                            </div>
						@endif 
						<!-- alert Sukses end -->
						
		<div class="panel panel-default">
			<div class="panel-heading">
				 Tabel Data SubSubKategori-Layanan
			</div>
			<!--Panel body dan table-->
			<div class="panel-body">
				<div class="table-responsive">
				@if(count($subkategoris))
					<table class="table table-bordered table-hover table-condensed">
						<thead>
						<tr>
							<th width="30px">No</th>
							<th>Sub-Layanan</th>
							<th width="135px" align="center">
								<a href="subkategoris/create" type="button" class="btn btn-block btn-default btn-xs">
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah data</a>
							</th>
						</tr>
						</thead>
						<?php $no = $subkategoris->getFrom(); ?>
						@foreach ($subkategoris as $subkategori)
						<tbody>
						<tr>
							<td>{{ $no }}</td>
							<td>{{ $subkategori->NmSubKategori }}</td>
							<td align="center">
							<a class="btn btn-default btn-xs" href="{{ action('SubkategoriController@edit', $subkategori->KdSubKategori) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Ubah</a>
							<a class="btn btn-default btn-xs" href="subkategoris/hapus/{{{$subkategori->KdSubKategori }}}"onclick="return confirm('Anda akan menghapus data sub-kategori?');"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> hapus</a>
							</td>
						</tr>
						<?php $no++; ?>
						@endforeach
						</tbody>
					</table>
				</div>
					<span style="float: left;">
						{{'(Hasil '.$subkategoris->getFrom().' - '.$subkategoris->getTo() .' ) <b>jumlah data :</b> '.$subkategoris->getTotal()}}
					</span>
			</div>
			<!--End of Panel body dan table-->
			@else
			<div class="alert alert-danger" role="alert">
				<strong>Peringatan !</strong> Belum ada data yang tersimpan di basis data. <a href="subkategoris/create" class="alert-link">Tambah data kategori</a>
			</div>
			@endif
	</div>
</div>
</div>
@stop