@extends('layouts.master')
@section('content')
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Layanan<small> :: Tambah Data</small></h1>
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
								<form role="form" action="{{ action('KategoriController@handleCreate') }}" method="post">
									<div class="col-lg-6"hidden>
                                        <div class="form-group">
                                            <label>Kode Layanan</label>
                                            <input class="form-control" id="kdkategori" name="kdkategori" value="KT{{substr($kategori->KdKategori,-1)+1}}">
                                        </div>
									</div>
									<div class="col-lg-6">
										<div class="form-group @if ($errors->has('kategori')) has-error @endif">
                                            <label>Nama Layanan</label>
                                            <input class="form-control" id="kategori" name="kategori" value="{{ Input::old('kategori') }}">
											@if ($errors->has('kategori')) <p class="help-block">{{ $errors->first('kategori') }}</p> @endif
                                        </div>
                                        <button type="submit" value="add" class="btn btn-default">
										<span class="glyphicon glyphicon-save" aria-hidden="true"></span> Simpan</button>
                                        <a type="button" class="btn btn-default" href="{{ action('KategoriController@index')}}">
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