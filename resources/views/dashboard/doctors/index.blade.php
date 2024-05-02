@extends('dashboard.layouts.master')
@section('title', 'الأطباء')
@section('page-title', 'الأطباء')
@section('page-link-back')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">لوحة التحكم</a>
    </li>
@endsection
@section('current-page', 'الأطباء')
@section('content')
    @include('dashboard.layouts.page-link')
    <!--Internal   Notify -->
    <link href="{{ asset('dashboard') }}/assets/plugins/notify/css/notifIt.css" rel="stylesheet" />

    @include('dashboard.messages_alert')

        <div class="container-fluid">
    {{-- Start Row --}}
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        <div class="col-sm-12 col-md-12 col-xl-12 text-end">
                            <div class="my-4">
                                <!-- Satic modal -->
                                <a href="{{ route('dashboard.doctors.create') }}"
                                   class="btn btn-outline-primary btn-md">
                                    أضف دكتور <i class="fas fa-plus-square"></i>
                                </a>
                                <!-- Satic modal -->
                                <a id="btn_delete_all" class="btn btn-outline-danger btn-md">
                                    حذف مجموعة أطباء <i class="fas fa-trash-alt"></i>
                                </a>
                                @include('dashboard.doctors.delete_select')

                            </div>
                        </div>

                    </div>

                    <table id="datatable-buttons" class="table  table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="table-primary">#</th>
                                <th>
                                    <input class="form-check-input" type="checkbox" value="" name="select_all"
                                        id="example-select-all">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        أختر الكل
                                    </label>
                                </th>
                                <th>صورة الطبيب</th>
                                <th>اسم الطبيب</th>
                                <th>البريد الالكتروني</th>
                                <th>الموبايل</th>
                                <th>القسم</th>
                                <th>المواعيد</th>
                                <th>الحاله</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctors as $doctor)
                                <tr>
                                    <td class="table-primary">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        <input type="checkbox" name="delete_select" value="{{ $doctor->id }}"
                                            class="form-check-input">
                                    </td>
                                    <td class="text-center">
                                        @if ($doctor->image)
                                            <img src="{{ asset('dashboard/assets/images/uploads/doctors/' . $doctor->image->filename) }}"
                                                class="rounded avatar-md" alt="">
                                        @else
                                            <img src="{{ asset('dashboard/assets/images/uploads/doctors/doctor_default.png') }}"
                                                class="rounded avatar-md" alt="">
                                        @endif
                                    </td>
                                    <td><a href="#">{{ $doctor->name }}</a> </td>
                                    <td>{{ $doctor->email }}</td>
                                    <td>{{ $doctor->phone }}</td>
                                    <td>{{ $doctor->section->name }}</td>
                                    <td>
                                        @foreach ($doctor->doctorappointments as $appointment)
                                            {{ $appointment->name }}
                                        @endforeach
                                    </td>
                                    <td>
                                        @if ($doctor->status == 'active')
                                            <span class="badge bg-success">مفعل</span>
                                        @else
                                            <span class="badge bg-danger">غير مفعل</span>
                                        @endif
                                        <div
                                            class="dot-label bg-{{ $doctor->status == 'active' ? 'success' : 'danger' }} ml-1">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group dropend">

                                            <button type="button"
                                                class="btn btn-outline-info btn-md"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                العمليات <i class="mdi mdi-chevron-left"></i>
                                            </button>
                                            <div class="dropdown-menu" style="">

                                                {{-- Change Data --}}
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard.doctors.edit', $doctor->id) }}"><i
                                                        style="color: #0ba360"
                                                        class="text-success ti-user"></i>&nbsp;&nbsp;تعديل
                                                    البيانات</a>

                                                {{-- Change Password --}}
                                                <a class="dropdown-item modal-effect"
                                                    href="#update_password{{ $doctor->id }}" data-bs-toggle="modal">
                                                    <i class="text-primary ti-key"></i>&nbsp;&nbsp;تغير كلمة المرور</a>

                                                {{-- Change Status --}}
                                                <a class="dropdown-item modal-effect"
                                                    href="#update_status{{ $doctor->id }}" data-bs-toggle="modal"><i
                                                        class="text-warning ti-back-left"></i>&nbsp;&nbsp;تغير الحالة</a>

                                                {{-- Delete Doctor --}}
                                                <a class="dropdown-item modal-effect" href="#delete{{ $doctor->id }}"
                                                    data-bs-toggle="modal"><i
                                                        class="text-danger ti-trash"></i>&nbsp;&nbsp;حذف
                                                    البيانات</a>

                                            </div>
                                        </div>

                                        @include('dashboard.doctors.delete')
                                    </td>
                                    @include('dashboard.doctors.update_status')
                                </tr>
                                @include('dashboard.doctors.update_password')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- End Page-content -->



    @include('dashboard.layouts.scripts')
    <script>
        $(function() {
            jQuery("[name=select_all]").click(function(source) {
                checkboxes = jQuery("[name=delete_select]");
                for (var i in checkboxes) {
                    checkboxes[i].checked = source.target.checked;
                }
            });
        })
    </script>


    <script type="text/javascript">
        $(function() {
            $("#btn_delete_all").click(function() {
                var selected = [];
                $("#datatable-buttons input[name=delete_select]:checked").each(function() {
                    selected.push(this.value);
                });

                if (selected.length > 0) {
                    $('#delete_select').modal('show')
                    $('input[id="delete_select_id"]').val(selected);
                }
            });
        });
    </script>
    <!--Internal  Notify js -->
    <script src="{{ asset('dashboard') }}/assets/plugins/notify/js/notifIt.js"></script>
    <script src="{{ asset('dashboard') }}/assets/plugins/notify/js/notifit-custom.js"></script>
@endsection
