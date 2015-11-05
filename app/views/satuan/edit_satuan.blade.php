@extends('layouts.master')
@section('content')

<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Satuan<small> :: Ubah Data</small></h1>
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
								<form role="form" action="{{ action('SatuanController@handleEdit') }}" method="post">
									<div class="col-lg-6">
                                        <div class="form-group" hidden>
                                            <label>Kode Satuan</label>
                                            <input class="form-control" name="kdsatuan" value="{{$satuan->KdSatuan}}">
                                        </div>
										<div class="form-group">
                                            <label>Satuan</label>
                                            <input class="form-control" name="nmsatuan" value="{{$satuan->NmSatuan}}">
                                        </div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
                                            <label>Keterangan</label>
                                            <input class="form-control" name="ket" value="{{$satuan->Ket}}">
                                        </div>
                                        <button type="submit" class="btn btn-default">
										<span class="glyphicon glyphicon-save" aria-hidden="true"></span> Ubah</button>
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