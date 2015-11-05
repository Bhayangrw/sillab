<div class="panel panel-default">
    <div class="panel-heading">
        Form tambah data
    </div>
    <div class="panel-body">
        <div class="row">
    		<form role="form" action="{{ action('RiwayatDiagnosaController@store') }}" method="post">
    			<div class="col-lg-6">
    				<div class="form-group">
                        <label>Kode ICD</label>
                        <select class="form-control" id="kdsubkategori" name="kdsubkategori">
    						@foreach ($diagnosa as $value)<option value="{{$value->KdIcd}}">{{$value->KdIcd}}</option>@endforeach
                        </select>
                    </div>
    			</div>
    			<div class="col-lg-6">
    				<div class="form-group">
                        <label>Diagnosa</label>
                        <input class="form-control" id="nilairujukan" name="nilairujukan" value="" disabled="disabled">
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

<a href="#" type="button" class="btn btn-block btn-default btn-xs">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah data</a>

<a class="btn btn-default btn-xs" href="{{ action('RiwayatDiagnosaController@hapus', $key->id) }}" onclick="return confirm('Anda akan menghapus diagnosa?');"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> hapus</a>

<a class="btn btn-default btn-xs" href="#"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> hapus</a>

@section('script')

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
    var htmlobjek;
    $(document).ready(function(){
      //apabila terjadi event onchange terhadap object <select id=Kokab>
      $("#ID_KEC").change(function(){
        var ID_KEC = $("#ID_KEC").val();
        $.ajax({
            url: "ambildesa.php",
            data: "ID_KEC="+ID_KEC,
            cache: false,
            success: function(msg){
                $("#ID_KELDES").html(msg);
            }
        });
      });
    });

@stop


                                            <label>Jenis Kategori</label>
                                            <select class="form-control" id="kdjnskategori" name="kdjnskategori">
                                                @foreach ($jnskategoris as $value)<option value="{{$value->KdJnsKategori}}">{{$value->NamaJnsKategori}}</option>@endforeach
                                            </select>