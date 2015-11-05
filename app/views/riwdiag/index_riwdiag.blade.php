<!DOCTYPE html>
@extends('layouts.master')
@section('content')

    <div class="row">
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

    @if(count($iddiagnosa))

        <div class="table-responsive">
            <table class="table table-bordered table-hover table-condensed">
                <thead>
                    <tr>
                        <th width="30px">No</th>
                        <th>Kode ICD</th>
                        <th>Nama Diagnosa</th>
                        <th>Action</th>
                    </tr>
                <?php $no = $iddiagnosa->getFrom(); ?>
                @foreach ($iddiagnosa as $key)
                </thead>
                <tbody>
                    <tr>

                        <td>{{ $no }}</td>
                        <td><strong>{{ $key->KdIcd }}</strong></td>
                        <td>{{ $key->Diagnosa }}</td>
                        <td align="center">
                            <a class="btn btn-default btn-xs" href="{{ action('', $key->KdIcd) }}"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Pilih</a>
                        </td>

                    </tr>
                <?php $no++; ?>
                @endforeach
                </tbody>
            </table>
        </div>

    @elseif(count($diagnosa))

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th width="30px">No</th>
                            <th>Kode ICD</th>
                            <th>Nama Diagnosa</th>
                            <th>Action</th>
                        </tr>
                    <?php $no = $diagnosa->getFrom(); ?>
                    @foreach ($diagnosa as $key)
                    </thead>
                    <tbody>
                        <tr>

                            <td>{{ $no }}</td>
                            <td>{{ $key->KdIcd }}</td>
                            <td><strong>{{ $key->Diagnosa }}</strong></td>
                            <td align="center">
                                <a class="btn btn-default btn-xs" href="{{ action('', $key->KdIcd) }}"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Pilih</a>
                            </td>

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