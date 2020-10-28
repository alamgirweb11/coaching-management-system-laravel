<!--Main Menu Start-->
<nav class="navbar navbar-expand-lg menu-bg">
    <!--    <a class="navbar-brand" href="#">LOGO</a>-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="mobile-menu-icon fa fa-bars"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ ('/home')}}"><span class="fa fa-home"></span> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Student
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li class=""><a class="dropdown-item" href="{{ route('student-registration-form')}}">Registration</a></li>
                <li class=""><a class="dropdown-item" href="{{ route('all-running-student-list') }}">All Running Student List</a></li>
                <li class=""><a class="dropdown-item" href="{{ route('class-selection-form') }}">Class Wise List</a></li>
                <li class=""><a class="dropdown-item" href="{{ route('batch-selection-form') }}">Batch Wise List</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('photo-gallery')}}">Gallery</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Setting
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">School</a>
                        <ul class="dropdown-menu">
                        <li><a href="{{route('add-school')}}" class="dropdown-item">Add School</a></li>
                            <li><a href="{{route('school-list')}}" class="dropdown-item">School List</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Class</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('add-class')}}" class="dropdown-item">Add Class</a></li>
                            <li><a href="{{route('class-list')}}" class="dropdown-item">Class List</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Batch</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('add-batch')}}" class="dropdown-item">Add Batch</a></li>
                            <li><a href="{{route('batch-list')}}" class="dropdown-item">Batch List</a></li>
                        </ul>
                    </li>

                    <li><a href="{{ route('student-type')}}" class="dropdown-item">Student Type</a></li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Slider</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('add-slide')}}" class="dropdown-item">Add Slide</a></li>
                            <li><a href="{{ route('manage-slide') }}" class="dropdown-item">Manage Slide</a></li>
                        </ul>
                    </li>


                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">General</a>
                        <ul class="dropdown-menu">
                            @if(!isset($header))
                            <li><a href="{{route('add-header-footer')}}" class="dropdown-item">Add Header & Footer</a></li>
                           @endif
                            @if(isset($header))
                        <li><a href="{{ route('manage-header-footer',['id'=>$header->id]) }}" class="dropdown-item">Manage Header & Footer</a></li>
                         @endif
                        </ul>
                    </li>

                    
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">User</a>
                        <ul class="dropdown-menu">
                            @if(Auth::user()->role=='Admin')
                        <li><a href="{{ route('user-registration') }}" class="dropdown-item">Add User</a></li>
                            <li><a href="{{ route('user-list') }}" class="dropdown-item">User List</a></li>
                            @endif
                            <li><a href="{{ route('user-profile',['userId'=>Auth::user()->id]) }}" class="dropdown-item">User Profile</a></li>
                        </ul>
                    </li>



                </ul>
            </li>
        </ul>

        {{-- <a class="font-weight-bold my-2 my-sm-0 mr-2 logout" href="#">Logout</a> --}}
        <a class="ont-weight-bold my-2 my-sm-0 mr-2 logout" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                          </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                   @csrf
             </form>

        <!--        <form class="form-inline my-2 my-lg-0">-->
        <!--            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
        <!--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
        <!--        </form>-->
    </div>
</nav>
<!--Main Menu End-->