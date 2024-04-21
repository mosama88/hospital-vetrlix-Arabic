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

    {{-- Start Row --}}
    @include('dashboard.messages_alert')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-12 ">
                        <div class="col-sm-12 col-md-12 col-xl-12 text-end">
                            <div class="my-4">
                                <!-- Satic modal -->
                                <a href="{{ route('dashboard.doctors.create') }}"
                                    class="btn btn-primary btn-lg waves-effect waves-light">
                                    أضف دكتور <i class="fas fa-plus-square"></i>
                                </a>
                                <!-- Satic modal -->
                                <a id="btn_delete_all" class="btn btn-danger btn-lg waves-effect waves-light">
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
                                <th>سعر الكسف</th>
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
                                    <td>{{ $doctor->price }}</td>
                                    <td>{{ $doctor->section->name }}</td>
                                    <td>{{ $doctor->appointment?->name }}</td>
                                    <td>
                                        {{ $doctor->status }}
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-info"
                                            href="{{ route('dashboard.doctors.edit', $doctor->id) }}"><i
                                                class="fas fa-edit"></i></a>

                                        <a class="modal-effect btn btn-sm btn-danger" data-bs-toggle="modal"
                                            href="#delete{{ $doctor->id }}"><i class="fas fa-trash-alt"></i></a>

                                    </td>
                                    @include('dashboard.doctors.delete')
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    </div> <!-- container-fluid -->
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
