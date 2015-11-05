@extends('layouts.master')
@section('content')
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Riwayat Diagnosa<small> :: Tambah Data</small></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
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
                                <form role="form" action="{{ action('RiwayatDiagnosaController@store') }}" method="post">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            {{ Form::hidden('noreglab', $noreglab->NoRegLab) }}
                                            <label>Kode ICD</label>
                                            <select class="form-control" id="kdicd" name="kdicd">
                                                @foreach ($diagnosa as $value)<option value="{{$value->KdIcd}}">{{$value->Diagnosa}}</option>@endforeach
                                            </select>
                                        </div>
                                        <button type="submit" value="add" class="btn btn-default">
                                        <span class="glyphicon glyphicon-save" aria-hidden="true"></span> Simpan</button>
                                        <a type="button" class="btn btn-default" href="{{ action('RegistrasiController@index2', $noreglab->NoRegLab)}}">
                                        <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>  Batal</a>
                                    </div>
                                </form>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
	
@stop