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
                                            <label>Lab</label>
                                            <select class="form-control" id="ID_LAB" name="ID_LAB">
                                                <option>--Lab--</option>
                                                @foreach ($lab as $value)
                                                <option value="{{ $value->KdLab }}">
                                                    {{ $value->NmLab }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <label>Jenis Kategori</label>
                                            <select class="form-control" id="kdjnskategori" name="kdjnskategori">
                                                <option>--Jenis Pemeriksaan--</option>
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
            url: "{{URL::to('ambiljnskategori')}}",
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