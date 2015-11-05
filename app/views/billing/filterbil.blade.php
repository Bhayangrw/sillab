@extends('layouts.master')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Billing Laboratorium</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				 Tabel Data Billing Laboratorium
			</div>
			<!--Panel body dan table-->
			<div class="panel-body">
			<table>
			<tr>
				<td>
				<p>Tanggal Pemeriksaan</p>
				</td>
				<td></td>
				<td></td>
				<td>
				<p>Pencarian</p>
				</td>
			</tr>
			<tr>
			<td>
			<form role="form" action="{{action('BillingController@filter')}}">
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
			<form role="form" action="{{action('BillingController@filterReglab')}}">
				<div class="form-group">
					<input class="form-control" id="noreglab" name="noreglab" value="" placeholder="Noreglab/Nama" required>
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
				<div class="table-responsive">
					@if(count($bils))
					<table class="table table-bordered table-hover table-condensed">
						<thead>
						<tr>
							<th width="30px">No</th>
							<th>Tanggal Periksa</th>
							<th>NoRegLab</th>
							<th>Nama Pasien</th>
							<th>Harga Total</th>
							<th>Status Spesimen</th>
							<th>Status Pembayaran</th>
							<th width="145px" align="center">
								<div align="center">Aksi</div>
							</th>
						</tr><td hidden>{{$no=1}}</td>
						@foreach ($bils as $value)
						<?php
							$a = DB::table('billing')->where('NoReglab', '=', $value->NoReglab)->get();
							$rujukan = DB::table('v_rujukan')->where('NoReglab', '=', $value->NoReglab)->first();
						?>
						</thead>
						<tbody>
						<tr>
							<td>{{ $no }}</td>
							<td>{{date("d F, Y",strtotime($value->tgl_reg))}}</td>
							<td>{{ $value->NoReglab }}</td>
							<td>{{ $value->Nama }}</td>
							<td>{{ $value->total }}</td>
							<td>@if (($rujukan == null))
											Non-Rujukan
										@else
											Rujukan
										@endif
							</td>
							<td>
							@foreach ($a as $v)
								@if (($v->StatusPembayaran) == 0 )
									Belum Lunas
								@else 
									Lunas	
								@endif
									</td>
									<td align="center">
								@if (($v->StatusPembayaran) == 0 )
									<a type="submit" class="btn btn-default btn-xs" href="{{ action('BillingController@status2', array($value->NoReglab, 1 )) }}"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> Cek</a>
								@else
									<a type="submit" class="btn btn-default btn-xs" href="" disabled><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>Cek</a>
								@endif
									<a class="btn btn-default btn-xs" href="{{ action('BillingController@detail', $value->NoReglab) }}">
									<span class="glyphicon glyphicon-book" aria-hidden="true"></span> Detail</a>
							@endforeach
							</td>
						</tr>
						<?php $no++; ?>
						@endforeach
						</tbody>
					</table>
				</div>
					<span style="float: left;">
						{{ '(Hasil  '. $bils->getFrom() .'-'. $bils->getTo() .')  <b>jumlah data :</b> '. $bils->getTotal()}}
					</span>
			</div>
			<!--End of Panel body dan table-->
			@else
			<div class="alert alert-danger" role="alert">
				<strong>Peringatan !</strong> Tidak ada pencarian data.
			</div>
		@endif
	</div>
	{{$bils->appends(Request::except('page'))->links()}}
</div>
</div>
@stop