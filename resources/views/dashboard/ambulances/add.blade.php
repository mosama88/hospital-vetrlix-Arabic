@extends('dashboard.layouts.master')
@section('title', 'سيارات الاسعاف')
@section('page-title', 'سيارات الاسعاف')
@section('page-link-back')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.services.index') }}">الخدمات</a>
    </li>
@endsection
@section('current-page', 'سيارات الاسعاف')
@section('content')
    @include('dashboard.layouts.page-link')
    <!--Internal   Notify -->
    <link href="{{ asset('dashboard') }}/assets/plugins/notify/css/notifIt.css" rel="stylesheet" />

    <div class="container-fluid">
        {{-- Start Row --}}
        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                <form action="{{route('dashboard.insurances.store')}}" method="POST">
                    @csrf
                    <div class="row mx-auto">
                    <div class="col-lg-5">
                            <div>
                                <div class="mb-4">
                                    <label class="form-label" for="input-mask-code">كود الشركة</label>
                                    <input id="input-mask-code" type="number" class="form-control input-mask"  name="insurance_code" im-insert="false" style="background: #d8d9e9" disabled>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="input-mask-code2">نسبة خصم المريض %</label>
                                    <input id="input-mask-code2" type="number" placeholder="20%" class="form-control input-mask @error('discount_percentage') is-invalid @enderror"  name="discount_percentage" im-insert="false">
                                    @error('discount_percentage')
                                    <div class="alert alert-danger p-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="mt-4 mt-lg-0">
                                <div class="mb-4">
                                    <label class="form-label" for="input-mask-name">أسم الشركة</label>
                                    <input id="input-mask-name" class="form-control input-mask @error('name') is-invalid @enderror" type="text" name="name" im-insert="true">
                                    @error('name')
                                    <div class="alert alert-danger p-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="input-mask-company_rate">نسبة تحمل شركة التأمين %</label>
                                    <input id="input-mask-company_rate" placeholder="80%" type="number" class="form-control input-mask @error('company_rate') is-invalid @enderror"  name="company_rate" im-insert="true">
                                    @error('company_rate')
                                    <div class="alert alert-danger p-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div calss="row mx-auto">
                        <div class="col-lg-10">
                            <div class="mt-4 my-4 mt-lg-0">
                                <label class="form-label" for="txtAddress2Billing">ملاحظات</label>
                                <textarea id="txtAddress2Billing"  rows="4" type="text" class="form-control @error('notes') is-invalid @enderror" name="notes" placeholder="أكتب ملاحظاتك"></textarea>
                                @error('notes')
                                <div class="alert alert-danger p-1">{{ $message }}</div>
                                @enderror
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
        </div>
    </div>

    @include('dashboard.layouts.scripts')

        <!--Internal  Notify js -->
        <script src="{{ asset('dashboard') }}/assets/plugins/notify/js/notifIt.js"></script>
        <script src="{{ asset('dashboard') }}/assets/plugins/notify/js/notifit-custom.js"></script>
@endsection
