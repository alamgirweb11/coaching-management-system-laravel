{{-- slide-add-form --}}

@extends('admin.master')
@section('main-content')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-md-8 offset-md-2 pl-0 pr-0">

                @if(Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Message : </strong> {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if(Session::get('error_message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Message : </strong> {{ Session::get('error_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Student Type List
                         <button class="btn btn-success text-white" data-toggle="modal" data-target="#studentTypeAddModal">Add New</button></h4>
                    </div>
                </div>

                    <div class="table-responsive p-1">
                        <table id="" class="table table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Class Name</th>
                                    <th>Student Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="studentTypeTable">
                               @include('admin.setting.student-type.student-type-table' )
                                </tbody>
                        </table>
                    </div>
           
            </div>
        </div>
    </section>
    <!--Content End-->
     @include('admin.setting.student-type.modal.add-form')
     @include('admin.setting.student-type.modal.edit-form')
   <script>
    // insert student type by using ajax
    $('#studentTypeInsert').submit( function(e){
          e.preventDefault();
          // define url of form url=href and action=href
          var url = $(this).attr('action');
          // define data of form
          var data = $(this).serialize(); // serialize method convert object to string
          // define method of form
          var method = $(this).attr('method');
          // first reset value of modal
          $('#studentTypeAddModal #reset').click();
          // hide modal 
          $('#studentTypeAddModal').modal('hide');
          $.ajax({
                data : data,
                type : method,
                url : url,
                // after success call a new route
                success:function() {
                       $.get("{{route('student-type-list')}}", function(data){
                           // first value will be empty then show the add value
                          $('#studentTypeTable').empty().html(data); 
                         // console.log(data);
                       })
                }
          })       
    });
    // js code for unpublish or inactive status
    function studentTypeUnpublish(id){
              $.get("{{ route('student-type-unpublish')}}",{type_id:id}, function(data){
                   // console.log(data);
                   $('#studentTypeTable').empty().html(data);
              })
      }
    
    // js code for publish or active status
    function studentTypePublish(id){
              $.get("{{ route('student-type-publish')}}",{type_id:id}, function(data){
                   // console.log(data);
                   $('#studentTypeTable').empty().html(data);
              })
      }
    // js code for edit student type
    function studentTypeEdit(id,name){
              // alert(id);
            $('#studentTypeEditModal').find('#studentType').val(name); // to get the student_type from table
           $('#studentTypeEditModal').find('#typeId').val(id); // for catch the type_id
           $('#studentTypeEditModal').modal('show'); // modal method work for show modal in a button click

       $('#studentTypeUpdate').submit( function(e){
           e.preventDefault();
          var url = $(this).attr('action');
          var data = $(this).serialize();
          var method = $(this).attr('method');
          $('#studentTypeEditModal #reset').click();
          $('#studentTypeEditModal').modal('hide');
          $.ajax({
                data : data,
                type : method,
                url : url,
                success:function(data) {
                          $('#studentTypeTable').empty().html(data); 
                         // console.log(data);
                       }
                })
          })       
    }
    // delete student type id
    function studentTypeDelte(id){
               var msg = 'If you want to delete this item, Press OK';
               if(confirm(msg)){ // confirm method work for true or false value check
                $.get("{{ route('student-type-delete')}}",{type_id:id}, function(data){
                   // console.log(data);
                   $('#studentTypeTable').empty().html(data);
              })   
               }
    }
    </script>
@endsection