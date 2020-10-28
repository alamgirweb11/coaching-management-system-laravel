@extends('admin.master')
@section('main-content')
<section class="container-fluid">
    <div class="row content">
    <div class="col-12 pl-0 pr-0">
            @include('admin.includes.alert')
        <div class="form-group">
            {{-- <div class="col-sm-12">
                <h4 class="text-center font-weight-bold font-italic mt-3">{{$students[0]->student_name}}'s Profile</h4>
            </div> --}}
            <div class="row ml-0 mr-0">
                <div class="col-md-3">
                    <h4 class="font-weight-bold text-center pt-2">Profile of {{$students[0]->student_name}}</h4>
                    @if(isset($students[0]->student_photo))
                <img src="{{ asset($students[0]->student_photo)}}" alt="Profile Picture">
                 @else 
                <img src="{{ asset('/admin/assets/images/avatar.png')}}" class="img-thumbnail" style="width:100%" alt="Profile Picture">
                  @endif
                    <hr>
                    <table class="table table-bordered ">
                            <tr>
                                <td>
                                    <button data-toggle="modal" data-target="#studentBasicInfoUpdate" class="btn btn-block my-btn-submit">Edit Profile</button>
                                </td>
                            </tr>
                    </table>
                </div>
                <div class="col-md-9">
                @include('admin.student.profile.basic-info')
            </div>
            </div>
        </div>
    </div>
</div>
</section>
  {{-- modal include --}}
  @include('admin.student.profile.modal.basic-info-update')
@endsection