@extends('layouts.master')
@section('content')
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Satuan<small> :: Tambah Data</small></h1>
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
								<form role="form" action="{{ action('SatuanController@handleCreate') }}" method="post">
									<div class="col-lg-6">
                                        <div class="form-group" hidden>
                                            <label>Kode Satuan</label>
                                            <input class="form-control" id="kdsatuan" name="kdsatuan" value="S{{substr($satuans->KdSatuan,-1)+1}}">
                                        </div>
										<div class="form-group @if ($errors->has('nmsatuan')) has-error @endif">
                                            <label>Satuan</label>
                                            <input class="form-control" id="nmsatuan" name="nmsatuan" value="{{ Input::old('nmsatuan') }}" placeholder="Masukan satuan cairan,berat dll, contoh : gr/dl">
											@if ($errors->has('nmsatuan')) <p class="help-block">{{ $errors->first('nmsatuan') }}</p> @endif
                                        </div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
                                            <label>Keterangan</label>
                                            <input class="form-control" id="ket" name="ket" value="{{ Input::old('ket') }}" placeholder="sedikit penjelasan tentang satuan tersebut">
                                        </div>
                                        <button type="submit" value="add" class="btn btn-default">
										<span class="glyphicon glyphicon-save" aria-hidden="true"></span> Simpan</button>
                                        <a type="button" class="btn btn-default" href="{{ action('SatuanController@index')}}">
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