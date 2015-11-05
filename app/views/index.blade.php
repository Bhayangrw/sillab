@extends('layouts.master')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h2 class="page-header">Selamat Datang di Sillab<p><small>Sistem Informasi Layanan Laboratorium</small></h2>
	</div>
</div>
    <div class="col-lg-12">
	<div class="row">
    <div class="thumbnail">
      <img src="assets/img/cover2.jpg" alt="gambar puskesmas">
    </div>
	<div class="alert alert-success"> 
	
			<?php date_default_timezone_set("Asia/Bangkok"); ?>
			<b>{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</b> login sebagai Administrator Laboratorium || <b>Tanggal</b> {{ date("d-F-Y")}},<b> Jam</b> {{date("h:i:s")}}
	</div>
	</div>
    </div>
<div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-group fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$transdat}}</div>
                                    <div>Jumlah Pasien Lab</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
                                <span class="pull-left"></span>
                                <span class="pull-right"><i class="fa fa-draft"></i></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">0</div>
                                    <div>Hasil Pemeriksaan</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
                                <span class="pull-left"></span>
                                <span class="pull-right"><i class="fa fa-draft"></i></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-calculator fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" name="tglperiksa">{{$transbil}}</div>
                                    <div>Transaksi Billing</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ action('BillingController@filterindex', date("Y-m-d")) }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-edit fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$transruj}}</div>
                                    <div>Spesimen Rujukan</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ action('RujukanController@filterindex', date("Y-m-d")) }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
			</div>
@stop