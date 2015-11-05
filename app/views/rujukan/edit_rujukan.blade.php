@extends('layouts.master')
@section('content')

<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Rujukan<small> :: Ubah Data</small></h1>
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
								<form role="form" action="{{ action('RujukanController@handleEdit') }}" method="post">
									<div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nomor spesimen</label>
                                            <input class="form-control" id="nmrspesimen" name="nmrspesimen" value="{{$rujukan->NmrSpesimen}}" readonly>
                                        </div>
										<div class="form-group">
                                            <label>No. Reg. Lab</label>
                                            <input class="form-control" id="noreglab" name="noreglab" value="{{$rujukan->NoRegLab}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal dan jam pengambilan spesimen</label>
                                            <div class="input-group date form_date col-md-6" data-date="" data-date-format="dd MM yyyy" data-link-field="dt1" data-link-format="yyyy-mm-dd">
                                            <input class="form-control" type="text" value="{{$rujukan->AmbilSpesimen}}" readonly>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                            <input type="hidden" id="dt1" name="ambilspesimen" value=""/>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis spesimen dan asal bahan</label>
                                            <input class="form-control" id="jnsspesimen" name="jnsspesimen" value="{{$rujukan->JnsSpesimen}}">
                                        </div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
                                            <label>Gejala/Lama penyakit</label>
                                            <input class="form-control" id="gejala" name="gejala" value="{{$rujukan->Gejala}}" placeholder="contoh = Demam, Gatal-gatal">
                                        </div>
										<div class="form-group">
                                            <label>Tanggal pengiriman</label>
                                            <div class="input-group date form_date col-md-6" data-date="" data-date-format="dd MM yyyy" data-link-field="dt2" data-link-format="yyyy-mm-dd">
                                            <input class="form-control" type="text" value="{{$rujukan->WaktuPengiriman}}" readonly>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                            <input type="hidden" id="dt2" name="waktupengiriman" value="{{$rujukan->WaktuPengiriman}}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal penerimaan</label>
                                            <div class="input-group date form_date col-md-6" data-date="" data-date-format="dd MM yyyy" data-link-field="dt3" data-link-format="yyyy-mm-dd">
                                            <input class="form-control" type="text" value="{{$rujukan->WaktuPenerimaan}}" readonly>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                            <input type="hidden" id="dt3" name="waktupenerimaan" value="{{$rujukan->waktupenerimaan}}">
                                        </div>
										<div class="form-group">
                                            <select class="form-control" id="kdlab" name="kdlab">
                                            @foreach ($lab as $value)<option value="{{$value->KdLab}}">{{$value->NmLab}}</option>@endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-default">
										<span class="glyphicon glyphicon-save" aria-hidden="true"></span> Ubah</button>
                                        <a type="button" class="btn btn-default" href="{{ action('RujukanController@index')}}">
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