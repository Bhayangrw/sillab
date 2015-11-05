<!DOCTYPE html>
@extends('layouts.master')
@section('content')

    <div clbass="row">
        <br>
        <div>
            <h1> Pendaftaran Pasien Laboratorium </h1>
        </div>
        <hr>

        <div class="alert alert-success">
            <strong>Masukkan No Medrec atau Nama Pasien</strong>
            <div class="form-group">
            {{ Form::open(array('route'=>'indexregistrasi')) }}
                {{ Form::text('nomedrec', null, array('class'=>'form-control', 'placeholder'=>'No Medrec/Nama', 'style'=>'width:250px; display:inline')) }}
                
                {{ Form::submit('Cari', array('class'=>'btn btn-primary')) }}
            {{ Form::close() }}
            </div>
        </div>
    </div>

@stop