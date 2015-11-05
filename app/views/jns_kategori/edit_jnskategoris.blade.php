@extends('layouts.master')
@section('content')
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Jenis Layanan<small> :: Ubah Data</small></h1>
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
                            Form Ubah data
                        </div>
                        <div class="panel-body">
                            <div class="row">
								<form role="form" action="{{ action('JnskategoriController@handleEdit') }}" method="post">
									<div class="col-lg-6">
                                        <div class="form-group" hidden>
                                            <label>Kode Jenis Layanan</label>
                                            <input class="form-control" id="kdjnskategori" name="kdjnskategori" value="{{$jnskategori->KdJnsKategori}}">
                                        </div>
										<div class="form-group">
                                            <label>Jenis Layanan</label>
                                            <input class="form-control" id="nmjnskategori" name="nmjnskategori" value="{{$jnskategori->NamaJnsKategori}}">
                                        </div>
										<div class="form-group">
                                            <label>Layanan</label>
                                            <select class="form-control" id="kdkategori" name="kdkategori">
											<option value="{{$jnskategori->kategori->KdKategori}}">{{$jnskategori->kategori->NamaKategori}}</option>
                                                @foreach ($kategori as $value)<option value="{{$value->KdKategori}}">{{$value->NamaKategori}}</option>@endforeach
                                            </select>
                                        </div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
                                            <label>Sub-Kategori</label>
                                            <select class="form-control" id="kdsubkategori" name="kdsubkategori">
											<option value="{{$jnskategori->subkategori->KdSubKategori}}">{{$jnskategori->subkategori->NmSubKategori}}</option>
                                                @foreach ($subkategori as $value)<option value="{{$value->KdSubKategori}}">{{$value->NmSubKategori}}</option>@endforeach
											</select>
                                        </div>
										<div class="form-group">
                                            <label>Satuan</label>
                                            <select class="form-control" id="kdsatuan" name="kdsatuan">
											<option value="{{$jnskategori->satuan->KdSatuan}}">{{$jnskategori->satuan->NmSatuan}}</option>
                                                @foreach ($satuan as $values)<option value="{{$values->KdSatuan}}">{{$values->NmSatuan}}</option>@endforeach
                                            </select>
                                        </div>
										<div class="form-group @if ($errors->has('')) has-error @endif">
                                            <label>Nilai Rujukan</label>
                                            <input class="form-control" id="nilairujukan" name="nilairujukan" value="{{$jnskategori->NilaiRujukan}}">
                                        </div>
                                        <button type="submit" value="add" class="btn btn-default">
										<span class="glyphicon glyphicon-save" aria-hidden="true"></span> Simpan</button>
                                        <a type="button" class="btn btn-default" href="{{ action('JnskategoriController@index')}}">
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