<!--modal section start-->
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="studentTypeAddModal" tabindex="-1" role="dialog" aria-labelledby="studentTypeAddModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="studentTypeAddModalLabel">Student Type Add Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('student-type-add')}}" method="post" id="studentTypeInsert">
          @csrf
        <div class="modal-body">
          <div class="form-group row">
                  <label for="batchName" class="col-form-label col-sm-3 text-right">Class Name</label>
                     <div class="col-sm-9">
                        <select name="class_id" id="classId" class="form-control @error('class_id') is-invalid @enderror" required autofocus>
                          <option value="">--Select Class--</option>
                          @foreach ($classes as $class)
                           <option value="{{$class->id}}">{{$class->class_name}}</option>
                          @endforeach
                            </select>
                               @error('class_id')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                               @enderror
                        </div>
               </div>
  
               <div class="form-group row mb-0">
                      <label for="studentType" class="col-form-label col-sm-3 text-right">Student Type</label>
                          <div class="col-sm-9">
                           <input type="text" class="form-control @error('student_type') is-invalid @enderror" name="student_type" value="{{ old('student_type') }}" id="studentType" placeholder="Student Type" required>
                           @error('student_type')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                     </div>
               </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-warning" id="reset" data-dismiss="modal">Reset</button>
          <button type="submit" class="btn btn-success">Save</button>
        </div>
  </form>
      </div>
    </div>
  </div>
      <!--modal section end-->