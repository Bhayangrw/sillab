@extends('layouts.master')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Rujuk Spesimen</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				 Tabel Rujuk Spesimen
			</div>
			<!--Panel body dan table-->
			
		<div class="table-responsive">
			<div class="panel-body">
			
			<!--awal dari pencarian-->
			<table>
			<tr>
				<td>
				<p>Tanggal Registrasi</p>
				</td>
				<td></td>
				<td></td>
				<td>
				<p>No.Registrasi Pasien</p>
				</td>
			</tr>
			<tr>
			<td>
			<form role="form" action="{{action('RujukanController@filter')}}">
				<div class="form-group">
						<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dt1" data-link-format="yyyy-mm-dd">
							<input class="form-control" type="text" value="" readonly>
								<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
						</div>
					<input type="hidden" id="dt1" name="tglperiksa" value=""/>
				</div>
			</td>
			<td>
				<div class="form-group">
				<button type="submit" class="btn btn-default">Filter</button>
				</div>
			</td>
			</form>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>
			<form role="form" action="{{action('RujukanController@filterrujukan')}}">
				<div class="form-group">
					<input class="form-control" id="noreglab" name="noreglab" value="">
				</div>
			</td>
			<td>
				<div class="form-group">
				<button type="submit" class="btn btn-default">Cari</button>
				</div>
			</td>
			</form>
			</td>
			</tr>
			</table>
			<p>
			<!--akhir dari pencarian-->
			
					@if(count($viewrujukan))
					<table class="table table-bordered table-hover table-condensed">
						<thead>
						<tr>
							<th width="30px">No</th>
							<th valign="center">Nomor Spesimen</th>
							<th>Tanggal Pengiriman</th>
							<th>Tanggal Penerimaan</th>
							<th>Nama</th>
							<th>Permintaan Pemeriksaan</th>
							<th>Jenis Spesimen</th>
							<th>Gejala</th>
							<th width="150px" >Dirujuk ke</th>
							<th width="200px" align="center">
								<a href="rujukan/create" type="button" class="btn btn-block btn-default btn-xs">
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah data</a>

							</th>
						</tr>
						<?php $no = $viewrujukan->getFrom(); ?>
						@foreach ($viewrujukan as $value)
						<?php
							$a = ViewRujukandetail::select('NamaJnsKategori','Nama')->where('NmrSpesimen', '=', $value->NmrSpesimen)->get();
						?>
							
						</thead>
						<tbody>
						
						<tr>
							<td>{{ $no }}</td>
							<td>{{ $value->NmrSpesimen }}</td>
							<td>@if ($value->WaktuPengiriman==0000-00-00) 
									-
								@else
								{{date("d-m-Y",strtotime($value->WaktuPengiriman))}}
								@endif
							</td>
							<td>@if ($value->WaktuPenerimaan==0000-00-00) 
									-
								@else
								{{date("d-m-Y",strtotime($value->WaktuPenerimaan))}}
								@endif
							</td>
							<td>{{ $value->nama }}</td>
							<td>
								@foreach ($a as $hasil)
								{{ $hasil->NamaJnsKategori }}
								@endforeach
							</td>
							<td>{{ $value->JnsSpesimen}}</td>
							<td>{{ $value->Gejala}}</td>
							<td>{{ $value->NmLab }}</td>
							<td align="center">
							<a class="btn btn-default btn-xs" href="{{ action('RujukanController@edit', $value->NmrSpesimen) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Ubah</a>
							<a class="btn btn-default btn-xs" href="{{ action('RujukanController@hapus', $value->NmrSpesimen) }}" onclick="return confirm('Anda akan menghapus data rujukan?');"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> hapus</a>
							<a class="btn btn-default btn-xs" href="{{ action('RujukanController@detail', $value->NmrSpesimen) }}"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Detail</a>
							
						</tr>
						<?php $no++; ?>
						@endforeach
						</tbody>
					</table>
					<span style="float: left;">
						{{ '(Hasil '. $viewrujukan->getFrom() .'-'. $viewrujukan->getTo() .') <b>Jumlah Data : </b> '. $viewrujukan->getTotal()}}
					</span>
				</div>
			</div>
			<!--End of Panel body dan table-->
			@else
			<div class="alert alert-danger" role="alert">
				<strong>Peringatan !</strong> Tidak ada data rujukan untuk hari ini.</a>
			</div>
		@endif
	</div>
	{{ $viewrujukan->links() }}
</div>
</div>
@stop