@extends('dashboard.layouts.master')
@section('title', 'سيارات الإسعاف')
@section('page-title', 'سيارات الإسعاف')
@section('page-link-back')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.services.index') }}">الخدمات</a>
    </li>
@endsection
@section('current-page', 'سيارات الإسعاف')
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
                                        <a type="button" href="{{route('dashboard.ambulances.create')}}" class="btn btn-outline-primary btn-md">
                                            <i class="fas fa-plus-square"></i> أضافة سيارة إسعاف
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                    <thead>
                                    <tr>
                                        <th class="table-primary">م</th>
                                        <th>رقم السياره</th>
                                        <th>موديل السيارة</th>
                                        <th>سنة الصنع</th>
                                        <th>نوع السيارة</th>
                                        <th>أسم السائق</th>
                                        <th>رقم رخصة القيادة</th>
                                        <th>رقم الهاتف</th>
                                        <th>الحاله</th>
                                        <th>ملاحظات</th>
                                        <th>العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (isset($ambulances) && count($ambulances) > 0)
                                        @foreach($ambulances as $ambulance)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$ambulance->car_number}}</td>
                                            <td>{{$ambulance->car_model}}</td>
                                            <td>{{$ambulance->car_year_model}}</td>
                                            <td>
                                                @if ($ambulance->type == '1')
                                                    <span>مملوكه</span>
                                                @else
                                                    <span>إيجار</span>
                                                @endif
                                                <div
                                                    class="{{ $ambulance->type == '1' }} ml-1">
                                                </div>
                                            </td>
                                            <td>{{$ambulance->name}}</td>
                                            <td>{{$ambulance->license_number}}</td>
                                            <td>{{$ambulance->phone}}</td>
                                            <td>
                                                @if ($ambulance->available == '1')
                                                    <span>سليمة</span>
                                                @else
                                                    <span>معطله</span>
                                                @endif
                                                <div
                                                    class="{{ $ambulance->available == '1' }} ml-1">
                                                </div>
                                            </td>
                                            <td>{{Str::limit($ambulance->notes, 20)}}</td>

                                            {{--                                            <td>{{ Str::limit($insurance->notes, 20) }}</td>--}}
{{--                                            <td>--}}
{{--                                                @if ($insurance->status == '1')--}}
{{--                                                    <span class="badge bg-success">مفعل</span>--}}
{{--                                                @else--}}
{{--                                                    <span class="badge bg-danger">غير مفعل</span>--}}
{{--                                                @endif--}}
{{--                                                <div--}}
{{--                                                    class="dot-label bg-{{ $insurance->status == '1' ? 'success' : 'danger' }} ml-1">--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
                                            <td>
                                                <div class="btn-group dropend">
                                                    <button type="button"
                                                            class="btn btn-outline-info btn-md"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                        العمليات <i class="mdi mdi-chevron-left"></i>
                                                    </button>
                                                    <div class="dropdown-menu" style="">

                                                        {{-- Change Data --}}
                                                        <a class="dropdown-item" href="{{route('dashboard.ambulances.edit',$ambulance->id)}}"><i
                                                                style="color: #0ba360"
                                                                class="text-success ti-user"></i>&nbsp;&nbsp;تعديل
                                                            البيانات</a>

                                                        {{-- Delete Doctor --}}
                                                        <a class="dropdown-item modal-effect" href="#delete{{$ambulance->id}}"
                                                           data-bs-toggle="modal"><i
                                                                class="text-danger ti-trash"></i>&nbsp;&nbsp;حذف
                                                            البيانات</a>

                                                    </div>
                                                </div>

                                                @include('dashboard.ambulances.delete')
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                        <div class="alert alert-danger">
                                            عفوآ لا توجد بيانات لعرضها!!
                                        </div>
                                    @endif
                                    </tbody>
                                </table>
                        </div>

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
