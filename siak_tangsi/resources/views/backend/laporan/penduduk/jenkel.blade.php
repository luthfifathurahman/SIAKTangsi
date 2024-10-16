<div class="tab-pane active" id="tab_1">
    <table class="table table-bordered table-striped">
        <tr>
            <th style="width: 40px"><center>No</center></th>
            <th><center>Jenis Kelamin</center></th>
            <th colspan='2'><center>Laki-Laki</center></th>
            <th colspan='2'><center>Perempuan</center></th>
            <th colspan='2'><center>Total</center></th>
        </tr>
        
        @foreach ($jenkel as $j)
        <tr>
            <td>{{ $loop->iteration }}</td>
            
            <td>{{ $j->jenkell }}</td>
            
            <td style="width: 80px">{{ $j->jenkel_laki }}</td>
            <td style="width: 100px">{{ $j->persen_laki }} %</td>
            <td style="width: 80px">{{ $j->jenkel_puan }}</td>
            <td style="width: 100px">{{ $j->persen_puan }} %</td>
            <td style="width: 80px">{{ $j->total_laki_puan }}</td>
            <td style="width: 100px">{{ $j->persen_laki_puan }} %</td>
        </tr>
        @endforeach
        <tr>
            <th colspan='6'><center>Total</center></th>
            <th style="width: 80px">{{ $j->total }}</th>
            <th style="width: 100px">{{ $j->persen_total }} %</th>
        </tr>
    </table>
</div>
<!-- /.tab-pane -->