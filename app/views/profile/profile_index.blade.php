@extends('layouts.master')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Profile</h1>
	</div>
	
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				 Tabel Profile Pengguna
			</div>
			<!--Panel body dan table-->
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-condensed">
						<tr>
							<td width="150px"><b>Nama</td>
							<td width="5px">:</td>
							<td>{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</td>
						</tr>
						<tr>
							<td><b>email</td>
							<td>:</td>
							<td>{{{ isset(Auth::user()->name) ? Auth::user()->email : Auth::user()->email }}}</td>
						</tr>
						<tr>
							<td><b>User</td>
							<td>:</td>
							<td>{{{ isset(Auth::user()->name) ? Auth::user()->username : Auth::user()->email }}}</td>
						</tr>
						<tr>
							<td><b>Satuan Kerja</td>
							<td>:</td>
							<td>{{{ isset(Auth::user()->name) ? Auth::user()->lab->NmLab : Auth::user()->email }}}</td>
						</tr>
					</table>
				</div>
			</div>
	</div>
</div>
</div>
@stop