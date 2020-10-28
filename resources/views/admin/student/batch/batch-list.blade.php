<option value="">--Select Batch--</option>                    
@foreach ($batches as $batch)
<option value="{{ $batch->id }}">{{ $batch->batch_name }}</option>
@endforeach