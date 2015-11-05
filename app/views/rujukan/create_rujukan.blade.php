@extends('layouts.master')
@section('content')
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Rujukan<small> :: Tambah Data</small></h1>
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
                                <form role="form" action="{{ action('RujukanController@handleCreate') }}" method="post">
                                    <div class="col-lg-6">
                                        <div class="form-group @if ($errors->has('nmrspesimen')) has-error @endif">
                                            <label>Nomor spesimen</label>
                                            @if(count($rujukan) == null )
                                                <input class="form-control" id="nmrspesimen" name="nmrspesimen" value="SPN1" readonly>
                                            @else
                                                @if($rujukan->NoRegLab == $reglab->NoRegLab)
                                                    <input class="form-control" id="nmrspesimen" name="nmrspesimen" value="{{$rujukan->NmrSpesimen}}" readonly>
                                                @else
                                                    <input class="form-control" id="nmrspesimen" name="nmrspesimen" value="SPN{{substr($rujukan->NmrSpesimen,3,4)+1}}" readonly>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Registrasi Laboratorium</label>
                                            <input class="form-control" id="noreglab" name="noreglab" value="{{$reglab->NoRegLab}}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis spesimen/asal bahan</label>
                                            <input class="form-control" id="jnsspesimen" name="jnsspesimen" placeholder="contoh = Darah, Air Seni, Dahak">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group @if ($errors->has('gejala')) has-error @endif">
                                            <label>Gejala/Lama penyakit</label>
                                            <input class="form-control" id="gejala" name="gejala" placeholder="contoh = Demam, Gatal-gatal">
                                            @if ($errors->has('gejala')) <p class="help-block">{{ $errors->first('gejala') }}</p> @endif
                                        </div>
                                        <div class="form-group @if ($errors->has('waktupengiriman')) has-error @endif">
                                            <label>Tanggal pengiriman</label>
                                            <div class="input-group date form_date col-md-6" data-date="" data-date-format="dd MM yyyy" data-link-field="dt2" data-link-format="yyyy-mm-dd">
                                            <input class="form-control" type="text" value="" readonly>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                            <input type="hidden" id="dt2" name="waktupengiriman" value=""/>
                                        </div>
                                        <div class="form-group">
                                            <label>Rujuk ke laboratorium</label>
                                            <select class="form-control" id="test" name="test">
                                            @foreach ($lab as $value)<option value="{{$value->KdLab}}">{{$value->NmLab}}</option>@endforeach
                                            </select>
                                        </div>
                                        @if($rujukan->NoRegLab == $reglab->NoRegLab)
                                            <button type="submit" value="add" class="btn btn-default" disabled="disabled">
                                            <span class="glyphicon glyphicon-save" aria-hidden="true" ></span> Simpan</button>
                                            <a type="button" class="btn btn-default" href="{{ action('RujukanController@indexx', $reglab->NoRegLab)}}">
                                            <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>  Batal</a>
                                            <br><i>Data Rujukan Telah Dibuat: Bila Ingin Melakukan Perubahan Silahkan Menggunakan Menu Rujukan</i>
                                        @else
                                            <button type="submit" value="add" class="btn btn-default">
                                            <span class="glyphicon glyphicon-save" aria-hidden="true"></span> Simpan</button>
                                            <a type="button" class="btn btn-default" href="{{ action('RujukanController@indexx', $reglab->NoRegLab)}}">
                                            <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>  Batal</a>
                                        @endif
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