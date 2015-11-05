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
    
    {{ Form::open(array('route'=>'searchpemeriksaan', 'method'=>'get')) }}
        <div>
            <div>
            <table border="0">
                <tr>
                    <th>{{ Form::label('noreg', 'No Register Lab.') }}</th>
                    <td>: {{ Form::label('noreglab', $reglab->NoRegLab) }}</td>
                </tr>
                <tr>
                    <th>{{ Form::label('nama', 'Nama Pasien') }}</th>
                    <td>: {{ Form::label('noreglab', $reglab->pasien->NamaPasien) }}</td>
                </tr>
            </table>
            <br>
        </div>
        <br>
        

    {{ Form::open(array('route'=>'edithasilpemeriksaan', $reglab->NoRegLab)) }}
    <div>
        {{ Form::hidden('noreglab1', $reglab->NoRegLab) }}
    </div>
    <br>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">
                 Data Hasil Pemeriksaan Pasien
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                @if(count($pemeriksaan2))
                    <table class="table table-bordered table-hover table-condensed">
                        <thead>
                            <tr>
                                <th width="3%">No.</th>
                                <th width="22%">Nama Pemeriksaan</th>
                                <th width="15%">Hasil</th>
                                <th width="15%">Nilai Rujukan</th>
                                <th width="15%">Keterangan</th>
                                <th width="15%">Satuan</th>
                                <th width="15%">Tindakan</th>
                            </tr>
                        <?php $no = $pemeriksaan2->getFrom(); ?>
                        @foreach ($pemeriksaan2 as $key)
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $key->tarif->jnskategori->NamaJnsKategori }}</td>
                                <td>{{ $key->HasilPeriksa }}</td>
                                <td>{{ $key->tarif->jnskategori->NilaiRujukan }}</td>
                                <td>
                                        @if (($key->Ket_Hasil) == 0 )
                                            Normal
                                        @else
                                            Abnormal
                                        @endif
                                </td>
                                <td>{{ $key->tarif->jnskategori->satuan->NmSatuan }}</td>
                                <td align="center">

                                <a class="btn btn-default btn-xs" href="{{ action('HasilPemeriksaanController@edit', array($key->id, $key->NoRegLab) ) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</a>
                                
                                </td>
                            </tr>
                        <?php $no++; ?>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @else
            <div  role="alert">
            <strong>Peringatan !</strong> Belum ada diagnosa untuk pasien ini.
            {{ Form::submit('Tambah Diagnosa', array('class'=>'btn btn-primary')) }}
            </div>
            @endif
            </div>
        </div>
    </div>
    {{Form::close()}}

    <a class="btn btn-default btn noPrint"  href="{{ action('HasilPemeriksaanController@detil', $reglab->NoRegLab) }}"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Detail</a>
    
    <div align="right">
    {{ Form::submit('Selesai', array('class'=>'btn btn-primary', 'onclick'=>"return confirm('Apakah Anda Yakin Meninggalkan Halaman Ini?');")) }}
    </div>
    {{ Form::close() }}
</div>

@stop