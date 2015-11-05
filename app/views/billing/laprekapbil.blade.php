@if (($spesimen)==1)
	<div class="table-responsive">
		<table class="table table-bordered table-hover table-condensed">
			<thead>
			<tr>
				<th colspan="5">Pasien Spesimen Rujukan <p>
						@if (($tgl1 && $tgl2)==null)
								-
						@else
							Dari tanggal&nbsp;<b><i>{{date("d-m-Y",strtotime($tgl1))}}</i></b> Sampai <i><b>{{date("d-m-Y",strtotime($tgl2))}}</i></b></td>
						@endif
				</th>
			</tr>
			<tr>
				<th width="30px">No</th>
				<th>Tanggal Pemeriksaan</th>
				<th>Total Pasien</th>
				<th>Total Pemeriksaan</th>
				<th>Harga Total</th>
			</tr>
			</thead>
			<?php 
				$no=1;
			?>
			@foreach ($bils as $value)
			<?php
				$jmlpasien = DB::table('v_rujukan')
									->groupBy('NoRegLab')
									->select(DB::raw('count(NoRegLab)'))
									->where('tgl_reg','=',$value->tgl_reg);
				
				$detailtransaksi = DB::table('v_rujukan')
									->select(DB::raw('count(*)'))
									->where('tgl_reg','=',$value->tgl_reg);
			?>
			<tbody>
			<tr>
				<td>{{$no++}}.</td>
				<td>{{date("d F Y",strtotime($value->tgl_reg))}}</td>
				<td>{{$jmlpasien->count('NoRegLab')}} Orang</td>
				<td>{{$detailtransaksi->count('*')}} Jenis Pemeriksaan</td>
				<td align='right'>{{$value->hargatot}}</td>
			</tr>
			@endforeach
			<tr>
				<td colspan='5' align="right"> 
					<b>Rp. @foreach ($bils2 as $value) {{$value->hargatot}} @endforeach</b>
				</td>
			</tr>
			</tbody>
		</table>
		{{$bils->appends(Request::except('page'))->links()}}
		<div> 
			<a class="btn btn-default" href="{{ action('BillingController@rekapbildetail', array($tgl1,$tgl2,$spesimen)) }}"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> 
			&nbsp; Detail Pelaporan</a>
		</div>		
	</div>

@elseif (($spesimen)==2)
<div class="table-responsive">
		<table class="table table-bordered table-hover table-condensed">
			<thead>
			<tr>
				<th colspan="5">Pasien Spesimen Non-Rujukan<p>
						@if (($tgl1 && $tgl2)==null)
								-
						@else
							Dari tanggal&nbsp;<b><i>{{date("d-m-Y",strtotime($tgl1))}}</i></b> Sampai <i><b>{{date("d-m-Y",strtotime($tgl2))}}</i></b></td>
						@endif</th>
			</tr>
			<tr>
				<th width="30px">No</th>
				<th>Tanggal Pemeriksaan</th>
				<th>Total Pasien</th>
				<th>Total Pemeriksaan</th>
				<th>Harga Total</th>
			</tr>
			</thead>
			<?php 
				$no=1;
			?>
			@foreach ($bils as $value)
			<?php
				$jmlpasien = DB::table('v_bukanrujukandetail')
									->select(DB::raw('count(NoRegLab)'))
									->where('tgl_reg','=',$value->tgl_reg);
				
				$detailtransaksi = DB::table('v_bukanrujukan')
									->select(DB::raw('count(*)'))
									->where('tgl_reg','=',$value->tgl_reg);
			?>
			<tbody>
			<tr>
				<td>{{$no++}}.</td>
				<td>{{date("d F Y",strtotime($value->tgl_reg))}}</td>
				<td>{{$jmlpasien->count('NoRegLab')}} Orang</td>
				<td>{{$detailtransaksi->count('*')}} Jenis Pemeriksaan</td>
				<td align='right'>{{$value->hargatot}}</td>
			</tr>
			@endforeach
			<tr>
				<td colspan='5' align="right"> 
					<b>Rp. @foreach ($bils2 as $value) {{$value->hargatot}} @endforeach</b>
				</td>
			</tr>
			</tbody>
		</table>
		{{$bils->appends(Request::except('page'))->links()}}
		<div> 
			<a class="btn btn-default" href="{{ action('BillingController@rekapbildetail', array($tgl1,$tgl2,$spesimen)) }}"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> 
			&nbsp; Detail Pelaporan</a>
		</div>		
	</div>

@else
<div class="table-responsive">
		<table class="table table-bordered table-hover table-condensed">
			<thead>
			<tr>
				<th colspan="5">Rekap Semua<p>
						@if (($tgl1 && $tgl2)==null)
								-
						@else
							Dari tanggal&nbsp;<b><i>{{date("d-m-Y",strtotime($tgl1))}}</i></b> Sampai <i><b>{{date("d-m-Y",strtotime($tgl2))}}</i></b></td>
						@endif</th>
			</tr>
			<tr>
				<th width="30px">No</th>
				<th>Tanggal Pemeriksaan</th>
				<th>Total Pasien</th>
				<th>Total Pemeriksaan</th>
				<th>Harga Total</th>
			</tr>
			</thead>
			<?php 
				$no=1;
			?>
			@foreach ($bils as $value)
			<?php
				$jmlpasien = DB::table('reglab')
									->select(DB::raw('count(NoRegLab)'))
									->where('tgl_reg','=',$value->tgl_reg);
				
				$detailtransaksi = DB::table('v_transaksidetail')
									->select(DB::raw('count(*)'))
									->where('tgl_reg','=',$value->tgl_reg);
			?>
			<tbody>
			<tr>
				<td>{{$no++}}.</td>
				<td>{{date("d F Y",strtotime($value->tgl_reg))}}</td>
				<td>{{$jmlpasien->count('NoRegLab')}} Orang</td>
				<td>{{$detailtransaksi->count('*')}} Jenis Pemeriksaan</td>
				<td align='right'>{{$value->hargatot}}</td>
			</tr>
			@endforeach
			<tr>
				<td colspan='5' align="right"> 
					<b>Rp. @foreach ($bils2 as $value) {{$value->hargatot}} @endforeach</b>
				</td>
			</tr>
			</tbody>
		</table>
		{{$bils->appends(Request::except('page'))->links()}}
		<div> 
			<a class="btn btn-default" href="{{ action('BillingController@rekapbildetail', array($tgl1,$tgl2,$spesimen)) }}"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> 
			&nbsp; Detail Pelaporan</a>
		</div>		
	</div>
	
@endif
