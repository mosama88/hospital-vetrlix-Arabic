@extends('dashboard.layouts.master')
@section('title', 'أضافة سند قبض')
@section('page-title', 'أضافة سند قبض')
@section('page-link-back')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.receipts.index') }}">سندات القبض</a>
    </li>
@endsection
@section('current-page', 'أضافة سند قبض')
@section('content')
    @include('dashboard.layouts.page-link')
    <!--Internal   Notify -->
    <link href="{{ asset('dashboard') }}/assets/plugins/notify/css/notifIt.css" rel="stylesheet" />
    {{--    @include('dashboard.messages_alert')--}}

    <div class="container-fluid">
        {{-- Start Row --}}
        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <form action="{{ route('dashboard.receipts.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                        {{ csrf_field() }}

                            <div class="row row-xs mb-4 align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label>اسم المريض</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                   <select name="patient_id" class="form-control select2" required>
                                      @foreach($Patients as $Patient)
                                           <option value=""></option>
                                           <option value="{{$Patient->id}}">{{$Patient->name}}</option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-4 row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label>المبلغ</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="Debit" type="number">
                                </div>
                            </div>

                            <div class="row mb-4 row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label>البيان</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <textarea class="form-control" name="description" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="col-12 mb-4 text-center">
                                <input class="btn btn-outline-success" type="submit" value="تاكيد البيانات">
                                <a href="{{ route('dashboard.receipts.index') }}"
                                   class="btn btn-outline-dark mx-2">رجوع</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->

    @include('dashboard.layouts.scripts')

    <!--Internal  Notify js -->
    <script src="{{ asset('dashboard') }}/assets/plugins/notify/js/notifIt.js"></script>
    <script src="{{ asset('dashboard') }}/assets/plugins/notify/js/notifit-custom.js"></script>
    <script src="{{ asset('dashboard') }}/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>


@endsection
