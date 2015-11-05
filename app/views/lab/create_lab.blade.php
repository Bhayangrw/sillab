@extends('layouts.master')
@section('content')
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Laboratorium<small> :: Tambah Data</small></h1>
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
								<form role="form" action="{{ action('LabController@handleCreate') }}" method="post">
									<div class="col-lg-6">
                                        <div class="form-group" hidden>
                                            <label>Kode Lab</label>
                                            <input class="form-control" id="kdlab" name="kdlab" value="LB{{substr($labs->KdLab,-1)+1}}" >
                                        </div>
										<div class="form-group @if ($errors->has('nmlab')) has-error @endif">
                                            <label>Nama Lab</label>
                                            <input class="form-control" id="nmlab" name="nmlab" value="" placeholder="Masukan nama lab. contoh : Paramita">
                                            @if ($errors->has('nmlab')) <p class="help-block">{{ $errors->first('nmlab') }}</p> @endif
                                        </div>
										<div class="form-group">
										<label for="dt1">Tanggal Kerjasama</label>
										<div class="input-group date form_date col-md-6" data-date="" data-date-format="dd MM yyyy" data-link-field="dt1" data-link-format="yyyy-mm-dd">
											<input class="form-control" type="text" value="" readonly>
												<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
												<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
										</div>
										<input type="hidden" id="dt1" name="tglkerjasama" value=""/>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
                                            <label>Kontak</label>
                                            <input class="form-control" id="satker" name="satker" value="" placeholder="Masukan kontak. contoh : 02243364" type="number">
                                        </div>
										<div class="form-group">
                                            <label>Alamat</label>
                                            <input class="form-control" id="alamat" name="alamat" value="" placeholder="Masukan alamat lab. contoh : Jln. Banceuy no 23 - Bandung">
                                        </div>
                                        <button type="submit" value="add" class="btn btn-default">
										<span class="glyphicon glyphicon-save" aria-hidden="true"></span> Simpan</button>
                                        <a type="button" class="btn btn-default" href="{{ action('LabController@index')}}">
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