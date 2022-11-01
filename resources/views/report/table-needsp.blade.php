@forelse($data as $show)
<tr>
    <td>{{$show->wo_dets_nbr}}</td>
    <td>{{$show->wo_schedule}}</td>
    <td>{{$show->wo_status}}</td>
    <td>{{$show->wo_dets_sp}}</td>
    <td>{{$show->spm_desc}}</td>
    <td style="text-align: right">{{number_format($show->wo_dets_sp_qty,2)}}</td>
    <td style="text-align: right">{{number_format($show->wo_dets_wh_qty,2)}}</td>
    <td style="text-align: right">{{number_format($show->wo_dets_sp_qty - $show->wo_dets_wh_qty,2)}}</td>
</tr>
@empty
<tr>
    <td colspan="8" style="color:red">
        <center>No Data Available</center>
    </td>
</tr>
@endforelse
<tr>
    <td style="border: none !important;" colspan="8">
        {{ $data->appends($_GET)->links() }}
    </td>
</tr>