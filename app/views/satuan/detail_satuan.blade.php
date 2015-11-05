<!DOCTYPE html>
@extends('layouts.master')
@section('content')

<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Satuan<small> :: Detail Data</small></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							Data detail Satuan
                        </div>
                        <div class="panel-body">
            <div class="row">
			
                <div class="col-lg-6">
						<div class="table-responsive">
								<table class="table table-bordered table-hover table-condensed">
									<tr>
										<th>Kode Satuan</th><td>{{$satuan->KdSatuan}}</td>
									</tr>
									<tr>
										<th>Satuan</th><td>{{$satuan->NmSatuan}}</td>
									</tr>
									<tr>
										<th>Keterangan</th><td>{{$satuan->Ket}}</td>
									</tr>
								</table>
								<button class="btn btn-default btn noPrint" onclick="window.print()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak</button>
								<a type="button" class="btn btn-default" href="{{ action('SatuanController@index')}}">
										<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>  Batal</a>
						</div>
					</div>
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