@extends('layouts.master')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Laporan</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				 Permintaan Pemeriksaan
			</div>
			<!--Panel body dan table-->
			<table>
				<div class="container">
				<tr>
					<form action="" class="form-horizontal"  role="form">
					<br/>
					<td>
						<div class="form-group">
			                <label for="dtp_input1" class="col-lg-3 control-label">Pilih Tanggal</label>
			                <div class="input-group date form_date col-lg-9" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
			                    <input class="form-control" size="16" type="text" value="" readonly>
			                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
			                </div>
							<input type="hidden" id="dtp_input1" value="" />
			            </div>
					</td>
					<td>
						<div class="form-group">
			                <label for="dtp_input2" class="col-lg-3 control-label">Sampai Tanggal</label>
			                <div class="input-group date form_date col-lg-9" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
			                    <input class="form-control" size="16" type="text" value="" readonly>
			                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
			                </div>
							<input type="hidden" id="dtp_input2" value="" />
			            </div>
					</td>
					<td>
						<div class="form-group">
							<label class="col-lg-3 control-label"></label>
							<a class="btn btn-default btn" href="#">
							<span class="fa fa-search" aria-hidden="true"></span> Cari </a>
						</div>
					</td>
					</form>
				</tr>
				</div>
			</table>
			<div class="panel-body">
				<div class="table-responsive">
				
					<table class="table table-bordered table-hover table-condensed">
						<thead>
						<tr>
							<th width="30px">No</th>
							<th>Pemeriksaan</th>
							<th>Jumlah</th>
						</tr>
						
						</thead>
						<tbody>
					
						<tr>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						
						</tbody>
					</table>
				</div>
					<span style="float: left;">
					
					</span>
			</div>
			<!--End of Panel body dan table-->
			<div class="alert alert-danger" role="alert">
				<strong>Peringatan !</strong> Belum ada data yang tersimpan di basis data.
			</div>
		
	</div>
	
</div>
</div>
@stop