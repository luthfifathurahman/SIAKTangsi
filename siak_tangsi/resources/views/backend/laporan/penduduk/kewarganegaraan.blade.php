<div class="tab-pane" id="tab_3">
    <table class="table table-bordered table-striped">
        <tr>
            <th style="width: 40px"><center>No</center></th>
            <th><center>Kewarganegaraan</center></th>
            <th colspan='2'><center>Laki-Laki</center></th>
            <th colspan='2'><center>Perempuan</center></th>
            <th colspan='2'><center>Total</center></th>
        </tr>
        @foreach ($kewarganegaraan as $k)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $k->kewarganegaraann }}</td>
            <td style="width: 80px" >{{ $k->kewarganegaraan_laki }}</td>
            <td style="width: 100px">{{ $k->persen_laki }} %</td>
            <td style="width: 80px" >{{ $k->kewarganegaraan_puan }}</td>
            <td style="width: 100px">{{ $k->persen_puan }} %</td>
            <td style="width: 80px" >{{ $k->total_laki_puan }}</td>
            <td style="width: 100px">{{ $k->persen_laki_puan }} %</td>
        </tr>
        @endforeach
        <tr>
            <th colspan='6'><center>Total</center></th>
            <th style="width: 80px" >{{ $k->total }}</th>
            <th style="width: 100px">{{ $k->persen_total }} %</th>
        </tr>
    </table>
</div>
<!-- /.tab-pane -->