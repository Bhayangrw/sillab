<!DOCTYPE html>
@extends('layouts.master')
@section('content')

    <div clbass="row">
        <br>
        <div>
            <h1> Pencarian Diagnosa </h1>
        </div>
        <hr>

        <div class="alert alert-success">
            <strong>Masukkan Kode ICD atau Nama Diagnosa</strong>
            <div class="form-group">
            {{ Form::open(array('route'=>'indexdiagnosa')) }}
                {{ Form::text('diagnosa', null, array('class'=>'form-control', 'placeholder'=>'Kode ICD/Nama Diagnosa', 'style'=>'width:250px; display:inline')) }}
                
                {{ Form::submit('Cari', array('class'=>'btn btn-primary')) }}
            {{ Form::close() }}
            </div>
        </div>
    </div>

@stop