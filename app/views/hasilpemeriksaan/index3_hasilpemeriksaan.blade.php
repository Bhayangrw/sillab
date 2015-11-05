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
    
    @if(count($reglab))
        
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-condensed">
                <thead>
                    <tr>
                        <th width="30px">No</th>
                        <th>No. Medrec</th>
                        <th>No. Registrasi</th>
                        <th>Nama Pasien</th>
                        <th>Tgl Lahir</th>
                        <th>Tgl Pemeriksaan</th>
                        <th>Action</th>
                    </tr>
                <?php $no = $reglab->getFrom(); ?>
                @foreach ($reglab as $key)
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $key->pasien->id_pasien }}</td>
                        <td><strong>{{ $key->NoRegLab }}</strong></td>
                        <td>{{ $key->pasien->nama }}</td>
                        <td>{{ $key->pasien->tgl_lahir }}</td>
                        <td>{{ $key->tgl_reg }}</td>
                        <td align="center">

                        <a class="btn btn-default btn-xs" href="{{ action('HasilPemeriksaanController@lihat', $key->NoRegLab) }}"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> lihat</a>

                    </tr>
                <?php $no++; ?>
                @endforeach
                </tbody>
            </table>
        </div>

    @elseif(count($regnama))
        
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-condensed">
                <thead>
                    <tr>
                        <th width="30px">No</th>
                        <th>No. Medrec</th>
                        <th>Nama Pasien</th>
                        <th>Tgl Lahir</th>
                        <th>Action</th>
                    </tr>
                <?php $no = $regnama->getFrom(); ?>
                @foreach ($regnama as $key)
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $key->id_pasien }}</td>
                        <td><strong>{{ $key->nama }}</strong></td>
                        <td>{{ $key->tgl_lahir }}</td>
                        <td align="center">

                        <a class="btn btn-default btn-xs" href="{{ action('HasilPemeriksaanController@lihatnama', $key->id_pasien) }}"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> lihat</a>

                    </tr>
                <?php $no++; ?>
                @endforeach
                </tbody>
            </table>
        </div>

    @else
        
        <div class="alert alert-danger">
            <strong>Data Yang Anda Cari Tidak Terdaftar</strong>
        </div>

    @endif

</div>

@stop