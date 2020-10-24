<thead>
    <tr>
        <th>Sl No</th>
        <th>Batch Name</th>
        <th>Student Capacity</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
     @php($i=1)
     @foreach($batches as $batch)
    <tr>
    <td>{{$i++}}</td>
    <td>{{$batch->batch_name}}</td>
    <td>{{$batch->student_capacity}}</td>
      <td>
                 @if($batch->status == 1)
                 <button onclick='unpublished("{{$batch->id}}","{{$batch->class_id}}")' class="btn btn-sm btn-success fa fa-arrow-alt-circle-up" title="Unpublished"></button>
                 @else
                  <button onclick='published("{{$batch->id}}","{{$batch->class_id}}")' class="btn btn-sm btn-warning fa fa fa-arrow-alt-circle-down" title="Published"></button>
                 @endif
                  <a href="{{ route('batch-edit',['id'=>$batch->id])}}" class="btn btn-sm btn-info fa fa-edit" target="_blank" title="Edit"></a>
                    <button onclick='delt("{{$batch->id}}","{{$batch->class_id}}")' class="btn btn-sm btn-danger fa fa-trash-alt" title="Delete"></button>
                 </td>
    </tr>
    @endforeach
</tbody>
<script>
        function unpublished(batchId,classId){
             var check = confirm('If you want to unpublished this item, Press OK');
             if(check){
                $.get("{{ route('batch-unpublished')}}", {batch_id:batchId,class_id:classId}, function(data) {
                $("#batchList").html(data);
            })
          }
       }
        function published(batchId,classId){
             var check = confirm('If you want to published this item, Press OK');
             if(check){
                $.get("{{ route('batch-published')}}", {batch_id:batchId,class_id:classId}, function(data) {
                $("#batchList").html(data);
            })
          }
       }
     
        function delt(batchId,classId){
             var check = confirm('If you want to delete this item, Press OK');
             if(check){
                $.get("{{ route('batch-delete')}}", {batch_id:batchId,class_id:classId}, function(data) {
                $("#batchList").html(data);
            })
          }
       }
     
      
</script>