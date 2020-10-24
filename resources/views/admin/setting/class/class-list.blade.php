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
                        <h4 class="text-center font-weight-bold font-italic mt-3">Class List</h4>
                    </div>
                </div>

                    <div class="table-responsive p-1">
                        <table id="" class="table table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Class Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach ($classes as $class)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$class->class_name}}</td>
                                       <td>{{$class->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                        <td>
                                             @if($class->status == 1)
                                            <a href="{{route('class-unpublished',['id'=>$class->id])}}" class="btn btn-sm btn-success fa fa-arrow-alt-circle-up" title="Unpublished"></a>
                                            @else
                                            <a href="{{route('class-published',['id'=>$class->id])}}" class="btn btn-sm btn-warning fa fa fa-arrow-alt-circle-down" title="Published"></a>
                                            @endif
                                            <a href="{{route('class-edit',['id'=>$class->id])}}" class="btn btn-sm btn-info fa fa-edit" title="Edit"></a>
                                            <a href="{{route('class-delete',['id'=>$class->id])}}" onclick="return confirm('If you are sure to delete this item Press Ok')" class="btn btn-sm btn-danger fa fa-trash-alt" title="Delete"></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
           
            </div>
        </div>
    </section>
    <!--Content End-->
@endsection
