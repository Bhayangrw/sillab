@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Data Hasil Pemeriksaan<small> :: Update Data</small></h1>
    </div>
        <!-- /.col-lg-12 -->
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
            <!-- /.panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Form Update Data
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form role="form" action="{{ action('HasilPemeriksaanController@update2', array($reglab->NoRegLab)) }}" method="post">
                            {{ Form::hidden('noreglab', $reglab->NoRegLab) }}
                            @foreach($pemeriksaan as $key)
                            <div class="col-lg-12">
                            <table border="0">
                                <tr>
                                    <th width="25%">{{ $key->jnskategori->NamaJnsKategori }}</th>
                                    <td width="50%"><input class="form-control" id="hasilperiksa" name="hasilperiksa" value="{{ $key->HasilPeriksa }}"></td>
                                    <th width="25%">&nbsp{{ $key->jnskategori->satuan->NmSatuan }}</th>
                                </tr>
                                <br>
                            </table>
                            </div>
                            @endforeach
                            <div class="col-lg-12">
                            <br>
                                <button type="submit" value="add" class="btn btn-default">
                                <span class="glyphicon glyphicon-save" aria-hidden="true"></span> Update</button>
                                <a type="button" class="btn btn-default" href="#">
                                <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>  Batal</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.row (nested) -->
                </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
	
@stop