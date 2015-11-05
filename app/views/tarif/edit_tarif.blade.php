@extends('layouts.master')
@section('content')

<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tarif<small> :: Ubah Data</small></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							Form Ubah Data
                        </div>
                        <div class="panel-body">
                            <div class="row">
								
								<form role="form" action="{{ action('TarifController@handleEdit') }}" method="post">
									<div class="col-lg-6">
                                        <div class="form-group" hidden>
                                            <label>Kode Tarif</label>
                                            <input class="form-control" id="kdtarif" name="kdtarif" value="{{$tarif->KdTarif}}">
                                        </div>
										<div class="form-group">
                                            <label>Laboratorium</label>
                                            <select class="form-control" id="lab" name="lab">
											<option value="{{$tarif->lab->KdLab}}">{{$tarif->lab->NmLab}}</option>
												@foreach ($lab as $value)<option value="{{$value->KdLab}}">{{$value->NmLab}}</option>@endforeach
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>Jenis Layanan</label>
                                            <select class="form-control" id="jnskategori" name="jnskategori">
											<option value="{{$tarif->jnskategori->KdJnsKategori}}">{{$tarif->jnskategori->NamaJnsKategori}}</option>
												@foreach ($jnskategori as $value)<option value="{{$value->KdJnsKategori}}">{{$value->NamaJnsKategori}}</option>@endforeach
                                            </select>
                                        </div>
									</div>
									<div class="col-lg-6">
										<div class="form-group @if ($errors->has('harga')) has-error @endif">
                                            <label>Harga</label>
                                            <input class="form-control" id="harga" name="harga" value="{{$tarif->Harga}}">
											@if ($errors->has('harga')) <p class="help-block">{{ $errors->first('harga') }}</p> @endif
                                        </div>
                                        <button type="submit" value="add" class="btn btn-default">
										<span class="glyphicon glyphicon-save" aria-hidden="true"></span> Ubah</button>
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