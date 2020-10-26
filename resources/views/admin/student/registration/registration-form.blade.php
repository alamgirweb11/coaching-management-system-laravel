@extends('admin.master')
@section('main-content')
     <!--Content Start-->
     <section class="container-fluid">
        <div class="row content">
            <div class="col-12 pl-0 pr-0">
                @include('admin.includes.alert')
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Student Registration Form</h4>
                    </div>
                </div>
            <form action="{{ route('student-save') }}" method="post" enctype="multipart/form-data" class="form-inline">
                    @csrf
                    <div class="form-group col-md-6 mb-3">
                        <label for="studentName" class="col-sm-4 col-form-label text-right">Student Name</label>
                        <input type="text" name="student_name" class="form-control col-sm-8" placeholder="Student Name" value="" id="studentName" required>
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="school" class="col-sm-4 col-form-label text-right">School Name</label>
                        <select name="school_id" class="form-control col-sm-8" id="school" required>
                            <option value="">Select School</option>
                            @foreach($schools as $school)
                        <option value="{{$school->id}}">{{$school->school_name}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="fatherName" class="col-sm-4 col-form-label text-right">Father's Name</label>
                        <input type="text" name="father_name" class="form-control col-sm-8" placeholder="Father's Name" value="" id="fatherName" required>
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="fatherMobile" class="col-sm-4 col-form-label text-right">Father's Mobile No.</label>
                        <input type="text" name="father_mobile" class="form-control col-sm-8" id="fatherMobile" placeholder="8801XXXXXXXXX" value="" minlength="13" maxlength="13" required>
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="fatherProfession" class="col-sm-4 col-form-label text-right">Father's Profession</label>
                        <input type="text" name="father_profession" class="form-control col-sm-8" id="fatherProfession" placeholder="Father's Profession" value="" required>
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="motherName" class="col-sm-4 col-form-label text-right">Mother's Name</label>
                        <input type="text" name="mother_name" class="form-control col-sm-8" placeholder="Mother's Name" value="" id="motherName" required>
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="motherMobile" class="col-sm-4 col-form-label text-right">Mother's Mobile No.</label>
                        <input type="text" name="mother_mobile" class="form-control col-sm-8" id="motherMobile" placeholder="8801XXXXXXXXX" value="" minlength="13" maxlength="13" required>
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="motherProfession" class="col-sm-4 col-form-label text-right">Mother's Profession</label>
                        <input type="text" name="mother_profession" class="form-control col-sm-8" id="motherProfession" placeholder="Mother's Profession" value="" required>
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="emailAddress" class="col-sm-4 col-form-label text-right">Email Address</label>
                        <input type="email" name="email_address" class="form-control col-sm-8" id="emailAddress" placeholder="example@example.com" value="">
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="smsMobile" class="col-sm-4 col-form-label text-right">SMS Mobile No.</label>
                        <input type="text" name="sms_mobile" class="form-control col-sm-8" id="smsMobile" placeholder="8801XXXXXXXXX" value="" minlength="13" maxlength="13" required>
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="dateOfAdmission" class="col-sm-4 col-form-label text-right">Admission Date</label>
                        <input type="date" name="date_of_admission" class="form-control col-sm-8" id="dateOfAdmission" required>
                        <div class="col-md-8 text-right">
                            <span class="text-danger"></span>
                        </div>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="photo" class="col-sm-4 col-form-label text-right">Student Photo</label>
                        <input type="file" name="student_photo" class="form-control col-sm-8" id="photo">
                    </div>
           
                    <div class="col-12">
                    <div class="row" id="batchInfo">
                    <div class="form-group col-md-6 mb-3">
                        <label for="classId" class="col-sm-4 col-form-label text-right">Class Name</label>
                        <select name="class_id" class="form-control col-sm-8" id="classId" required>
                            <option value="">Select Class</option>
                            @foreach($classes as $class)
                        <option value="{{$class->id}}">{{$class->class_name}}</option>
                          @endforeach
                        </select>
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label class="col-sm-4 col-form-label text-right">Student Type</label>
                        <div class="col-sm-8" id="type">
                            <span class="text-info">Please select a class first.</span>
                         </div>                          
                      </div>
                  </div>
             </div>

                    <div class="form-group col-12 mb-3 pl-2">
                        <label for="address" class="col-sm-2 col-form-label text-right">Address</label>
                        <input type="text" name="address" class="form-control col-sm-10" id="address" placeholder="Detail Address" value="" required/>
                    </div>

                    <input type="hidden" name="status" value="1"/>

                    <div class="form-group col-md-12 mb-3">
                        <button type="submit" class="btn btn-block my-btn-submit">Save Student</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--Content End-->
    <script>
        $("#classId").change(function(){
            //  alert("Work perfactly.");
            var classId = $(this).val();
            if(classId){
                    $.get("{{ route('bring-student-type')}}",{ 
                        class_id:classId
                        },function(data){
                           // console.log(data);
                        $("#batchInfo").empty().html(data);
               })
            }
        });
    </script>
@endsection