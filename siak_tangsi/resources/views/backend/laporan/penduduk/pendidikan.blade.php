<div class="tab-pane" id="tab_5">
    <table class="table table-bordered table-striped">
        <tr>
            <th style="width: 40px"><center>No</center></th>
            <th><center>Jenis Kelamin</center></th>
            <th colspan='2'><center>Laki-Laki</center></th>
            <th colspan='2'><center>Perempuan</center></th>
            <th colspan='2'><center>Total</center></th>
        </tr>
        @foreach ($pendidikan as $pn)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $pn->pendidikann }}</td>
            <td style="width: 80px" >{{ $pn->pendidikan_laki }}</td>
            <td style="width: 100px">{{ $pn->persen_laki }} %</td>
            <td style="width: 80px" >{{ $pn->pendidikan_puan }}</td>
            <td style="width: 100px">{{ $pn->persen_puan }} %</td>
            <td style="width: 80px" >{{ $pn->total_laki_puan }}</td>
            <td style="width: 100px">{{ $pn->persen_laki_puan }} %</td>
        </tr>
        @endforeach
        <tr>
            <th colspan='6'><center>Total</center></th>
            <th style="width: 80px" >{{ $pn->total }}</th>
            <th style="width: 100px">{{ $pn->persen_total }} %</th>
        </tr>
    </table>
</div>
<!-- /.tab-pane -->