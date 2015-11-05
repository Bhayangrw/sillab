@extends('layouts.master')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Laboratorium</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<!-- Alert sukses -->
		@if (Session::has('register_success'))
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('register_success') }}
		</div>
		@elseif (Session::has('register_error'))
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('register_error') }}
		</div>	
		@endif 
		
		<!-- alert Sukses end -->
		<div class="panel panel-default">
			<div class="panel-heading">
				Tabel Data Laboratorium
			</div>
			<!--Panel body dan table-->
			<div class="panel-body">
				<div class="table-responsive">
					@if(count($labs))
					<table class="table table-bordered table-hover table-condensed">
						<thead>
							<tr>
								<th width="30px">No</th>
								<th>Nama Lab</th>
								<th>Kontak</th>
								<th>Alamat</th>
								<th>Tanggal Kerjasama</th>
								<th width="135px" align="center">
									<a href="labs/create" type="button" class="btn btn-block btn-default btn-xs">
									<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah data</a>
								</th>
							</tr>
							<?php $no = $labs->getFrom(); ?>
							@foreach ($labs as $value)
						</thead>
						<tbody>
							<tr>
								<td>{{ $no }}</td>
								<td>{{ $value->NmLab }}</td>
								<td>{{ $value->Satker }}</td>
								<td>{{ $value->Alamat }}</td>
								<td>
									@if (($value->TglKerjasama) == 0000-00-00)
									-
									@else
									{{date("d F Y",strtotime($value->TglKerjasama))}}
									@endif
								</td>
								<td align="center">
									<a class="btn btn-default btn-xs" href="{{ action('LabController@edit', $value->KdLab) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Ubah</a>
									<a class="btn btn-default btn-xs" href="{{ action('LabController@hapus', array($value->KdLab,isset(Auth::user()->name) ? Auth::user()->KdLab : Auth::user()->email)) }}" onclick="return confirm('Anda akan menghapus data laboratorium ?');"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> hapus</a>
								</td>
							</tr>
							<?php $no++; ?>
							@endforeach
						</tbody>
					</table>
				</div>
				<span style="float: left;">
					{{ '(Hasil '. $labs->getFrom() .'-'. $labs->getTo() .') <b>Jumlah Data : </b>'. $labs->getTotal()}}
				</span>
			</div>
			<!--End of Panel body dan table-->
			
			@else
			<div class="alert alert-danger" role="alert">
				<strong>Peringatan !</strong> Belum ada data yang tersimpan di basis data.
			</div>
			@endif
		</div>
		{{ $labs->links() }}
	</div>
</div>
@stop