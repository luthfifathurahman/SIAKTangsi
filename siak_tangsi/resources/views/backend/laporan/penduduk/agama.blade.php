<div class="tab-pane" id="tab_2">
    <table class="table table-bordered table-striped">
        <tr>
            <th style="width: 40px"><center>No</center></th>
            <th><center>Agama</center></th>
            <th colspan='2'><center>Laki-Laki</center></th>
            <th colspan='2'><center>Perempuan</center></th>
            <th colspan='2'><center>Total</center></th>
        </tr> 
        @foreach ($agama as $a)
        <tr>
            <td>{{ $loop->iteration }}</td>
            
            <td>{{ $a->agamaa }}</td>
            
            <td style="width: 80px" >{{ $a->agama_laki }}</td>
            <td style="width: 100px">{{ $a->persen_laki }} %</td>
            <td style="width: 80px" >{{ $a->agama_puan }}</td>
            <td style="width: 100px">{{ $a->persen_puan }} %</td>
            <td style="width: 80px" >{{ $a->total_laki_puan }}</td>
            <td style="width: 100px">{{ $a->persen_laki_puan }} %</td>
        </tr>
        @endforeach
        <tr>
            <th colspan='6'><center>Total</center></th>
            <th style="width: 80px" >{{ $a->total }}</th>
            <th style="width: 100px">{{ $a->persen_total }} %</th>
        </tr>
    </table>
</div>
<!-- /.tab-pane -->