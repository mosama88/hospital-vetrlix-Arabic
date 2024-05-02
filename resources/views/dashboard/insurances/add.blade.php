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
            <div class="col-10">
                <form action="{{route('dashboard.insurances.store')}}" method="POST">
                    @csrf
                    <div class="row mx-auto">

                    <div class="col-lg-5">
                            <div>
                                <div class="mb-4">
                                    <label class="form-label" for="input-mask-code">كود الشركة</label>
                                    <input id="input-mask-code" type="number" class="form-control input-mask"  name="insurance_code" im-insert="false">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="input-mask-code2">نسبة خصم المريض %</label>
                                    <input id="input-mask-code2" type="number" placeholder="20%" class="form-control input-mask" class="form-control input-mask"  name="discount_percentage" im-insert="false">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="mt-4 mt-lg-0">
                                <div class="mb-4">
                                    <label class="form-label" for="input-mask-name">أسم الشركة</label>
                                    <input id="input-mask-name" class="form-control input-mask" type="text" name="name" im-insert="true">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="input-mask-company_rate">نسبة تحمل شركة التأمين %</label>
                                    <input id="input-mask-company_rate" placeholder="80%" type="number" class="form-control input-mask"  name="company_rate" im-insert="true">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div calss="row mx-auto">
                        <div class="col-lg-10">
                            <div class="mt-4 my-4 mt-lg-0">
                                <label class="form-label" for="txtAddress2Billing">ملاحظات</label>
                                <textarea id="txtAddress2Billing"  rows="4" type="text" class="form-control" name="notes" placeholder="أكتب ملاحظاتك"></textarea>
                            </div>
                            {{-- Submit --}}
                            <div class="col-12 mb-4 text-center">
                        <input class="btn btn-outline-success" type="submit" value="تاكيد البيانات">
                        <a href="{{ route('dashboard.insurances.index') }}"
                           class="btn btn-outline-dark mx-2">رجوع</a>
                    </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @include('dashboard.layouts.scripts')

        <!--Internal  Notify js -->
        <script src="{{ asset('dashboard') }}/assets/plugins/notify/js/notifIt.js"></script>
        <script src="{{ asset('dashboard') }}/assets/plugins/notify/js/notifit-custom.js"></script>
@endsection
