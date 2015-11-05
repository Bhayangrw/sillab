@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Data Hasil Pemeriksaan<small> :: Update Data</small></h1>
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
                    Form Update Data
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form role="form" action="{{ action('HasilPemeriksaanController@update', array($pemeriksaan->id, $reglab->NoRegLab)) }}" method="post">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama Pemeriksan</label>
                                    <input class="form-control" id="kdjnskategori" name="kdjnskategori" value="{{ $pemeriksaan->tarif->jnskategori->NamaJnsKategori }}" disabled="disabled">
                                </div>
                                <div class="form-group">
                                    <label>Keterangan Hasil</label>
                                    <select class="form-control" id="kethasil" name="kethasil">
                                        <option value="0">Normal</option>
                                        <option value="1">Abnormal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nilai Rujukan</label>
                                    <input class="form-control" id="nilairujukan" name="nilairujukan" value="{{ $pemeriksaan->tarif->jnskategori->NilaiRujukan }}" disabled="disabled">
                                </div>
                                <div class="form-group">
                                    <label>Nilai</label>
                                    <input class="form-control" id="hasilperiksa" name="hasilperiksa" value="{{ $pemeriksaan->HasilPeriksa }}">
                                </div>
                                <button type="submit" value="add" class="btn btn-default">
                                <span class="glyphicon glyphicon-save" aria-hidden="true"></span> Update</button>
                                <a type="button" class="btn btn-default" href="{{ action('HasilPemeriksaanController@index2', $reglab->NoRegLab) }}">
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