<!--modal section start-->
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="studentBasicInfoUpdate" tabindex="-1" role="dialog" aria-labelledby="studentBasicInfoUpdateTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="studentBasicInfoUpdateLabel">Student Basic Info Edit Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('student-basic-info-update')}}" method="post" id="studentBasicInfoUpdate" enctype="multipart/form-data">
          @csrf
        <div class="modal-body">
            <div class="form-group row">
                <label for="studentName" class="col-form-label col-sm-3 text-right">Student Name</label>
                <div class="col-sm-9">
                <input type="text" name="student_name" class="form-control" placeholder="Student Name" value="{{$students[0]->student_name}}">
                <span class="text-danger"></span>
            </div>
            </div>
            
            <div class="form-group row">
                <label for="fatherName" class="col-form-label col-sm-3 text-right">Father's Name</label>
                <div class="col-sm-9">
                <input type="text" name="father_name" class="form-control" placeholder="Father's Name" value="{{$students[0]->father_name}}">
                <span class="text-danger"></span>
            </div>
            </div>

            <div class="form-group row">
                <label for="fatherProfession" class="col-form-label col-sm-3 text-right">Father's Profession</label>
                <div class="col-sm-9">
                <input type="text" name="father_profession" class="form-control" placeholder="Father's Profession" value="{{$students[0]->father_profession}}">
                <span class="text-danger"></span>
            </div>
            </div>

            <div class="form-group row">
                <label for="fatherMobile" class="col-form-label col-sm-3 text-right">Father's Mobile</label>
                <div class="col-sm-9">
                <input type="text" name="father_mobile" class="form-control" placeholder="Father's Mobile" value="{{$students[0]->father_mobile}}">
                <span class="text-danger"></span>
            </div>
            </div>

            <div class="form-group row">
                <label for="motherName" class="col-form-label col-sm-3 text-right">Mother's Name</label>
                <div class="col-sm-9">
                <input type="text" name="mother_name" class="form-control" placeholder="Mother's Name" value="{{$students[0]->mother_name}}">
                <span class="text-danger"></span>
            </div>
            </div>

            <div class="form-group row">
                <label for="motherProfession" class="col-form-label col-sm-3 text-right">Mother's Profession</label>
                <div class="col-sm-9">
                <input type="text" name="mother_profession" class="form-control" placeholder="Mother's Profession" value="{{$students[0]->mother_profession}}">
                <span class="text-danger"></span>
            </div>
            </div>

            <div class="form-group row">
                <label for="motherMobile" class="col-form-label col-sm-3 text-right">Mother's Mobile</label>
                <div class="col-sm-9">
                <input type="text" name="mother_mobile" class="form-control" placeholder="Mother's Mobile" value="{{$students[0]->mother_mobile}}">
                <span class="text-danger"></span>
            </div>
            </div>

          <div class="form-group row">
                  <label for="schoolName" class="col-form-label col-sm-3 text-right">School Name</label>
                     <div class="col-sm-9">
                        <select name="school_id" id="schoolId" class="form-control @error('school_id') is-invalid @enderror" required autofocus>
                          <option value="">--Select Schools--</option>
                          @foreach ($schools as $school)
                           <option value="{{$school->id}}" {{ $students[0]->school_id == $school->id ? 'selected' : ''}}>{{$school->school_name}}</option>
                          @endforeach
                        </select>
                        <span class="text-danger"></span>
                        </div>
               </div>

               <div class="form-group row">
                <label for="smsMobile" class="col-form-label col-sm-3 text-right">SMS Mobile</label>
                <div class="col-sm-9">
                <input type="text" name="sms_mobile" class="form-control" placeholder="SMS Mobile" value="{{$students[0]->sms_mobile}}">
                <span class="text-danger"></span>
            </div>
            </div>

               <div class="form-group row">
                <label for="emailAddress" class="col-form-label col-sm-3 text-right">Email Address</label>
                <div class="col-sm-9">
                <input type="text" name="email_address" class="form-control" placeholder="Email Address" value="{{$students[0]->email_address}}">
                <span class="text-danger"></span>
            </div>
            </div>

               <div class="form-group row">
                <label for="studentId" class="col-form-label col-sm-3 text-right">Student ID</label>
                <div class="col-sm-9">
                <input type="text" name="user_id" class="form-control" placeholder="Student ID" value="{{$students[0]->user_id}}">
                <span class="text-danger"></span>
            </div>
            </div>

               <div class="form-group row">
                <label for="password" class="col-form-label col-sm-3 text-right"></label>
                <div class="col-sm-9">
                <img class="img-thumbnail" src="@if(isset($students[0]->student_photo)) {{asset($students[0]->student_photo)}}
                 @else{{ asset('/admin/assets/images/students/avatar.png')}} @endif" id="studentPhoto" style="width: 100px; height: 100px;" alt="Profile Picture">
                <span class="text-danger"></span>
            </div>
            </div>
       
            <div class="form-group row">
                <label for="studentId" class="col-form-label col-sm-3 text-right">Student Photo</label>
                <div class="col-sm-9">
                <input type="file" class="form-control" name="student_photo" id="photo" onchange="showImage(this,'studentPhoto')">
                <span class="text-danger"></span>
            </div>
            </div>
  
            <div class="form-group row">
                <label for="address" class="col-form-label col-sm-3 text-right">Addrss</label>
                <div class="col-sm-9">
                <input type="text" name="address" class="form-control" placeholder="Addrss" value="{{$students[0]->address}}">
                <span class="text-danger"></span>
            </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-form-label col-sm-3 text-right">Password</label>
                <div class="col-sm-9">
                <input type="text" name="password" class="form-control" placeholder="Password" value="{{$students[0]->password}}">
                <span class="text-danger"></span>
            </div>
            </div>

        <input type="hidden" name="student_id" value="{{$students[0]->id}}" id="studentId">
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-warning d-none" id="reset" data-dismiss="modal">Reset</button>
          <button type="submit" class="btn btn-success">Update</button>
        </div>
  </form>
      </div>
    </div>
  </div>
      <!--modal section end-->