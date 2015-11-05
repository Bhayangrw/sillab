@extends('layouts.master')

@section('content')
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pemeriksaan<small> :: Tambah Data</small></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
						<!-- Alert sukses -->
						@if (Session::has('register_success'))
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									{{ Session::get('register_success') }}
                            </div>
						@endif 
						<!-- alert Sukses end -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form tambah data
                        </div>
            
                        
                        <div class="panel-body">
                            <div class="row">
                                <form role="form" action="{{ action('PemeriksaanController@store') }}" method="post">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            {{ Form::hidden('noreglab', $noreglab->NoRegLab) }}
                                            <label>Jenis Kategori</label>
                                            <select class="form-control" name="ID_LAB" id="ID_LAB">
                                                <option>--Lab--</option>
                                                @foreach ($lab as $key)<option value="{{$key->KdLab}}">{{$key->NmLab}}</option>@endforeach
                                            </select>
                                            <select class="form-control" id="kdjnskategori" name="kdjnskategori">
                                                <option>--Jenis Kategori--</option>
                                            </select>
                                        </div>
                                        <button type="submit" value="add" class="btn btn-default">
                                        <span class="glyphicon glyphicon-save" aria-hidden="true"></span> Simpan</button>
                                        <a type="button" class="btn btn-default" href="#">
                                        <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>  Batal</a>
                                    </div>
                                </form>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
@stop

@section('scripts')
    
    {{ HTML::script('assets/js/jquery.js') }}
    <script type="text/javascript">
    var htmlobjek;
    $(document).ready(function(){
      //apabila terjadi event onchange terhadap object <select id=Kokab>
      $("#ID_LAB").change(function(){
        var ID_LAB = $("#ID_LAB").val();
        $.ajax({
            url: "{{URL::to('ambiljeniskategori')}}",
            data: "ID_LAB="+ID_LAB,
            cache: false,
            success: function(msg){
                $("#kdjnskategori").html(msg);
            }
        });
      });
    });
    </script>

@stop

<div id="control-rujukan">
    {{ Form::label('rujukan', 'Pasien Rujukan :', array('class' => 'control-label')) }}
    <div>
        <div>
            {{ Form::radio('rujukan', 'Ya', false, array('id'=>'rujukan-0')) }}
            {{ Form::label('rujukan-0', 'Ya') }}
            <span>
                <div>
                    <button type="submit" disabled="disabled" value="add" class="btn btn-default btn-xs" id="form_isi">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Isi Form Rujukan</button>
                </div>
            </span>
        </div>
        <div>    
            {{ Form::radio('rujukan', 'Tidak', true, array('id'=>'rujukan-1')) }}    
            {{ Form::label('rujukan-1', 'Tidak') }}
        </div>
        
    </div>
