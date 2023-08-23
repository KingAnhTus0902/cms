@php
    use App\Helpers\RoleHelper;
@endphp
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">{{ __('menu.home') }}</a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <!-- Menu Toggle Button -->
                <!-- The user image in the navbar-->
            <a href="#" class="nav-link" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                @if (auth()->user()->avatar)
                    <img src="{{ auth()->user()->avatar }}" class="user-image" alt="User Image">
                @else
                    @switch(RoleHelper::getName())
                        @case(ADMIN)
                            <img src="{{ asset("images/avatar/president.png") }}" class="user-image" alt="User Image">
                            @break
                        @case(EXAMINATION_DOCTOR || REFERRING_DOCTOR)
                            <img src="{{ asset("images/avatar/doctor.png") }}" class="user-image" alt="User Image">
                            @break
                        @case(PHARMACIST)
                            <img src="{{ asset("images/avatar/pharmacist.png") }}" class="user-image" alt="User Image">
                            @break
                        @default
                            <img src="{{ asset("images/avatar/receptionist.png") }}" class="user-image" alt="User Image">
                            @break
                    @endswitch
                @endif
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <label class="hidden-xs label-user" for="">{{ auth()->user()->name }}</label>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                <a href="{{ route('admin.users.view') }}" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i>
                    {{ __('menu.my_profile') }}
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item" id="btn-logout">
                    <i class="fas fa-power-off mr-2"></i>{{ __('menu.logout') }}
                    <form action="{{ route('logout') }}" method="post" id="form-logout" class="d-none">
                        @csrf
                    </form>
                </a>
            </div>
        </li>
    </ul>
</nav>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#btn-logout').on('click', function(e) {
                sessionStorage.removeItem('page')
                e.preventDefault();
                $('#form-logout').submit();
            });
        });
    </script>
@endpush
