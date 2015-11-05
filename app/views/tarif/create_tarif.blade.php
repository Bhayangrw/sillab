@extends('layouts.master')
@section('content')
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tarif<small> :: Tambah Data</small></h1>
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
								<form role="form" action="{{ action('TarifController@handleCreate') }}" method="post">
									<div class="col-lg-6">
                                        <div class="form-group"hidden>
                                            <label>Kode Tarif</label>
											@if (count($tarifs) == null)
												<input class="form-control" id="kdtarif" name="kdtarif" value="1">
											@else
												<input class="form-control" id="kdtarif" name="kdtarif" value="{{substr($tarifs->KdTarif,3,3)+1}}">	
											@endif
                                        </div>
										<div class="form-group">
                                            <label>Laboratorium</label>
                                            <select class="form-control" id="lab" name="lab">
												@foreach ($lab as $value)<option value="{{$value->KdLab}}">{{$value->NmLab}}</option>@endforeach
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>Jenis Layanan</label>
                                            <select class="form-control" id="jnskategori" name="jnskategori">
												@foreach ($jnskategori as $value)<option value="{{$value->KdJnsKategori}}">{{$value->NamaJnsKategori}}</option>@endforeach
                                            </select>
                                        </div>
									</div>
									<div class="col-lg-6">
										<div class="form-group @if ($errors->has('harga')) has-error @endif">
                                            <label>Harga</label>
                                            <input class="form-control" id="harga" name="harga" value="{{ Input::old('harga') }}" type="number" required>
											@if ($errors->has('harga')) <p class="help-block">{{ $errors->first('harga') }}</p> @endif
                                        </div>
                                        <button type="submit" value="add" class="btn btn-default">
										<span class="glyphicon glyphicon-save" aria-hidden="true"></span> Simpan</button>
                                        <a type="button" class="btn btn-default" href="{{ action('TarifController@index')}}">
										<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>  Batal</a>
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