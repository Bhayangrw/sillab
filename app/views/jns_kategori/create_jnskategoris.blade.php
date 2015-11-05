@extends('layouts.master')
@section('content')
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Jenis Layanan<small> :: Tambah Data</small></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
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
                            Form tambah data
                        </div>
                        <div class="panel-body">
                            <div class="row">
								<form role="form" action="{{ action('JnskategoriController@handleCreate') }}" method="post">
									<div class="col-lg-6">
                                        <div class="form-group" hidden >
                                            <label>Kode Jenis Layanan</label>
											@if(count($jnskategori) == null )
												<input class="form-control" id="kdjnskategori" name="kdjnskategori" value="JK1">
												@else
												 <input class="form-control" id="kdjnskategori" name="kdjnskategori" value="JK{{substr($jnskategori->KdJnsKategori,2,3)+1}}">
													@endif
                                        </div>
										<div class="form-group">
                                            <label>Jenis Layanan</label>
                                            <input class="form-control" id="nmjnskategori" name="nmjnskategori">
                                        </div>
										<div class="form-group">
                                            <label>Sub-Layanan</label>
                                            <select class="form-control" id="kdsubkategori" name="kdsubkategori">
												@foreach ($subkategori as $value)<option value="{{$value->KdSubKategori}}">{{$value->NmSubKategori}}</option>@endforeach
                                            </select>
                                        </div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
                                            <label>Layanan</label>
                                            <select class="form-control" id="kdkategori" name="kdkategori">
												@foreach ($kategori as $value)<option value="{{$value->KdKategori}}">{{$value->NamaKategori}}</option>@endforeach
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>Satuan</label>
                                            <select class="form-control" id="kdsatuan" name="kdsatuan">
												@foreach ($satuan as $values)<option value="{{$values->KdSatuan}}">{{$values->NmSatuan}}</option>@endforeach
                                            </select>
                                        </div>
										<div class="form-group @if ($errors->has('')) has-error @endif">
                                            <label>Nilai Rujukan</label>
                                            <input class="form-control" id="nilairujukan" name="nilairujukan" value="">
                                        </div>
										<div class="form-group">
                                        <button type="submit" value="add" class="btn btn-default">
										<span class="glyphicon glyphicon-save" aria-hidden="true"></span> Simpan</button>
                                        <a type="button" class="btn btn-default" href="{{ action('JnskategoriController@index')}}">
										<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>  Batal</a>
										</div>
									</div>
								</form>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
	
@stop