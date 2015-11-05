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

        {{ Form::open(array('route'=>'postregistrasi')) }}
            <div>
                {{ Form::hidden('id_pegawai', $pegawai->IdPegawai)}}
            </div>
            @if(count($satuans))
                <div class="form-group" hidden>
                    <input class="form-control" id="noreglab" name="noreglab" value="LAB{{concat($satuans->NoRegLab,-1)+1}}">
                </div>
            @else
                <div class="form-group" hidden>
                    <input class="form-control" id="noreglab" name="noreglab" value="LAB{{substr("1",-1)}}">
                </div>
            @endif
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
                            <td>{{ $key->nama }}</td>
                            <td>{{ $key->tgl_lahir }}</td>
                            <td>{{ $key->alamat }}</td>
                            <td align="center">

                            <a class="btn btn-default btn-xs" href="{{ action('RegistrasiController@lihat', $key->id_pasien) }}"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> lihat</a>

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