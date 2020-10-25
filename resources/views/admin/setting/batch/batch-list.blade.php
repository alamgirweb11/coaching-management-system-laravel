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
                        <h4 class="text-center font-weight-bold font-italic mt-3">Class Wise Batch List</h4>
                    </div>
                </div>
                    <div class="table-responsive p-1">
                        <table id="" class="table table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                            <tr>
                                <td>
                                   <div class="row">
                                       <div class="col-md">
                                        <div class="form-group row mb-0">
                                            <label for="batchName" class="col-form-label  text-right">Class Name</label>
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
                                       </div>


                                       <div class="col-md">
                                        <div class="form-group row mb-0">
                                            <label for="typeId" class="col-form-label text-right">Student Type</label>
                                            <div class="col-sm-9">
                                                 <select name="type_id" id="typeId" class="form-control @error('type_id') is-invalid @enderror" required autofocus>
                                                    <option value="">--Select Cours--</option>
                                                
                                                 </select>
                                                @error('type_id')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                       </div>
                                   </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div  class="table-responsive">
                    <table class="table table-bordered table-hover text-center" id="batchList"></table>
                    </div>
                </div>
        </div>
    </section>
    <style>#overlay .loader{display: none}</style>
    @include('admin.includes.loader')
    <!--Content End-->
    {{-- jquery ajax srcipt for change classId  --}}
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
                        //  console.log(data);
                            $('#typeId').empty().html(data);
                      });
                }else{                                          
                    $('#typeId').empty().html('<option value="">--Select type/course--</option> ');
                }
          });


       $("#typeId").change(function() {
          //alert("hello")
        var studentTypeId = $(this).val();
        var classId = $("#classId").val();
        //console.log(id)
        if (classId && studentTypeId) {
            $("#overlay" .loader).show();
            $.get("{{ route('batch-list-by-ajax')}}", {
                class_id : classId,
                type_id :studentTypeId   
            }, function(data) {
                $("#overlay" .loader).hide();
               // console.log(data);
                $("#batchList").html(data);
            })
        }else{
              $("#batchList").empty();
        }
    })
    
    </script>
@endsection
