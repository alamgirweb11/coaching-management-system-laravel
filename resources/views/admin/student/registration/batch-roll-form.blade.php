<div class="row">
<div class="form-group col-md-6 mb-3">
<label for="batchId" class="col-sm-4 col-form-label text-right">{{ $studentType->student_type}} Batch</label>
    <select name="batch_id[{{ $studentType->id }}]" class="form-control col-sm-8" id="batchId" required>
        <option value="">Select Batch</option>
        @foreach($batches as $batch)
    <option value="{{$batch->id}}">{{$batch->batch_name}}</option>
      @endforeach
    </select>
    <span class="text-danger"></span>
</div>

<div class="form-group col-md-6 mb-3">
    <label for="roll" class="col-sm-4 col-form-label text-right">{{ $studentType->student_type}} Roll</label>
    <input type="text" name="roll[{{ $studentType->id }}]" class="form-control col-sm-8" id="roll" placeholder="{{ $studentType->student_type}} Roll Number">
    <span class="text-danger"></span>
</div>
</div>