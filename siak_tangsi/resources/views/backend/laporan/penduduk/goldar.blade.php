<div class="tab-pane" id="tab_4">
    <table class="table table-bordered table-striped">
        <tr>
            <th style="width: 40px"><center>No</center></th>
            <th><center>Jenis Kelamin</center></th>
            <th colspan='2'><center>Laki-Laki</center></th>
            <th colspan='2'><center>Perempuan</center></th>
            <th colspan='2'><center>Total</center></th>
        </tr>
        @foreach ($goldar as $g)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $g->goldarr }}</td>
            <td style="width: 80px" >{{ $g->goldar_laki }}</td>
            <td style="width: 100px">{{ $g->persen_laki }} %</td>
            <td style="width: 80px" >{{ $g->goldar_puan }}</td>
            <td style="width: 100px">{{ $g->persen_puan }} %</td>
            <td style="width: 80px" >{{ $g->total_laki_puan }}</td>
            <td style="width: 100px">{{ $g->persen_laki_puan }} %</td>
        </tr>
        @endforeach
        <tr>
            <th colspan='6'><center>Total</center></th>
            <th style="width: 80px" >{{ $g->total }}</th>
            <th style="width: 100px">{{ $g->persen_total }} %</th>
        </tr>
    </table>
</div>
<!-- /.tab-pane -->