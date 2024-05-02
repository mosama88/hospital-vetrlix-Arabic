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
        <div class="container-fluid">
            {{-- Start Row --}}
            <div class="row">
                <div class="col-12">
                    @include('dashboard.messages_alert')
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12 ">
                                <div class="col-sm-12 col-md-12 col-xl-12">
                                    <div class="my-4">
                                        <!-- Satic modal -->
                                        <button type="button"  class="btn btn-outline-primary btn-md"
                                                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            <i class="fas fa-plus-square"></i> أضافة خدمه
                                        </button>
                                    </div>
                                    @include('dashboard.services.single-service.add')
                                    <!-- /.modal -->
                                </div>

                            </div>

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <table class="table  table-bordered "
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="table-primary">م</th>
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
                                    <td><a href="#">{{ $service->name }}</a> </td>
                                    <td>{{ number_format($service->price, 2) }}</td>
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
                                                    class="btn btn-outline-info btn-md"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                العمليات <i class="mdi mdi-chevron-left"></i>
                                            </button>
                                            <div class="dropdown-menu" style="">

                                                {{-- Change Data --}}
                                                <a class="dropdown-item modal-effect" href="#edit{{ $service->id }}"
                                                   data-bs-toggle="modal"><i
                                                        style="color: #0ba360"
                                                        class="text-success ti-user"></i>&nbsp;&nbsp;تعديل
                                                    البيانات</a>

                                                {{-- Delete Doctor --}}
                                                <a class="dropdown-item modal-effect" href="#delete{{ $service->id }}"
                                                    data-bs-toggle="modal"><i
                                                        class="text-danger ti-trash"></i>&nbsp;&nbsp;حذف
                                                    البيانات</a>

                                            </div>
                                        </div>

                                         @include('dashboard.services.single-service.delete')
                                    </td>
                                    @include('dashboard.services.single-service.edit')
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>





    @include('dashboard.layouts.scripts')



    <!--Internal  Notify js -->
    <script src="{{ asset('dashboard') }}/assets/plugins/notify/js/notifIt.js"></script>
    <script src="{{ asset('dashboard') }}/assets/plugins/notify/js/notifit-custom.js"></script>
@endsection
