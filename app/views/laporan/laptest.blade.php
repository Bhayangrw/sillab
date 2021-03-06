@extends('layouts.master')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Kegiatan Laboratorium</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				 Laporan Data Kegiatan Laboratorium
			</div>
			<div class="panel-body">
			<form role="form" action="{{action('LaptestController@detail')}}">
			<table>
			<tr>
				<td colspan="3">Lihat pada : 
					<div class="btn-group">
					<select class="form-control" id="kdlab" name="kdlab" >
						<option value="0">--Pilih Laboratorium--</option>
						@foreach ($lab as $value)<option value="{{$value->KdLab}}">{{$value->NmLab}}</option>@endforeach
					</select>
					</div>
				<p>
				</td>
			</tr>
			<tr>
				<td colspan="4"><b>Pencarian data berdasarkan tanggal periksa</b><p></td>
			</tr>
			<tr>
			<td>
				<div class="form-group">
						<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dt1" data-link-format="yyyy-mm-dd">
							<input class="form-control" type="text" value="" readonly placeholder="Dari tanggal">
								<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
						</div>
					<input type="hidden" id="dt1" name="tgl1" value=""/>
				</div>
			</td>
			<td>&nbsp;</td>
			<td>
				<div class="form-group">
						<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dt2" data-link-format="yyyy-mm-dd">
							<input class="form-control" type="text" value="" readonly placeholder="Sampai tanggal">
								<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
						</div>
					<input type="hidden" id="dt2" name="tgl2" value=""/>
				</div>
			</td>
			<td>&nbsp;</td>
			<td>
				<div class="form-group">
				<button type="submit" class="btn btn-default">Cari</button>
				</div>
			</td>
			</tr>
			</table>
			</form>
			<p>
			<div class="alert alert-danger" role="alert">
				<strong>Peringatan !</strong> Belum ada data yang dicari.
			</div>
		</div>
	</div>
	
</div>
</div>
@stop