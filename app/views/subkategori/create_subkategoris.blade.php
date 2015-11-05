@extends('layouts.master')
@section('content')
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sub-Layanan<small> :: Tambah Data</small></h1>
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
								<form role="form" action="{{ action('SubkategoriController@handleCreate') }}" method="post">
									<div class="col-lg-6" hidden>
                                        <div class="form-group" >
                                            <label>Kode Sub-Layanan</label>
                                            <input class="form-control" id="kdsubkategori" name="kdsubkategori" value="SK{{substr($subkategori->KdSubKategori,-1)+1}}">
                                        </div>
									</div>
									<div class="col-lg-6">
										<div class="form-group @if ($errors->has('subkategori')) has-error @endif">
                                            <label>Sub-Layanan</label>
                                            <input class="form-control" id="nmsubkategori" name="nmsubkategori" value="{{ Input::old('subkategori') }}" placeholder="masukan sub-Layanan pemeriksaan">
											@if ($errors->has('subkategori')) <p class="help-block">{{ $errors->first('subkategori') }}</p> @endif
                                        </div>
                                        <button type="submit" value="add" class="btn btn-default">
										<span class="glyphicon glyphicon-save" aria-hidden="true"></span> Simpan</button>
                                        <a type="button" class="btn btn-default" href="{{ action('SubkategoriController@index')}}">
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