<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <h5 class="text-center text-white">{{ Auth::user()->name }}</h5>
                <h6 class="text-center text-white">برنامج إدارة المستشفيات</h6>

                <li>
                    <a href="{{ route('dashboard.index') }}" class="waves-effect">
                        <i class="ti-home"></i><span class="badge rounded-pill bg-primary float-end">1</span>
                        <span>لوحة التحكم</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dashboard.sections.index') }}" class=" waves-effect">
                        <i class="fas fa-layer-group"></i>
                        <span>الأقسام</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dashboard.doctors.index') }}" class=" waves-effect">
                        <i class="fas fa-user-md"></i>
                        <span>الأطباء</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-allergies"></i>
                        <span>الخدمات</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('dashboard.services.index') }}">خدمة مفرده</a></li>
                        <li><a href="{{route('dashboard.add-Service-Group')}}">مجموعة خدمات</a></li>
                        <li><a href="email-compose.html">شركات التأمين</a></li>
                        <li><a href="email-compose.html">الاسعاف</a></li>
                        <li><a href="email-compose.html">مكالمات الاسعاف</a></li>
                    </ul>
                </li>


                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
