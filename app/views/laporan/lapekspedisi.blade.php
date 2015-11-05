@extends('layouts.master')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Ekspedisi Pengambilan</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				 Laporan Data Ekspedisi Pengambilan
			</div>
			<div class="panel-body">
			<table>
			<tr>
				<td colspan="4"><b>Pencarian data berdasarkan</b><p></td>
			</tr>
			<tr>
				<td>
				<form role="form" action="{{action('LapekspedisiController@find')}}">
					<div class="form-group">
						<input class="form-control" id="noreglab" name="noreglab" value="" placeholder="Cari No Registrasi Lab">
					</div>
				</td>
			<td>&nbsp;</td>
				<td colspan="2">
					<div class="form-group">
					<button type="submit" class="btn btn-default">Cari</button>
					</div>
				</td>
			</tr>
			<form role="form" action="{{action('LapekspedisiController@find')}}">
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
				<button type="submit" class="btn btn-default">Filter</button>
				</div>
			</td>
			</tr>
			</form>
			</table>
			
			<div class="alert alert-danger" role="alert">
				<strong>Peringatan !</strong> Belum ada data yang dicari.
			</div>
	</div>
</div>
</div>
</div>
</div>
			
@stop