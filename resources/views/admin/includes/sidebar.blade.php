<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('public/admin/dist/img/kayan.png') }}" alt="AdminLTE Logo" class="brand-image elevation-3">
        <span class="brand-text font-weight-light"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('public/admin/dist/img/user2.png') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('dashboard') }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas me-2 fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="pb-50 mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item {{ request()->routeIs('dashboard') ? 'menu-is-opening menu-open' : '' }} ">
                    <a href="{{ route('dashboard') }}" class="nav-link bg">
                        <i class="nav-icon fas me-2 fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                {{-- General Setting --}}
                <li
                    class="nav-item {{ request()->routeIs('companysetting.index') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="fas me-2 fa-cog text-info"></i>
                        <p class="text-light">
                            General Setting
                            <i class="right fas me-2 fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="{{ route('companysetting.index') }}" class="nav-link">
                                <i class="fas me-2 fa-building text-info"></i>
                                <p>Company Setting</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('Years.create.index') }}" class="nav-link">
                                <i class="fas me-2 fa-building text-info"></i>
                                <p>add Year</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('Years.all.index') }}" class="nav-link">
                                <i class="fas me-2 fa-building text-info"></i>
                                <p>Active Year</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas me-2 fa-users text-info"></i>
                                <p>
                                    Users
                                    <i class="right fas me-2 fa-angle-right"></i>
                                </p>
                            </a>
                            {{-- Users --}}
                            <ul class="nav nav-treeview">
                                <li
                                    class="nav-item  {{ request()->routeIs('users.index') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="{{ route('users.index') }}" class="nav-link">
                                        <i class="fas me-2 fa-solid fa-square-plus nav-info"></i>
                                        <p>Add User</p>
                                    </a>
                                </li>
                                <li
                                    class="nav-item {{ request()->routeIs('roles.index') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="{{ route('roles.index') }}" class="nav-link">
                                        <i class="fa fa-user-shield nav-info"></i>
                                        <p>Roles</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                {{-- Reservation --}}
                <li
                    class="nav-item {{ request()->routeIs('guest-reservation-adult.create') ? 'menu-is-opening menu-open' : '' }}  {{ request()->routeIs('guest.create') ? 'menu-is-opening menu-open' : '' }} {{ request()->routeIs('guest_reservation.create') ? 'menu-is-opening menu-open' : '' }} {{ request()->routeIs('newaAent.create') ? 'menu-is-opening menu-open' : '' }}  {{ request()->routeIs('roomtype.create') ? 'menu-is-opening menu-open' : '' }} {{ request()->routeIs('roomCategory.create') ? 'menu-is-opening menu-open' : '' }}  {{ request()->routeIs('mealplan.create') ? 'menu-is-opening menu-open' : '' }} {{ request()->routeIs('hotel.create') ? 'menu-is-opening menu-open' : '' }} {{ request()->routeIs('hotel-contract.create') ? 'menu-is-opening menu-open' : '' }} ">
                    <a href="#" class="nav-link">
                        <i class="fas me-2 fa-igloo text-success"></i>
                        <p class="  text-light">
                            Reservation
                            <i class="right fas me-2 fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li
                            class="nav-item   {{ request()->routeIs('roomtype.create') ? 'menu-is-opening menu-open' : '' }} {{ request()->routeIs('roomCategory.create') ? 'menu-is-opening menu-open' : '' }} {{ request()->routeIs('mealplan.create') ? 'menu-is-opening menu-open' : '' }} {{ request()->routeIs('hotel.create') ? 'menu-is-opening menu-open' : '' }} {{ request()->routeIs('hotel-contract.create') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="fas me-2 fa-hotel text-success"></i>
                                <p>
                                    Hotels
                                    <i class="right fas me-2 fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li
                                    class="nav-item {{ request()->routeIs('hotel.create') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="{{ route('hotel.create') }}" class="nav-link">
                                        <i class="fas me-2 fa-solid fa-square-plus nav-success"></i>
                                        <p>New Hotel</p>
                                    </a>
                                </li>
                                <li
                                    class="nav-item {{ request()->routeIs('roomtype.create') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="{{ route('roomtype.create') }}" class="nav-link">
                                        <i class="fas me-2  fa-solid fa-square-plus nav-success"></i>
                                        <p>Rooms Type</p>
                                    </a>
                                </li>
                                <li
                                    class="nav-item {{ request()->routeIs('roomCategory.create') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="{{ route('roomCategory.create') }}" class="nav-link">
                                        <i class="fas me-2  fa-solid fa-square-plus nav-success"></i>
                                        <p>Room category</p>
                                    </a>
                                </li>
                                <li
                                    class="nav-item {{ request()->routeIs('mealplan.create') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="{{ route('mealplan.create') }}" class="nav-link">
                                        <i class="fas me-2 fa-hamburger nav-success"></i>
                                        <p>Meal Plan</p>
                                    </a>
                                </li>
                                {{-- <li class="nav-item"> --}}
                                {{-- <a href="{{ route('mealprice.create') }}" class="nav-link"> --}}
                                {{-- <i class="fas me-2 fa-hamburger text-danger"></i> --}}
                                {{-- <p>Meal Price</p> --}}
                                {{-- </a> --}}
                                {{-- </li> --}}
                                <li
                                    class="nav-item {{ request()->routeIs('hotel-contract.create') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="{{ route('hotel-contract.create') }}" class="nav-link">
                                        <i class="fas me-2 fa-hands-helping nav-success"></i>
                                        <p>Hotel Contract</p>
                                    </a>
                                </li>
                                <li
                                    class="nav-item {{ request()->routeIs('ReservationDates.create.index') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="{{ route('ReservationDates.create.index') }}" class="nav-link">
                                        <i class="fas me-2 fa-hands-helping nav-success"></i>
                                        <p> Reservation Date</p>
                                    </a>
                                </li>
                                <li
                                    class="nav-item {{ request()->routeIs('HotelContractReservations.all.index') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="{{ route('HotelContractReservations.all.index') }}" class="nav-link">
                                        <i class="fas me-2 fa-hands-helping nav-success"></i>
                                        <p>Hotel Reservation Date</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="nav-item {{ request()->routeIs('travelAgent-rooms.create') ? 'menu-is-opening menu-open' : '' }} {{ request()->routeIs('newaAent.create') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="fas me-2 fa-user text-success"></i>
                                <p>
                                    Travel Agent
                                    <i class="right fas me-2 fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li
                                    class="nav-item {{ request()->routeIs('newaAent.create') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="{{ route('newaAent.create') }}" class="nav-link">
                                        <i class="fas me-2 fa-solid fa-square-plus nav-success"></i>
                                        <p>New Agent</p>
                                    </a>
                                </li>
                                <li
                                    class="nav-item {{ request()->routeIs('travelAgent-rooms.create') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="{{ route('travelAgent-rooms.create') }}" class="nav-link">
                                        <i class="fas me-2 fa-bed nav-success"></i>
                                        <p>Hotels Room</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="nav-item  {{ request()->routeIs('guest-reservation-child.create') ? 'menu-is-opening menu-open' : '' }} {{ request()->routeIs('guest-reservation-adult.create') ? 'menu-is-opening menu-open' : '' }} {{ request()->routeIs('guest.create') ? 'menu-is-opening menu-open' : '' }} ">
                            <a href="#" class="nav-link">
                                <i class="fas me-2 fa-users text-success"></i>
                                <p>
                                    Guests
                                    <i class="right fas me-2 fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li
                                    class="nav-item  {{ request()->routeIs('guest-reservation-child.create') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="{{ route('guest_reservation.create') }}" class="nav-link">
                                        <i class="fas me-2 fa-igloo nav-success"></i>
                                        <p> New Reservation</p>
                                    </a>
                                </li>
                                <li
                                    class="nav-item {{ request()->routeIs('guest.create') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="{{ route('guest.create') }}" class="nav-link">
                                        <i class="fas me-2 fa-address-card nav-success"></i>
                                        <p>New Guests</p>
                                    </a>
                                </li>
                                <li
                                    class="nav-item  {{ request()->routeIs('guest-reservation-adult.create') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="{{ route('guest-reservation-adult.create') }}" class="nav-link">
                                        <i class="fas me-2 fa-user nav-success"></i>
                                        <p> Adults</p>
                                    </a>
                                </li>
                                <li
                                    class="nav-item {{ request()->routeIs('guest-reservation-child.create') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="{{ route('guest-reservation-child.create') }}" class="nav-link">
                                        <i class="fa fa-child nav-success" aria-hidden="true"></i>
                                        <p> Child</p>
                                    </a>
                                </li>
                            </ul>

                        </li>

                    </ul>
                </li>
                {{-- New Reservation --}}
                <li
                    class="nav-item  {{ request()->routeIs('guest_reservation.create') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="{{ route('guest_reservation.create') }}" class="nav-link">
                        <i class="fas me-2 fa-igloo nav-success"></i>
                        <p class="text-light"> New Reservation</p>
                    </a>
                </li>
                <li
                    class="nav-item  {{ request()->routeIs('admin.show.all.reservation.hotel') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="{{ route('admin.show.all.reservation.hotel') }}" class="nav-link">
                        <i class="fas me-2 fa-igloo nav-success"></i>
                        <p class="text-light"> Search Reservation</p>
                    </a>
                </li>
                {{-- Reports --}}
                <li
                    class="nav-item  {{ request()->routeIs('admin.report.reservation.hotel') ? 'menu-is-opening menu-open' : '' }} {{ request()->routeIs('admin.report2.reservation.hotel') ? 'menu-is-opening menu-open' : '' }} {{ request()->routeIs('admin.report.travel.reservation.hotel') ? 'menu-is-opening menu-open' : '' }} {{ request()->routeIs('admin.report.reservation.hotel') ? 'menu-is-opening menu-open' : '' }}">

                    <a href="#" class="nav-link">
                        <i class="fas me-2 fa-solid fa-file-lines text-warning"></i>
                        <p class="text-light">
                            Reports
                            <i class="right fas me-2 fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas me-2 fa-solid fa-file-circle-check text-warning"></i>
                                <p class="text-light">
                                    Reservation Reports

                                    <i class="right fas me-2 fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li
                                    class="nav-item {{ request()->routeIs('admin.report.reservation.hotel') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="{{ route('admin.report.reservation.hotel') }}" class="nav-link"
                                        target="_blank">
                                        <i class="fas me-2 fa-building nav-warning"></i>
                                        <p>Hotel Arrival</p>
                                    </a>
                                </li>
                                <li
                                    class="nav-item {{ request()->routeIs('admin.report2.reservation.hotel') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="{{ route('admin.report2.reservation.hotel') }}" class="nav-link"
                                        target="_blank">
                                        <i class="fas me-2 fa-building nav-warning"></i>
                                        <p> REP Arrival</p>
                                    </a>
                                </li>

                                <li
                                    class="nav-item{{ request()->routeIs('admin.report.travel.reservation.hotel') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="{{ route('admin.report.travel.reservation.hotel') }}" class="nav-link"
                                        target="_blank">
                                        <i class="fas me-2 fa-building nav-warning"></i>
                                        <p>Reservation Chart</p>
                                    </a>
                                </li>
                                <li
                                    class="nav-item{{ request()->routeIs('admin.report.travel.agent.reservation.hotel') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="{{ route('admin.report.travel.agent.reservation.hotel') }}"
                                        class="nav-link" target="_blank">
                                        <i class="fas me-2 fa-building nav-warning"></i>
                                        <p>Agent Chart 1</p>
                                    </a>
                                </li>
                                <li
                                    class="nav-item{{ request()->routeIs('admin.report.travel.agent2.reservation.hotel') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="{{ route('admin.report.travel.agent2.reservation.hotel') }}"
                                        class="nav-link" target="_blank">
                                        <i class="fas me-2 fa-building nav-warning"></i>
                                        <p>Agent Chart 2</p>
                                    </a>
                                </li>
                                <li
                                    class="nav-item{{ request()->routeIs('admin.report.user.reservation.report') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="{{ route('admin.report.user.reservation.report') }}" class="nav-link"
                                        target="_blank">
                                        <i class="fas me-2 fa-building nav-warning"></i>
                                        <p>Reservation User</p>
                                    </a>
                                </li>



                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas me-2 fa-solid fa-file-circle-check text-warning"></i>
                        <p class="text-light">
                            Accounting

                            <i class="right fas me-2 fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li
                            class="nav-item {{ request()->routeIs('banks.all.index') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="{{ route('banks.all.index') }}" class="nav-link">
                                <i class="fas me-2 fa-building nav-warning"></i>
                                <p>New Bank</p>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('bank.steps') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="{{ route('bank.steps') }}" class="nav-link">
                                <i class="fas me-2 fa-building nav-warning"></i>
                                <p>Bank journal</p>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('visa.steps') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="{{ route('visa.steps') }}" class="nav-link">
                                <i class="fas me-2 fa-building nav-warning"></i>
                                <p>Visa journal</p>
                            </a>
                        </li>
                        <li
                            class="nav-item {{ request()->routeIs('moneyKeepers.all.index') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="{{ route('moneyKeepers.all.index') }}" class="nav-link">
                                <i class="fas me-2 fa-building nav-warning"></i>
                                <p>New treasury</p>
                            </a>
                        </li>
                        <li
                            class="nav-item {{ request()->routeIs('moneyKeeper.steps') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="{{ route('moneyKeeper.steps') }}" class="nav-link">
                                <i class="fas me-2 fa-building nav-warning"></i>
                                <p>Treasury journal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas me-2 fa-solid fa-file-circle-check text-warning"></i>
                                <p class="text-light">
                                    Income && Expenses

                                    <i class="right fas me-2 fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas me-2 fa-solid fa-file-circle-check text-warning"></i>
                                        <p class="text-light">
                                            Agent

                                            <i class="right fas me-2 fa-angle-right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        {{--<li--}}
                                            {{--class="nav-item {{ request()->routeIs('agent.collect') ? 'menu-is-opening menu-open' : '' }}">--}}
                                            {{--<a href="{{ route('agent.collect') }}" class="nav-link">--}}
                                                {{--<i class="fas me-2 fa-building nav-warning"></i>--}}
                                                {{--<p>Collecting</p>--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                                        {{--<li--}}
                                            {{--class="nav-item {{ request()->routeIs('agent.pay') ? 'menu-is-opening menu-open' : '' }}">--}}
                                            {{--<a href="{{ route('agent.pay') }}" class="nav-link">--}}
                                                {{--<i class="fas me-2 fa-building nav-warning"></i>--}}
                                                {{--<p>Refunds</p>--}}
                                            {{--</a>--}}
                                        {{--</li>--}}

                                        <li
                                            class="nav-item{{ request()->routeIs('admin.report.Agent.reservation') ? 'menu-is-opening menu-open' : '' }}">
                                            <a href="{{ route('admin.report.Agent.reservation') }}" class="nav-link"
                                                target="_blank">
                                                <i class="fas me-2 fa-building nav-warning"></i>
                                                <p>Reservation Agent</p>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                {{--<li class="nav-item">--}}
                                    {{--<a href="#" class="nav-link">--}}
                                        {{--<i class="fas me-2 fa-solid fa-file-circle-check text-warning"></i>--}}
                                        {{--<p class="text-light">--}}
                                            {{--Guest--}}

                                            {{--<i class="right fas me-2 fa-angle-right"></i>--}}
                                        {{--</p>--}}
                                    {{--</a>--}}
                                    {{--<ul class="nav nav-treeview">--}}
                                        {{--<li--}}
                                            {{--class="nav-item {{ request()->routeIs('guest.collect') ? 'menu-is-opening menu-open' : '' }}">--}}
                                            {{--<a href="{{ route('guest.collect') }}" class="nav-link">--}}
                                                {{--<i class="fas me-2 fa-building nav-warning"></i>--}}
                                                {{--<p>Collecting</p>--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                                        {{--<li--}}
                                            {{--class="nav-item {{ request()->routeIs('guest.pay') ? 'menu-is-opening menu-open' : '' }}">--}}
                                            {{--<a href="{{ route('guest.pay') }}" class="nav-link">--}}
                                                {{--<i class="fas me-2 fa-building nav-warning"></i>--}}
                                                {{--<p>Refunds</p>--}}
                                            {{--</a>--}}
                                        {{--</li>--}}

                                        {{--<li--}}
                                            {{--class="nav-item{{ request()->routeIs('admin.report.guest.reservation.hotel') ? 'menu-is-opening menu-open' : '' }}">--}}
                                            {{--<a href="{{ route('admin.report.guest.reservation.hotel') }}"--}}
                                                {{--class="nav-link" target="_blank">--}}
                                                {{--<i class="fas me-2 fa-building nav-warning"></i>--}}
                                                {{--<p>Guest Reservation</p>--}}
                                            {{--</a>--}}
                                        {{--</li>--}}

                                    {{--</ul>--}}
                                {{--</li>--}}
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas me-2 fa-solid fa-file-circle-check text-warning"></i>
                                        <p class="text-light">
                                            Hotel

                                            <i class="right fas me-2 fa-angle-right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        {{--<li--}}
                                            {{--class="nav-item {{ request()->routeIs('hotel.collect') ? 'menu-is-opening menu-open' : '' }}">--}}
                                            {{--<a href="{{ route('hotel.collect') }}" class="nav-link">--}}
                                                {{--<i class="fas me-2 fa-building nav-warning"></i>--}}
                                                {{--<p>Collecting</p>--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                                        <li
                                            class="nav-item {{ request()->routeIs('hotel.pay') ? 'menu-is-opening menu-open' : '' }}">
                                            <a href="{{ route('hotel.pay') }}" class="nav-link">
                                                <i class="fas me-2 fa-building nav-warning"></i>
                                                <p>Refunds</p>
                                            </a>
                                        </li>
                                        <li
                                            class="nav-item{{ request()->routeIs('admin.report.Hotel.reservation') ? 'menu-is-opening menu-open' : '' }}">
                                            <a href="{{ route('admin.report.Hotel.reservation') }}" class="nav-link"
                                                target="_blank">
                                                <i class="fas me-2 fa-building nav-warning"></i>
                                                <p> Hotel Reservation</p>
                                            </a>
                                        </li>


                                    </ul>
                                </li>




                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>

    <!-- /.sidebar -->
</aside>
