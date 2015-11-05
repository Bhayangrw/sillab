<!DOCTYPE html>
@extends('layouts.master')
@section('content')

    <div class="row">
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

    @if(count($pasien))

        <div class="table-responsive">
            <table class="table table-bordered table-hover table-condensed">
                <thead>
                    <tr>
                        <th width="30px">No</th>
                        <th>No Medrec</th>
                        <th>Nama Pasien</th>
                        <th>Jenis Kelamin</th>
                        <th>Tgl Lahir</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                <?php $no = $pasiennama->getFrom(); ?>
                @foreach ($pasien as $key)
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $no }}</td>
                        <td><strong>{{ $key->id_pasien }}</strong></td>
                        <td>{{ $key->nama }}</td>
                        <td>{{ $key->kelamin }}</td>
                        <td>{{ $key->tgl_lahir }}</td>
                        <td>{{ $key->kepalaKeluarga->alamat.' RT.'.$key->kepalaKeluarga->RT.' RW.'.$key->kepalaKeluarga->RW.' Kelurahan '.$key->kepalaKeluarga->kelurahan->nama_kelurahan.' Kecamatan '.$key->kepalaKeluarga->kelurahan->nama_kecamatan.' '.$key->kepalaKeluarga->kota}}</td>
                        <td align="center">

                        <a class="btn btn-default btn-xs" href="{{ action('RegistrasiController@lihat', $key->id_pasien) }}"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> lihat</a></td>

                    </tr>
                <?php $no++; ?>
                @endforeach
                </tbody>
            </table>
        </div>

    @elseif(count($pasiennama))

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th width="30px">No</th>
                            <th>No Medrec</th>
                            <th>Nama Pasien</th>
                            <th>Tgl Lahir</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    <?php $no = $pasiennama->getFrom(); ?>
                    @foreach ($pasiennama as $key)
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $key->id_pasien }}</td>
                            <td><strong>{{ $key->nama }}</strong></td>
                            <td>{{ $key->tgl_lahir }}</td>
                            <td>{{ $key->kepalaKeluarga->alamat.' RT.'.$key->kepalaKeluarga->RT.' RW.'.$key->kepalaKeluarga->RW.' Kelurahan '.$key->kepalaKeluarga->kelurahan->nama_kelurahan.' Kecamatan '.$key->kepalaKeluarga->kelurahan->nama_kecamatan.' '.$key->kepalaKeluarga->kota}}</td>
                            <td align="center">

                            <a class="btn btn-default btn-xs" href="{{ action('RegistrasiController@lihat', $key->id_pasien) }}"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> lihat</a></td>

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
@stop