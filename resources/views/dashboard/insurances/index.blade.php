@extends('dashboard.layouts.master')
@section('title', 'شركات التأمين')
@section('page-title', 'شركات التأمين')
@section('page-link-back')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.services.index') }}">الخدمات</a>
    </li>
@endsection
@section('current-page', 'شركات التأمين')
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
                                        <a type="button" href="{{route('dashboard.insurances.create')}}" class="btn btn-outline-primary btn-md">
                                            <i class="fas fa-plus-square"></i> أضافة شركة تأمين
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                    <thead>
                                    <tr>
                                        <th class="table-primary">م</th>
                                        <th>كود الشركة</th>
                                        <th>أسم الشركه</th>
                                        <th>نسبة خصم المرض</th>
                                        <th>نسبة تحمل شركة التأمين</th>
                                        <th>ملاحظات</th>
                                        <th>الحاله</th>
                                        <th>العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (isset($insurances) && count($insurances) > 0)
                                        @foreach($insurances as $insurance)
                                        <tr>
                                            <td>#</td>
                                            <td>{{$insurance->insurance_code}}</td>
                                            <td>{{$insurance->name}}</td>
                                            <td>{{$insurance->discount_percentage}}</td>
                                            <td>{{$insurance->company_rate}}</td>
                                            <td>{{ Str::limit($insurance->notes, 20) }}</td>
                                            <td>
                                                @if ($insurance->status == '1')
                                                    <span class="badge bg-success">مفعل</span>
                                                @else
                                                    <span class="badge bg-danger">غير مفعل</span>
                                                @endif
                                                <div
                                                    class="dot-label bg-{{ $insurance->status == '1' ? 'success' : 'danger' }} ml-1">
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
                                                        <a class="dropdown-item" href="{{route('dashboard.insurances.edit', $insurance->id)}}"><i
                                                                style="color: #0ba360"
                                                                class="text-success ti-user"></i>&nbsp;&nbsp;تعديل
                                                            البيانات</a>

                                                        {{-- Delete Doctor --}}
                                                        <a class="dropdown-item modal-effect" href="#delete{{$insurance->id}}"
                                                           data-bs-toggle="modal"><i
                                                                class="text-danger ti-trash"></i>&nbsp;&nbsp;حذف
                                                            البيانات</a>

                                                    </div>
                                                </div>

                                                @include('dashboard.insurances.delete')
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
