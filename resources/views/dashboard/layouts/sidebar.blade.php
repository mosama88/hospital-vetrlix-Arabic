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
                        <i class="fas fa-ambulance"></i>
                        <span>الخدمات</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('dashboard.services.index') }}"><i class="far fa-circle"></i> خدمة مفرده</a></li>
                        <li><a href="{{route('dashboard.add-Service-Group')}}"><i class="far fa-circle"></i>مجموعة خدمات</a></li>
                        <li><a href="{{route('dashboard.insurances.index')}}"><i class="far fa-circle"></i>شركات التأمين</a></li>
                        <li><a href="{{route('dashboard.ambulances.index')}}"><i class="far fa-circle"></i>الإسعاف</a></li>
                        <li><a href="email-compose.html"><i class="far fa-circle"></i>مكالمات الاسعاف</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-user-injured"></i>
                        <span>المرضى</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('dashboard.patients.index') }}"><i class="far fa-circle"></i>كل المرضى</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-file-invoice"></i>
                        <span>الفواتير</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('dashboard.single-invoices')}}"><i class="far fa-circle"></i>فاتورة خدمة مفرده</a></li>
                        <li><a href="{{route('dashboard.Receipt.index')}}"><i class="far fa-circle"></i>سندات القبض</a></li>
                    </ul>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
