@extends('admin.master')
@section('main-content')
    <!--Content Start-->
<section class="container-fluid">
    <div class="row content">
        <div class="col-md-8 offset-2 pl-0 pr-0">
         @if (Session::get('message'))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Message : </strong> {{Session::get('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
         @endif
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">{{ $user->name }}'s Profile</h4>
                </div>
            </div>

            <div class="table-responsive p-1">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
               
                    {{-- {{asset('/admin/assets/images/avatar.png')}} --}}

                    
                <tr> <td colspan="2"><img src="@if (isset($user->avatar)) {{ asset($user->avatar) }} @else {{asset('/admin/assets/images/avatar.png')}} @endif" alt="Empty picter"></td></tr>
                        <tr><th>Name</th> <td>{{ $user->name }}</td></tr>
                        <tr><th>Role</th> <td>{{ $user->role }}</td> </tr>                      
                        <tr><th>Mobile</th>  <td>{{ $user->mobile }}</td> </tr>                      
                        <tr><th>Email</th> <td>{{ $user->email }}</td></tr>
                        <tr><th style="width: 100px;">Action</th>
                         <td>
                         <a href="{{route('change-user-info',['id'=>$user->id])}}" class="btn btn-sm btn-dark">Change Info</a>
                         <a href="{{ route('change-user-avatar',['id'=>$user->id]) }}" class="btn btn-sm btn-info">Change Photo</span></a>
                            <a href="{{ route('change-user-password',['id'=>$user->id]) }}" class="btn btn-sm btn-danger">Change Password</span></a>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--Content End-->
@endsection