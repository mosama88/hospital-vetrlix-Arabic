@extends('dashboard.layouts.master')
@section('title', 'سيارات الاسعاف')
@section('page-title', 'سيارات الاسعاف')
@section('page-link-back')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.ambulances.index') }}">الخدمات</a>
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
                        <form action="{{route('dashboard.ambulances.update',$ambulance->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$ambulance->id}}">

                            <div class="row mx-auto">
                                <div class="col-3 mb-4">
                                    <label class="form-label" for="input-car_number">رقم السياره</label>
                                    <input id="input-car_number" type="text" value="{{$ambulance->car_number}}" class="form-control input-mask @error('car_number') is-invalid @enderror"  name="car_number" im-insert="false">
                                    @error('car_number')
                                    <div class="alert alert-danger p-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-3 mb-4">
                                    <label class="form-label" for="input-car_model">موديل السيارة</label>
                                    <input id="input-car_model" type="text" value="{{$ambulance->car_model}}" placeholder="موديل" class="form-control input-mask @error('car_model') is-invalid @enderror"  name="car_model" im-insert="false">
                                    @error('car_model')
                                    <div class="alert alert-danger p-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-3 mb-4">
                                    <label class="form-label" for="input-car_year_model">سنة الصنع</label>
                                    <input id="input-car_year_model" value="{{$ambulance->car_year_model}}" type="text" placeholder="2020" class="form-control input-mask @error('car_year_model') is-invalid @enderror"  name="car_year_model" im-insert="false">
                                    @error('car_year_model')
                                    <div class="alert alert-danger p-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-3 mb-4">
                                    <label class="form-label" for="input-type">نوع السيارة</label>
                                    <select id="input-type" name="type" type="text" placeholder="BMW" class="form-select @error('type') is-invalid @enderror"  im-insert="false">
                                        <option value="0"{{ $ambulance->type === '0' ? 'selected' : '' }}>إيجار</option>
                                        <option value="1"{{ $ambulance->type === '1' ? 'selected' : '' }}>مملوكه</option>
                                    </select>
                                    @error('type')
                                    <div class="alert alert-danger p-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mx-auto">
                                <div class="col-3 mb-4">
                                    <label class="form-label" for="input-mask-name">أسم السائق</label>
                                    <input id="input-mask-name" name="name" value="{{$ambulance->name}}" class="form-control input-mask @error('name') is-invalid @enderror" type="text" im-insert="true">
                                    @error('name')
                                    <div class="alert alert-danger p-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-3 mb-4">
                                    <label class="form-label" for="input-mask-license_number">رقم رخصة القيادة</label>
                                    <input id="input-mask-license_number" value="{{$ambulance->license_number}}" name="license_number" placeholder="123" type="number" class="form-control input-mask @error('license_number') is-invalid @enderror"   im-insert="true">
                                    @error('license_number')
                                    <div class="alert alert-danger p-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6 mb-4">
                                    <label class="form-label" for="input-phone">رقم الهاتف</label>
                                    <input id="input-phone" value="{{$ambulance->phone}}" placeholder="tel" type="text" class="form-control input-mask @error('phone') is-invalid @enderror"  name="phone" im-insert="true">
                                    @error('phone')
                                    <div class="alert alert-danger p-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div calss="row mx-auto">
                                <div class="col-lg-12">
                                    <div class="mt-4 my-4 mt-lg-0">
                                        <label class="form-label" for="txtAddress2Billing">ملاحظات</label>
                                        <textarea id="txtAddress2Billing"  rows="4" type="text" class="form-control @error('notes') is-invalid @enderror" name="notes" placeholder="أكتب ملاحظاتك">{{$ambulance->notes}}</textarea>
                                        @error('notes')
                                        <div class="alert alert-danger p-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- Submit --}}
                                    <div class="col-12 mb-4 text-center">
                                        <input class="btn btn-outline-success" type="submit" value="تاكيد البيانات">
                                        <a href="{{ route('dashboard.ambulances.index') }}"
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
