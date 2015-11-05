<!DOCTYPE html>
@extends('layouts.master')
@section('content')

    <div class="row">
        <br>
        <div>
            <h1> Data Hasil Pemeriksaan </h1>
        </div>
        <hr>
        <div class="alert alert-success">
            <strong>Masukkan No Registrasi & Nama Pasien</strong>
            <div class="form-group">
            {{ Form::open(array('route'=>'indexhasilpemeriksaan')) }}
                {{ Form::text('noreglab', null, array('class'=>'form-control', 'placeholder'=>'No Registrasi/Nama Pasien', 'style'=>'width:250px; display:inline')) }}
                
                {{ Form::submit('Cari', array('class'=>'btn btn-primary')) }}
            {{ Form::close() }}
            <i>Prioritas Pencarian Awal: No Registrasi</i>
            </div>
        </div>
        <div>
            
        </div>
    </div>

@stop