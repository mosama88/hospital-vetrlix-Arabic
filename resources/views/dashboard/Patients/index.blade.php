@extends('dashboard.layouts.master')
@section('title', 'المرضى')
@section('page-title', 'المرضى')
@section('page-link-back')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="fas fa-home"></i></a>
    </li>
@endsection
@section('current-page', 'المرضى')
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
                                        <a type="button" href="{{route('dashboard.patients.create')}}" class="btn btn-outline-primary btn-md">
                                            <i class="fas fa-plus-square"></i> أضافة مريض
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                    <thead>
                                    <tr>
                                        <th class="table-primary">م</th>
                                        <th>الرقم القومى</th>
                                        <th>الأسم</th>
                                        <th>البريد الالكترونى</th>
                                        <th>رقم الهاتف</th>
                                        <th>العمر</th>
                                        <th> فصيلة الدم</th>
                                        <th>الجنس</th>
                                        <th>محافظة</th>
                                        <th>التاريخ المرضى</th>
                                        <th>العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($patients as $patient)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$patient->nation_number}}</td>
                                            <td>{{$patient->name}}</td>
                                            <td>{{$patient->email}}</td>
                                            <td>{{$patient->phone}}</td>
                                            <td>{{$patient->age}}</td>
                                            <td>{{$patient->type_blood()}}</td>
                                            <td>
                                                @php
                                                    $genderTranslation = __('enums.'.$patient->gender);
                                                @endphp
                                                {{$genderTranslation}}
                                            </td>
                                            <td>{{$patient->address->city}}</td>
                                            <td>{{Str::limit($patient->sick_history,20)}}</td>
                                            <td>
                                            <div class="btn-group dropend">
                                                    <button type="button"
                                                            class="btn btn-outline-info btn-md"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                        العمليات <i class="mdi mdi-chevron-left"></i>
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        {{-- Change Data --}}
                                                        <a class="dropdown-item" href="{{route('dashboard.patients.edit', $patient->id)}}"><i
                                                                style="color: #0ba360"
                                                                class="text-success ti-user"></i>&nbsp;&nbsp;تعديل
                                                            البيانات</a>

                                                        {{-- Delete Doctor --}}
                                                        <a class="dropdown-item modal-effect" href="#delete{{$patient->id}}"
                                                           data-bs-toggle="modal"><i
                                                                class="text-danger ti-trash"></i>&nbsp;&nbsp;حذف
                                                            البيانات</a>

                                                    </div>
                                            </div>
                                                @include('dashboard.patients.delete')
                                            </td>
                                        </tr>
                                    @endforeach
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
