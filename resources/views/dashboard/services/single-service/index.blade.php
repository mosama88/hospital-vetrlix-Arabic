@extends('dashboard.layouts.master')
@section('title', 'الخدمات المفرده')
@section('page-title', 'الخدمات المفرده')
@section('page-link-back')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">لوحة التحكم</a>
    </li>
@endsection
@section('current-page', 'الخدمات المفرده')
@section('content')
    @include('dashboard.layouts.page-link')
    <!--Internal   Notify -->
    <link href="{{ asset('dashboard') }}/assets/plugins/notify/css/notifIt.css" rel="stylesheet" />
    <div class="page-content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        <div class="col-sm-12 col-md-12 col-xl-12 text-end">
                            <div class="my-4">
                                <!-- Satic modal -->
                                <button type="button" class="btn btn-primary btn-lg waves-effect waves-light"
                                        data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    أضافة خدمه
                                </button>
                            </div>
                            @include('dashboard.services.single-service.add')
                            <!-- /.modal -->
                        </div>
                                <!-- Satic modal -->
                                <a id="btn_delete_all" class="btn btn-danger btn-lg waves-effect waves-light">
                                    حذف مجموعة خدمات <i class="fas fa-trash-alt"></i>
                                </a>
                                {{-- @include('dashboard.doctors.delete_select') --}}

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
                                        الكل
                                    </label>
                                </th>
                                <th>الأسم</th>
                                <th>سعر الخدمه</th>
                                <th>الحاله</th>
                                <th>ملاحظات</th>
                                <th>تاريخ الأضافه</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                                <tr>
                                    <td class="table-primary">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        <input type="checkbox" name="delete_select" value="{{ $service->id }}"
                                            class="form-check-input">
                                    </td>

                                    <td><a href="#">{{ $service->name }}</a> </td>
                                    <td>{{ $service->price }}</td>
                                    <td>
                                        @if ($service->status == '1')
                                            <span class="badge bg-success">مفعل</span>
                                        @else
                                            <span class="badge bg-danger">غير مفعل</span>
                                        @endif
                                        <div
                                            class="dot-label bg-{{ $service->status == 'active' ? 'success' : 'danger' }} ml-1">
                                        </div>
                                    </td>                                    <td>{{ Str::limit($service->description, 50) }}</td>
                                    <td>{{ $service->created_at->diffForHumans() }}</td>

                                    <td>
                                        <div class="btn-group dropend">
                                            <button type="button"
                                                class="btn btn-info waves-effect waves-light dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                العمليات <i class="mdi mdi-chevron-left"></i>
                                            </button>
                                            <div class="dropdown-menu" style="">

                                                {{-- Change Data --}}
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard.doctors.edit', $service->id) }}"><i
                                                        style="color: #0ba360"
                                                        class="text-success ti-user"></i>&nbsp;&nbsp;تعديل
                                                    البيانات</a>

                                                {{-- Change Password --}}
                                                <a class="dropdown-item modal-effect"
                                                    href="#update_password{{ $service->id }}" data-bs-toggle="modal">
                                                    <i class="text-primary ti-key"></i>&nbsp;&nbsp;تغير كلمة المرور</a>

                                                {{-- Change Status --}}
                                                <a class="dropdown-item modal-effect"
                                                    href="#update_status{{ $service->id }}" data-bs-toggle="modal"><i
                                                        class="text-warning ti-back-left"></i>&nbsp;&nbsp;تغير الحالة</a>

                                                {{-- Delete Doctor --}}
                                                <a class="dropdown-item modal-effect" href="#delete{{ $service->id }}"
                                                    data-bs-toggle="modal"><i
                                                        class="text-danger ti-trash"></i>&nbsp;&nbsp;حذف
                                                    البيانات</a>

                                            </div>
                                        </div>

                                        {{-- @include('dashboard.doctors.delete') --}}
                                    </td>
                                    {{-- @include('dashboard.doctors.update_status') --}}
                                </tr>
                                {{-- @include('dashboard.doctors.update_password') --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>





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
