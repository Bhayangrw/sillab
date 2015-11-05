<!DOCTYPE html>
@extends('layouts.master')
@section('content')

    <div class="row">
        <br>
        <div>
            <h1> Pendaftaran Pasien Laboratorium </h1>
        </div>
        <hr>
        <br>
        {{ Form::open(array('route'=>'createriwdiag')) }}
        <div>
            <table>
                <tr width="100%">
                    <th width="50%">{{ Form::label('label1', 'NO REGISTRASI PASIEN') }}</th>
                    <td width="50%">: {{ Form::label('label2', $reglab->NoRegLab) }}</td>
                <tr>
                <tr>
                    <th>{{ Form::label('label3', 'NAMA PASIEN') }}</th>
                    <td>: {{ Form::label('label4', $reglab->pasien->nama) }}</td>
                <tr>
            </table>
            {{ Form::hidden('noreglab', $reglab->NoRegLab) }}
        </div>
        <hr>
        <div id="control-rujukan">
            {{ Form::label('rujukan', 'Pasien Rujukan Isi Form Berikut :', array('class' => 'control-label')) }}
            <div>
                <a class="btn btn-default btn-xs" href="{{ action('RujukanController@create', $reglab->NoRegLab) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Isi Form Rujukan</a>
            </div>
        </div>

        <br>
        <div>
            {{ Form::label('label1', 'Diagnosa Pasien   : ') }}
            <div class="panel panel-default">
                <div class="panel-heading">
                     Diagnosa Pasien
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                    @if(count($riwdiag))
                        <table class="table table-bordered table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th>Kode ICD</th>
                                    <th>Diagnosa</th>
                                    <th width="135px" align="center">
                                        <button type="submit" value="add" class="btn btn-default btn-xs">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah data</button>
                                    </th>
                                </tr>
                            <?php $no = $riwdiag->getFrom(); ?>
                            @foreach ($riwdiag as $key)
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$key->KdIcd}}</td>
                                    <td>{{$key->diagnosa->Diagnosa}}</td>
                                    <td align="center">

                                    <a class="btn btn-default btn-xs" href="{{ action('RiwayatDiagnosaController@hapus', array($key->id, $reglab->NoRegLab)) }}" onclick="return confirm('Anda akan menghapus diagnosa?');"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> hapus</a>
                                    
                                </tr>
                            <?php $no++; ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                
                    @else
                <div  role="alert">
                <center><strong>Peringatan !</strong> Belum ada diagnosa untuk pasien ini.
                <br>
                {{ Form::submit('Tambah Diagnosa', array('class'=>'btn btn-primary')) }}
                <center></div>
                @endif
                </div>
            </div>
        </div>
         {{Form::close()}}

        <br>
        {{ Form::open(array('route'=>'createpemeriksaan')) }}
        <div>
            {{ Form::hidden('noreglab1', $reglab->NoRegLab) }}
        </div>
        <div>
            {{ Form::label('label1', 'Pemeriksaan Pasien   : ') }}
            <div class="panel panel-default">
                <div class="panel-heading">
                     Pemeriksaan Pasien
                </div>
                <div class="panel-body">
                    <div>
                        <table>
                            <tr>
                                <th>Lab :</th>
                                <td>
                                    <select class="form-control" id="lab" name="lab">
                                        @foreach ($lab as $value)
                                        <option value="{{$value->KdLab}}">
                                            {{$value->NmLab}}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr><i>Pilih Lab Terlebih Dahulu Sebelum Menambah Pemeriksaan</i></tr>
                        </table>
                     </div>
                     <hr>
                    <div class="table-responsive">
                    @if(count($pemeriksaan))
                        <table class="table table-bordered table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th>Nama Pemeriksaan</th>
                                    <th width="135px" align="center">
                                        <button type="submit" value="add" class="btn btn-default btn-xs">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah data</button>
                                    </th>
                                </tr>
                            <?php $no = $pemeriksaan->getFrom(); ?>
                            @foreach ($pemeriksaan as $key)
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{ $key->tarif->jnskategori->NamaJnsKategori }}</td>
                                    <td align="center">

                                    <a class="btn btn-default btn-xs" href="{{ action('PemeriksaanController@hapus', array($key->id, $reglab->NoRegLab)) }}" onclick="return confirm('Anda akan menghapus diagnosa?');"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> hapus</a>

                                </tr>
                            <?php $no++; ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                    @else
                <div  role="alert">
                <center><strong>Peringatan !</strong> Belum ada pemeriksaan untuk pasien ini.
                <br>
                {{ Form::submit('Tambah Pemeriksaan', array('class'=>'btn btn-primary')) }}
                </center></div>
                @endif
            </div>
        </div>
    </div>
    {{Form::close()}}

    <div class="" align="left">
        <a class="btn btn-primary" href="{{ action('RegistrasiController@searching') }}" onclick="return confirm('Apakah Anda Yakin Meninggalkan Halaman Ini?');"><span aria-hidden="true"></span> Selesai</a>
    </div>

@stop

@section('scripts')
    
    {{ HTML::script('assets/js/jquery.js') }}
    <script type="text/javascript" src="{{ asset('assets/js/select.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('input[name="rujukan"]').on('click', function(){
                $('#form_isi').prop('disabled',true);  
                $(this).next().children().prop('disabled',false);
            });

        });
    </script>

@stop