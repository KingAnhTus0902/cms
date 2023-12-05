@php
    use App\Helpers\RoleHelper;
    use App\Helpers\CommonHelper;
@endphp
<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
            @if(auth()->user()->can('List-medical-session'))
            <li class="nav-item
             {{request()->routeIs('admin.medical_session.index') ? 'menu-is-opening menu-open' : ''}}">
                <a href="#" class="nav-link">
                    <i class="fa fa-fw fa-user-plus"></i>
                    <p>
                        {{ __('menu.list_management.receive') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview menu-lv2">
                    <li class="nav-item">
                        <a href="{{route("admin.medical_session.index")}}"
                           class="nav-link {{ request()->routeIs('admin.medical_session.index') ? 'active': '' }}">
                           <i class="fa fa-fw fa-stethoscope"></i>
                            <p>
                                {{ __('menu.list_management.medical_session') }}
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            @if(auth()->user()->can('List-medical-test'))
                <li class="nav-item">
                    <a href="{{ route('admin.medical_tests.index') }}"
                       class="nav-link {{ request()->routeIs('admin.medical_tests.index') ? 'active': '' }}">
                        <i class="fas fa-heartbeat"></i>
                        <p>{{ __('menu.list_management.medical_test') }}</p>
                    </a>
                </li>
            @endif
            @if(auth()->user()->canany(['List-payment','List-hospital-tranfer']))
            <li class="nav-item
            {{(request()->routeIs('admin.payment.*') ||
            request()->routeIs('admin.index.hospital_transfer')) ? 'menu-is-opening menu-open' : ''}}
             ">
                <a href="#" class="nav-link">
                    <i class="fa fa-fw fa-dollar-sign"></i>
                    <p>
                        {{ __('menu.list_management.hospital_fee') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview menu-lv2">
                    @if(auth()->user()->can('List-payment'))
                    <li class="nav-item">
                        <a href="{{ route('admin.payment.index') }}"
                           class="nav-link {{ request()->routeIs('admin.payment.*') ? 'active': '' }}">
                            <i class="fas fa-dot-circle"></i>
                            <p>{{ __('menu.list_management.payment') }}</p>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->can('List-hospital-tranfer'))
                            <li class="nav-item">
{{--                                <a href="{{route("admin.index.hospital_transfer")}}"--}}
                                <a href="#" class="nav-link" onclick="developing()">
{{--                                   class="nav-link {{ request()->routeIs('admin.index.hospital_transfer') ? 'active': '' }}">--}}
                                    <i class='far fa-dot-circle'></i>
                                    <p>{{ __('menu.list_management.hospital_transfer') }}</p>
                                </a>
                            </li>
                    @endif
                </ul>
            </li>
            @endif
{{--            <li class="nav-item">--}}
{{--                <a href="#" class="nav-link" onclick="developing()">--}}
{{--                    <i class="fa fa-fw fa-calendar"></i>--}}
{{--                    <p>--}}
{{--                        {{ __('menu.list_management.booked') }}--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--            </li>--}}
            @if(auth()->user()->canany(['C79a-HD','Medical-examination-handbook','20/BHYT']))
            <li class="nav-item
             {{CommonHelper::openReportSidebar() ? 'menu-is-opening menu-open' : ''}}
             ">
             <a href="#" class="nav-link">
                    <i class="fa fa-fw fa-chart-pie"></i>
                    <p>
                        {{ __('menu.list_management.report') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview menu-lv2">
{{--                    @if(auth()->user()->can('C79a-HD'))--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{route('admin.report.insurancePaidIndex')}}"--}}
{{--                               class="nav-link {{request()->routeIs('admin.report.insurancePaidIndex') ? 'active': ''}}">--}}
{{--                                <i class="far fa-dot-circle"></i>--}}
{{--                                <p>{{ __('menu.list_management.insurance_paid') }}</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
                    @if(auth()->user()->can('Medical-examination-handbook'))
                        <li class="nav-item">
{{--                            <a href="{{route('admin.report.reportInsuranceIndex')}}"--}}
                            <a href="#" class="nav-link" onclick="developing()">
{{--                               class="nav-link {{request()->routeIs('admin.report.reportInsuranceIndex') ? 'active': ''}}">--}}
                                <i class="far fa-dot-circle"></i>
                                <p>{{ __('menu.list_management.report_insurance') }}</p>
                            </a>
                        </li>
                        @endif
{{--                        @if(auth()->user()->can('20/BHYT'))--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('admin.report.distributed_materials')}}"--}}
{{--                                   class="nav-link {{request()->routeIs('admin.report.distributed_materials') ? 'active': ''}}">--}}
{{--                                    <i class="far fa-dot-circle"></i>--}}
{{--                                    <p>{{ __('menu.list_management.distributed_materials') }}</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
                </ul>
            </li>
            @endif
            <li class="nav-item
             {{CommonHelper::openListManagementSidebar() ? 'menu-is-opening menu-open' : ''}}
             ">
                <a href="#" class="nav-link">
                    <i class="fa fa-fw fa-th-list"></i>
                    <p>
                        {{ __('menu.list_management.header') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview menu-lv2">
                    @if(auth()->user()->canany(['List-users', 'List-cadres']))
                    <li class="nav-item
                     {{(request()->routeIs('admin.users.index') ||
                        request()->routeIs('admin.cadres.index')) ? 'menu-is-opening menu-open' : ''}}">
                        <a href="#" class="nav-link">
                            <i class="fas fa-user"></i>
                            <p>
                                {{ __('menu.list_management.account') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview menu-lv3">
                            @if(auth()->user()->can('List-users'))
                            <li class="nav-item">
                                <a href="{{ route('admin.users.index') }}"
                                   class="nav-link {{request()->routeIs('admin.users.index') ? 'active' : ''}}">
                                    <i class='far fa-dot-circle nav-icon'></i>
                                    <p>{{ __('menu.list_management.users') }}</p>
                                </a>
                            </li>
                            @endif
                            @if(auth()->user()->can('List-cadres'))
                            <li class="nav-item">
                                <a href="{{route("admin.cadres.index")}}"
                                   class="nav-link {{request()->routeIs('admin.cadres.index') ? 'active' : ''}}">
                                    <i class='far fa-dot-circle nav-icon'></i>
                                    <p>{{ __('menu.list_management.cadres') }}</p>
                                </a>
                            </li>
                            @endif
                            @if(RoleHelper::getByRole([ADMIN]))
                                <li class="nav-item">
{{--                                    <a href="{{route('admin.permission.index')}}"--}}
                                    <a href="#" class="nav-link" onclick="developing()">
{{--                                       class="nav-link {{request()->routeIs('admin.permission.index') ? 'active' : ''}}">--}}
                                        <i class='far fa-dot-circle nav-icon'></i>
                                        <p>{{ __('menu.list_management.permission') }}</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    @if(auth()->user()->canany(['List-department', 'List-room']))
                    <li class="nav-item
                    {{(request()->routeIs('admin.department.index') ||
                        request()->routeIs('admin.index.room')) ? 'menu-is-opening menu-open' : ''}}">
                        <a href="#" class="nav-link">
                            <i class="fas fa-clinic-medical"></i>
                            <p>
                                {{ __('menu.list_management.department_room') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview menu-lv3">
                            @if(auth()->user()->can('List-department'))
                            <li class="nav-item">
                                <a href="{{route("admin.department.index")}}" class="nav-link
                                    {{request()->routeIs('admin.department.index') ? 'active' : ''}}">
                                    <i class='far fa-dot-circle nav-icon'></i>
                                    <p>{{ __('menu.list_management.department') }}</p>
                                </a>
                            </li>
                            @endif
                            @if(auth()->user()->can('List-room'))
                            <li class="nav-item">
                                <a href="{{route("admin.index.room")}}"
                                   class="nav-link {{request()->routeIs('admin.index.room') ? 'active' : ''}}">
                                    <i class='far fa-dot-circle nav-icon'></i>
                                    <p>{{ __('menu.list_management.room') }}</p>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>
                        @endif
                        @if(auth()->user()->canany(['List-unit', 'List-material_type', 'List-material']))
                    <li class="nav-item
                    {{CommonHelper::openMaterialManagementSidebar() ? 'menu-is-opening menu-open' : ''}}">
                        <a href="#" class="nav-link">
                            <i class="fas fa-dolly-flatbed"></i>
                            <p>
                                {{ __('menu.list_management.unit_head') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                            <ul class="nav nav-treeview menu-lv3">
                                @if(auth()->user()->can('List-unit'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.unit.index') }}"
                                       class="nav-link {{ request()->routeIs('admin.unit.index') ? 'active': '' }}">
                                        <i class='far fa-dot-circle nav-icon'></i>
                                        <p>{{ __('menu.list_management.unit') }}</p>
                                    </a>
                                </li>
                                @endif
                                @if(auth()->user()->can('List-material_type'))
                                <li class="nav-item">
                                    <a href="{{route('admin.material_type.index')}}" class="nav-link
                                    {{request()->routeIs('admin.material_type.index') ? 'active' : ''}}">
                                        <i class='far fa-dot-circle nav-icon'></i>
                                        <p>{{ __('menu.list_management.material_type') }}</p>
                                    </a>
                                </li>
                                @endif
                                @if(auth()->user()->can('List-material'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.index.material') }}"
                                       class="nav-link {{ request()->routeIs('admin.index.material') ? 'active': '' }}">
                                        <i class='far fa-dot-circle nav-icon'></i>
                                        <p>{{ __('menu.list_management.material') }}</p>
                                    </a>
                                </li>
                                @endif
                            </ul>
                    </li>
                        @endif
                        @if(auth()->user()->canany(['List-designated_service', 'List-hospital']))
                    <li class="nav-item
                        {{ request()->routeIs('admin.index.designated_service')
                        || request()->routeIs('admin.hospital.index')  ?
                         'menu-is-opening menu-open' : ''}}">
                        <a href="#" class="nav-link">
                            <i class="fas fa-book"></i>
                            <p>
                                {{ __('menu.list_management.administrative') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview menu-lv3">
                            @if(auth()->user()->can('List-designated_service'))
                            <li class="nav-item">
                                <a href="{{route("admin.index.designated_service")}}" class="nav-link
                                    {{(request()->routeIs('admin.index.designated_service')) ? 'active' : ''}}">
                                    <i class='fas fa-atom'></i>
                                    <p>{{ __('menu.list_management.designated_service') }}</p>
                                </a>
                            </li>
                            @endif
                            @if(auth()->user()->can('List-hospital'))
                            <li class="nav-item">
                                <a href="{{route("admin.hospital.index")}}"
                                   class="nav-link {{(request()->routeIs('admin.hospital.index')) ? 'active' : ''}}">
                                    <i class='fas fa-hospital'></i>
                                    <p>{{ __('menu.list_management.hospital') }}</p>
                                </a>
                            </li>
                                @endif
                        </ul>
                    </li>
                        @endif
                        @if(auth()->user()->canany(['List-diseases', 'List-examination-type']))
                    <li class="nav-item
                        {{ request()->routeIs('admin.diseases.index')
                        || request()->routeIs('admin.examination_type.index') ?
                         'menu-is-opening menu-open' : ''}}">
                        <a href="#" class="nav-link">
                            <i class="fas fa-book"></i>
                            <p>
                                {{ __('menu.list_management.other') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview menu-lv3">
                            @if(auth()->user()->can('List-diseases'))
                            <li class="nav-item">
                                <a href="{{ route('admin.diseases.index') }}"
                                   class="nav-link {{ request()->routeIs('admin.diseases.index') ? 'active': '' }}">
                                    <i class="fas fa-heartbeat"></i>
                                    <p>{{ __('menu.list_management.diseases') }}</p>
                                </a>
                            </li>
                            @endif
                            @if(auth()->user()->can('List-examination-type'))
                            <li class="nav-item">
                                <a href="{{ route('admin.examination_type.index') }}"
                                   class="nav-link {{ request()->routeIs('admin.examination_type.index') ? 'active': '' }}">
                                    <i class="fas fa-credit-card"></i>
                                    <p>{{ __('menu.list_management.examination_type') }}</p>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>
                        @endif
                </ul>
            </li>
            @if(auth()->user()->can('View-setting'))
                <li class="nav-item">
                    <a href="{{ route('admin.setting.view') }}"
                       class="nav-link {{ request()->routeIs('admin.setting.view') ? 'active': '' }}">
                        <i class="fas fa-cog"></i>
                        <p>
                            {{ __('menu.list_management.setting') }}
                        </p>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
