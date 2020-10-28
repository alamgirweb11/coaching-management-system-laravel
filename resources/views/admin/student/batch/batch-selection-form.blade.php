@extends('admin.master')
@section('main-content')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
        <div class="col-12 pl-0 pr-0">
          @include('admin.includes.alert')
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Batch Wise Students List</h4>
                </div>
                <div class="row ml-0 mr-0">
                    <div class="col">
                    <select name="class_id" class="form-control" id="classId">
                        <option value="">--Select Class--</option>
                        @foreach ( $classes as  $class)
                    <option value="{{ $class->id }}">{{ $class->class_name}}</option>
                        @endforeach
                    </select>
                    </div>


                    <div class="col">
                    <select name="type_id" class="form-control" id="typeId">    
                    <option value="">--Select Course--</option>                    
                    </select>
                </div>

                    <div class="col">
                    <select name="batch_id" class="form-control" id="batchId">    
                    <option value="">--Select Batch--</option>                    
                    </select>
                </div>


                </div>
                <hr>
                
                <div class="row ml-0 mr-0">             
                    <div class="col" id="studentList">
                
                    </div>
                </div>


            </div>
        
        </div>
    </div>
    </section>
<!--Content End-->
  @include('admin.includes.loader')
  <style>
        #overlay .loader{
                 display: none;
        }
  </style>
  <script>
        $("#classId").change(function(){
             var classId = $(this).val();
             if(classId){
                    $("#overlay .loader").show();
                    $.get("{{ route('class-wise-student-type') }}",{ class_id:classId},
                     function(data){
                      //   console.log(data);
                      $("#typeId").empty().html(data);
                    $("#overlay .loader").hide();
                          
                     })
             }
        });


        $("#typeId").change(function(){
             var classId = $("#classId").val();
             var typeId = $(this).val();
             if(classId && typeId){
                    $("#overlay .loader").show();
                    $.get("{{ route('class-and-type-wise-batch-list') }}",{ 
                        class_id:classId,
                        type_id:typeId
                        },function(data){
                       //  console.log(data);
                     $("#batchId").empty().html(data);
                    $("#overlay .loader").hide();                         
               })
             }
        });

        $("#batchId").change(function(){
             var classId = $("#classId").val();
             var typeId = $("#typeId").val();
             var batchId = $(this).val();
             if(classId && typeId){
                    $("#overlay .loader").show();
                    $.get("{{ route('batch-wise-student-list') }}",{ 
                        class_id:classId,
                        type_id:typeId,
                        batch_id:batchId
                        },function(data){
                       //  console.log(data);
                     $("#studentList").empty().html(data);
                    $("#overlay .loader").hide();                         
               })
             }
        });


  </script>
@endsection