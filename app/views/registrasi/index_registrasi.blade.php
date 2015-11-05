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
            <i>Prioritas Pencarian Awal: No Registrasi</i>
            </div>
        </div>
        {{ Form::open(array('route'=>'postregistrasi')) }}
            <div>
                {{ Form::hidden('id_pegawai', $pegawai->IdPegawai)}}
            </div>
            <div>
                @foreach($pasien as $key)
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-condensed">
                                <tr width="100%">
                                    <th width="20%">Nomor Medrec</th><td width="80%">{{$key->id_pasien}}</td>
                                </tr>
                                <tr>
                                    <th>Nama Pasien</th><td>{{$key->nama}}</td>
                                </tr>
                                <tr>
                                    <th>Tgl Lahir</th><td>{{ date("d F Y",strtotime($key->tgl_lahir)) }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th><td>{{$key->Alamat}}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>
                                        @if (($key->JenisKelamin) == 0 )
                                            Laki-laki
                                        @else
                                            Perempuan
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Sasaran</th>
                                        <td>    
                                            <select class="form-control" id="sasaran" name="sasaran">
                                                <option value="Pasien Umum">Pasien Umum</option>
                                                <option value="Ibu Hamil">Ibu Hamil</option>
                                                <option value="Anak Sekolah">Anak Sekolah</option>
                                            </select>
                                        </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                    {{ Form::hidden('no_medrec', $key->id_pasien)}}
                    {{ Form::hidden('tgl_reg',date("Y-m-d"))}}
                    </div><br>
                @endforeach
            {{ Form::submit('DAFTAR', array('class'=>'btn btn-primary')) }}
            </div>
        {{ Form::close() }}
        <div>
        
        </div>
    </div>

@stop