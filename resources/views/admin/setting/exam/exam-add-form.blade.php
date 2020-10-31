{{-- slide-add-form --}}

@extends('admin.master')
@section('main-content')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-md-8 offset-md-2 pl-0 pr-0">

                @include('admin.includes.alert')

                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Exam Add Form</h4>
                    </div>
                </div>

            <form action="{{ route('add-exam') }}" method="post">
                    @csrf
                    <div class="table-responsive p-1">
                        <table id="" class="table table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                            <tr>
                                <td>
                                    <div class="form-group row mb-0">
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
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <label for="typeId" class="col-form-label col-sm-3 text-right">Course</label>
                                        <div class="col-sm-9">
                                             <select name="type_id" id="typeId" class="form-control @error('type_id') is-invalid @enderror" required autofocus>
                                                <option value="">--Select course--</option>                               
                                            </select>
                                            @error('type_id')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <label for="examName" class="col-form-label col-sm-3 text-right">Exam Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('exam_name') is-invalid @enderror" name="exam_name" value="{{ old('exam_name') }}" id="examName" placeholder="Write exam name here" required>
                                            @error('exam_name')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <label for="resultType" class="col-form-label col-sm-3 text-right">Result Type</label>
                                        <div class="col-sm-9">
                                            <select name="result_type" id="resultType" class="form-control @error('result_type') is-invalid @enderror" required autofocus>
                                                <option value="normal">Normal Result</option>                               
                                                <option value="weighted">Weighted Result</option>                               
                                            </select>
                                            @error('result_type')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr><td><button type="submit" class="btn btn-block my-btn-submit">Save</button></td></tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--Content End-->
    {{-- include loader --}}
    <style>#overlay .loader{display: none}</style>
    @include('admin.includes.loader')
    <script>
          $('#classId').change(function(){
                // alert("Hi");
                var classId = $(this).val();
                if(classId){
                     // show loader when call ajax
                       $("#overlay" .loader).show();
                      $.get("{{ route('class-wise-student-type') }}",{class_id:classId}, function(data){
                             // hide loader after call the route
                         $("#overlay" .loader).hide();
                         //   console.log(data);
                            $('#typeId').empty().html(data);
                      });
                }else{                                          
                    $('#typeId').empty().html('<option value="">--Select type/course--</option> ');
                }
          })
    </script>
@endsection
