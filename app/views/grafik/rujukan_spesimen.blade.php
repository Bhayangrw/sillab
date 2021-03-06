<div class="panel panel-default">
			<div class="panel-body">
			<div class="row">
               <div id="kunjunganpasien"></div>
			</div>
			</div>
		</div>
		
</div>
</div>


<script type="text/javascript">
$(function () {
    $('#kunjunganpasien').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Data Rujukan Spesimen Tahun {{{$tahun}}}'
        },
        subtitle: {
            text: '{{{ isset(Auth::user()->name) ? Auth::user()->lab->NmLab : Auth::user()->email }}}'
        },
        xAxis: {
            categories: [@foreach ($reglab as $v) '{{ $v->Month}}', @endforeach],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.f} orang</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series:[{
            name: 'Pasien',
            data:  [ @foreach ($reglab as $v) {{ $v->Count}}, @endforeach] 
                }]
    });
});
</script>