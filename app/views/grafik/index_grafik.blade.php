@extends('layouts.master')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Grafik</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				 Filter berdasarkan Pilihan dan Tahun
			</div>
			<!--Panel body dan table-->
			<div class="panel-body">
			<form role="form" action="{{action('grafik')}}">
			<table>
			<tr>
				<td>Lihat grafik</td>
				<td></td>
				<td>Tahun</td>
			</tr>
			<tr>
				<td> 
					<div class="btn-group">
					<select class="form-control" id="cari_grafik" name="cari_grafik">
						<option value="0">--Pilih Grafik--</option>
						<option value="1">Kunjungan Pasien</option>
						<option value="3">Rujukan Spesimen</option>
					</select>
					</div>
				</td>
				<td>&nbsp;&nbsp;</td>
				<td>
					<div class="btn-group">
					<select class="form-control" id="tahun" name="tahun">
						<option> @foreach ($caritahun as $v) {{ $v->Year}} @endforeach </option>
					</select>
					</div>
				</td>
				<td>&nbsp;</td>
				<td>
					<div class="btn-group">
					<button type="submit" class="btn btn-default">Cari</button>
					</div>
				</td>
			</tr>
			</table>
			</form>
			</div><!--End of Panel body dan table-->
	</div>
@if (($carigrafik) == 1 )
	@include('grafik.kunjungan_pasien')
@elseif (($carigrafik) == 2 )
	Grafik Jenis Kategori
@elseif (($carigrafik) == 3 )
	@include('grafik.rujukan_spesimen')
@else
	<div class="alert alert-danger" role="alert">
		<strong>Peringatan!</strong> Tidak ada grafik yang ditampilkan.
	</div>
@endif

@stop