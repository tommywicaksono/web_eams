@forelse ($data as $show)
<tr class="foottr">
  <td class="foot2" data-label="WO Number">{{ $show->wo_nbr }}</td>
  <td class="foot2" data-label="Asset">{{ $show->asset_code }} -- {{ $show->asset_desc }}</td>
  @if($show->wo_type == 'auto')
    <td class="foot2" data-label="WO Type">Preventive</td>
  @elseif($show->wo_type == 'direct')
    <td class="foot2" data-label="WO Type">Direct</td>
  @elseif($show->wo_type == 'other')
    @if($show->wo_sr_nbr != null)
      <td class="foot2" data-label="WO Type">WO from service request</td>
    @else
      <td class="foot2" data-label="WO Type">Work Order</td>
    @endif
  @endif
  <td class="foot2" data-label="Status">{{ $show->wo_status }}</td>
  <td class="foot2" >
  <div class="text-center">
  <input type="hidden" name='wonbrr' value="{{$show->wo_nbr}}"> 
  <input type="hidden" name='wotypee' value="{{$show->wo_type}}"> 
  @if($show->wo_status == 'started')
    <!-- <button type="button" class="btn btn-success btn-action jobview" style="width: 80%;">View</button> -->
    <a class="btn btn-success btn-action" href="{{route('editWO', $show->wo_nbr)}}"><i class="fas fa-check-square"></i></a>
  
  @endif

  
  @if($show->wo_status =='finish' && $show->wo_type != 'auto')
  <a class="aprint" target="_blank" style="width: 80%;"><button type="button" class="btn btn-warning bt-action" style="width: 80%;"><b>Print<b></button></a>
  @elseif($show->wo_status =='finish' && $show->wo_type == 'auto')
    <a style="width: 80%;"><button type="button" class="btn btn-warning bt-action" style="width: 80%;">...</button></a>
    <!-- <button type="button" class="btn btn-secondary bt-action" style="width: 80%;" disabled="true"><b>Print<b></button>   -->
  @endif


  {{-- Print 
  @if($show->wo_status == 'finish' )
    <a class="aprint" target="_blank" style="width: 80%;"><button type="button" class="btn btn-warning bt-action" style="width: 80%;"><b>Print<b></button></a> 
  @endif
  --}}
  </div> 
    
  </td>
</tr>
@empty
<tr>
  <td colspan="5" style="color:red;">
    <center>No Task Available</center>
  </td>
</tr>
@endforelse
<tr>
  <td style="border: none !important;">
    {{ $data->links() }}
  </td>
</tr>