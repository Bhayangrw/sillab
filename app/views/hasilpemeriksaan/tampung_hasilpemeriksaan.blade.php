<a class="btn btn-default btn noPrint" href="{{ action('HasilPemeriksaanController@index2', $reglab->NoRegLab) }}">
	<span aria-hidden="true">
	</span>
	 Kembali
</a>

<div>
<table border="0">
    <tr>
        <th>No Medrec</th>
        <td>: {{ $key->NoMedrec }}</td>
    </tr>
    <tr>
        <th>Nama</th>
        <td>: {{ $key->NamaPasien }}</td>
    </tr>
    <tr>
        <th>Jenis Kelamin</th>
        <td>: 
            @if (($key->JenisKelamin) == 0 )
                Laki-laki
            @else
                Perempuan
            @endif
        </td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>: {{ $key->Alamat }}</td>
    </tr>
</table>
<div>

<table class="table table-bordered table-hover table-condensed">
<thead>
    <tr>
        <th>No</th>
        <th>Pemeriksaan</th>
        <th>Hasil</th>
        <th>NilaiRujukan</th>
        <th>Satuan</th>
    </tr>
<?php  $no = $pemeriksaan->getFrom();?>
@foreach($subkategori as $sub)
    <tr>{{ $sub->NmSubKategori }}</tr>
    <?php 
    $jns = DB::table('pemeriksaan')
        ->where('NoRegLab', '=', $reglab->NoRegLab)
        ->where('KdTarif', '=', $sub->jnskategori->tarif->KdTarif)
        ->get();
    //$jns = Pemeriksaan::where('', '=', $sub->KdLab)->get();
    ?>
    @foreach($jns as $value)
    </thead>
    <tbody>
        <tr>
            <td>{{ $no }}</td>
            <td>{{ $value->tarif->jnskategori->NamaJnsKategori }}</td>
            <td>{{ $value->HasilPeriksa }}</td>
            <td>{{ $value->tarif->jnskategori->NilaiRujukan }}</td>
            <td>{{ $value->tarif->jnskategori->satuan->NmSatuan }}</td>
        </tr>
    <?php  $no++?>
    @endforeach
    </tbody>
@endforeach
</table>

satu:

<?php 
$jns = DB::table('pemeriksaan')
    ->where('NoRegLab', '=', $reglab->NoRegLab)
    ->where('KdTarif', '=', $sub->jnskategori->tarif->KdTarif)
    ->get();
//$jns = Pemeriksaan::where('', '=', $sub->KdLab)->get();
?>
@foreach($jns as $value)

dua:

