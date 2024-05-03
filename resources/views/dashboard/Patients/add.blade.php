@extends('dashboard.layouts.master')
@section('title', 'المرضى')
@section('page-title', 'المرضى')
@section('page-link-back')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.patients.index') }}">جدول المرضى</a>
    </li>
@endsection
@section('current-page', 'المرضى')
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
                <form action="{{route('dashboard.patients.store')}}" method="POST">
                    @csrf
                    <div class="row">
                            <div class="col-3 mb-4">
                                    <label class="form-label" for="input-id_number">الرقم القومى</label>
                                    <input id="input-nation_number" type="text" name="nation_number" value="{{old('nation_number')}}" placeholder="14 رقم" class="form-control input-mask @error('nation_number') is-invalid @enderror" >
                                    @error('nation_number')
                                    <div class="alert alert-danger p-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-3 mb-4">
                                    <label class="form-label" for="input-name">الأسم</label>
                                    <input id="input-name" type="text" name="name" value="{{old('name')}}" placeholder="الأسم" class="form-control input-mask @error('car_model') is-invalid @enderror"  >
                                    @error('name')
                                    <div class="alert alert-danger p-1">{{ $message }}</div>
                                    @enderror
                                </div>

                        <div class="col-3 mb-4">
                                    <label class="form-label" for="input-email">البريد الالكترونى</label>
                                    <input id="input-email" name="email" value="{{old('email')}}" type="email" placeholder="user@example.com" class="form-control input-mask @error('email') is-invalid @enderror"  im-insert="false">
                                    @error('email')
                                    <div class="alert alert-danger p-1">{{ $message }}</div>
                                    @enderror
                        </div>
                        <div class="col-3 mb-4">
                            <label class="form-label" for="input-password">كلمة المرور</label>
                            <input id="input-password" name="password" value="{{old('password')}}" type="password" class="form-control input-mask @error('password') is-invalid @enderror"  im-insert="false">
                            @error('password')
                            <div class="alert alert-danger p-1">{{ $message }}</div>
                            @enderror
                        </div>

                    <div class="row">
                        <div class="col-3 mb-4">
                                    <label class="form-label" for="input-mask-phone">رقم الهاتف</label>
                                    <input id="input-mask-phone" type="tel" name="phone" value="{{old('phone')}}" class="form-control input-mask @error('phone') is-invalid @enderror"  im-insert="true">
                                    @error('phone')
                                    <div class="alert alert-danger p-1">{{ $message }}</div>
                                    @enderror
                        </div>
                        <div class="col-3 mb-4">
                            <label for="example-date-input" class="form-label">تاريخ الميلاد</label>
                            <input class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" type="date" value="2020-08-04" id="example-date-input">
                            @error('birth_date')
                                <div class="alert alert-danger p-1">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-3 mb-4">
                            <label class="form-label" for="input-type_blood">نوع فصيلة الدم</label>
                            <select id="input-type_blood" name="type_blood" class="form-select" @error('type_blood') is-invalid @enderror value="{{old('type_blood')}}"    im-insert="true">
                                <option value="1"> A </option>
                                <option value="2"> A+ </option>
                                <option value="3"> B </option>
                                <option value="4"> B+ </option>
                                <option value="5"> O </option>
                                <option value="6"> O+</option>
                                <option value="7"> AB  </option>
                            </select>
                            @error('type_blood')
                            <div class="alert alert-danger p-1">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-3 mb-4">
                            <label class="form-label" for="input-gender">الجنس</label>
                            <select id="input-gender" name="gender" value="{{old('gender')}}" class="form-select @error('gender') is-invalid @enderror"  im-insert="false">
                                <option value="male"> ذكر </option>
                                <option value="female"> أنثى </option>
                            </select>
                            @error('gender')
                            <div class="alert alert-danger p-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    </div>

                    <div class="col-6 mb-4">
                        <label class="form-label" for="input-address_id">محافظة</label>
                        <select id="input-address_id" name="address_id" value="{{old('address_id')}}" class="form-select @error('address_id') is-invalid @enderror"  im-insert="false">
                            @foreach($addresses as $address)
                                <option value="{{$address->id}}">{{$address->city}}</option>
                            @endforeach
                        </select>
                        @error('type')
                        <div class="alert alert-danger p-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div calss="row mx-auto">
                        <div class="col-lg-12">
                            <div class="mt-4 my-4 mt-lg-0">
                                <label class="form-label" for="txtAddress2Billing">التاريخ المرضى</label>
                                <textarea id="txtAddress2Billing"  name="sick_history" rows="4" type="text" class="form-control @error('sick_history') is-invalid @enderror" name="sick_history" placeholder="أكتب ملاحظاتك">{{old('sick_history')}}</textarea>
                                @error('sick_history')
                                <div class="alert alert-danger p-1">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- Submit --}}
                            <div class="col-12 mb-4 text-center">
                        <input class="btn btn-outline-success" type="submit" value="تاكيد البيانات">
                        <a href="{{ route('dashboard.patients.index') }}"
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
    <script src="{{ asset('dashboard') }}/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>


@endsection
