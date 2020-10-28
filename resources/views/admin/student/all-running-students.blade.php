@extends('admin.master')
@section('main-content')
<section class="container-fluid">
    <div class="row content">
    <div class="col-12 pl-0 pr-0">
            @include('admin.includes.alert')
        <div class="form-group">
            <div class="col-sm-12">
                <h4 class="text-center font-weight-bold font-italic mt-3">All Running Student List</h4>
            </div>
        </div>
        <div class="table-responsive p-1">
            <table id="example" class="table table-striped table-bordered dt-responsive text-center" style="width: 100%;">
                <thead>
                <tr>
                    <th>Sl.</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>School</th>
                    <th>Father's Name</th>
                    <th>Father's Mobile</th>
                    <th>Mother's Name</th>
                    <th>Mother's Mobile</th>
                    <th>Sms Mobile</th>
                    <th>Student ID</th>
                    <th style="width: 100px;">Action</th>
                </tr>
                </thead>
                <tbody>
                    @php($i=1)
                   @foreach ($students as $student)
                      <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $student->student_name }}</td>
                            <td>{{ $student->class_name}}</td>
                            <td>{{ $student->school_name}}</td>
                            <td>{{ $student->father_name}}</td>
                            <td>{{ $student->father_mobile}}</td>
                            <td>{{ $student->mother_name}}</td>
                            <td>{{ $student->mother_mobile}}</td>
                            <td>{{ $student->sms_mobile}}</td>
                            <td>{{ $student->id}}</td>
                            <td>
                                  <a href="{{ route('student-profile',['id'=>$student->id])}}" target="_blank" class="btn btn-success btn-sm fa fa-eye" title="Profile"></a>
                                  <a href="" class="btn btn-info btn-sm fa fa-edit" title="Edit"></a>
                                  <a href="" onclick="return confirm('If you want to delete this item Press OK')" class="btn btn-danger btn-sm fa fa-trash-alt" title="Delete"></a>
                            </td>
                      </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</section>
@endsection