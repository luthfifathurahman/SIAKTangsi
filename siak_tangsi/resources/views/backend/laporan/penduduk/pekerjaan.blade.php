
<div class="tab-pane" id="tab_6">
    <table class="table table-bordered table-striped">
        <tr>
            <th style="width: 40px"><center>No</center></th>
            <th><center>Jenis Kelamin</center></th>
            <th colspan='2'><center>Laki-Laki</center></th>
            <th colspan='2'><center>Perempuan</center></th>
            <th colspan='2'><center>Total</center></th>
        </tr>
        @foreach ($pekerjaan as $pj)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $pj->pekerjaann }}</td>
            <td style="width: 80px" >{{ $pj->pekerjaan_laki }}</td>
            <td style="width: 100px">{{ $pj->persen_laki }} %</td>
            <td style="width: 80px" >{{ $pj->pekerjaan_puan }}</td>
            <td style="width: 100px">{{ $pj->persen_puan }} %</td>
            <td style="width: 80px" >{{ $pj->total_laki_puan }}</td>
            <td style="width: 100px">{{ $pj->persen_laki_puan }} %</td>
        </tr>
        @endforeach
        <tr>
            <th colspan='6'><center>Total</center></th>
            <th style="width: 80px" >{{ $pj->total }}</th>
            <th style="width: 100px">{{ $pj->persen_total }} %</th>
        </tr>
    </table>
</div>
<!-- /.tab-pane -->