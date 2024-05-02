@extends('dashboard.layouts.master')
@section('title', 'أضافة طبيب')
@section('page-title', 'أضافة طبيب')
@section('page-link-back')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">لوحة التحكم</a>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.doctors.index') }}">الأطباء</a>
    </li>
@endsection
@section('current-page', 'أضافة طبيب')
@section('content')

    @include('dashboard.layouts.page-link')

    <div class="container-fluid">
    {{-- Start Row --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-5 text-center">أضافة طبيب</h4>

                    <form action="{{ route('dashboard.doctors.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Name Inputs --}}
                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">أسم الطبيب</label>
                            <div class="col-sm-10">
                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" autofocus placeholder="اسم الطبيب"
                                    id="example-text-input">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        {{-- Email Inputs --}}
                        <div class="row mb-4">
                            <label for="example-email-input" class="col-sm-2 col-form-label">البريد الالكترونى</label>
                            <div class="col-sm-10">
                                <input class="form-control @error('email') is-invalid @enderror" name="email" type="text"
                                    placeholder="bootstrap@example.com" id="example-email-input" autocomplete="none">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        {{-- Password Inputs --}}
                        <div class="row mb-4">
                            <label for="example-password-input" class="col-sm-2 col-form-label">كلمة المرور</label>
                            <div class="col-sm-10">
                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" value=""
                                    placeholder="كلمة المرور" id="example-password-input" autocomplete="none">
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        {{-- Phone Inputs --}}
                        <div class="row mb-4">
                            <label for="example-tel-input" class="col-sm-2 col-form-label">الموبايل</label>
                            <div class="col-sm-10">
                                <input class="form-control @error('phone') is-invalid @enderror" type="tel" name="phone" placeholder="1-(555)-555-5555"
                                    id="example-tel-input">
                                @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        {{-- Section Inputs --}}
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label">القسم</label>
                            <div class="col-sm-10">
                                <select name="section_id" class="form-select @error('section_id') is-invalid @enderror" aria-label="Default select example">
                                    <option selected="">Open this select menu</option>
                                    @foreach ($sections as $section)
                                        <option value={{ $section->id }}>{{ $section->name }}</option>
                                    @endforeach
                                </select>
                                @error('section_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->


                        {{-- Section Inputs --}}
                        {{-- <div class="row mb-4">
                            <label class="col-sm-2 col-form-label">حالة الحساب</label>
                            <div class="col-sm-10">
                                <select name="status" class="form-select" aria-label="Default select example">
                                    <option selected="">Open this select menu</option>
                                    <option value="active">مفعل</option>
                                    <option value="inactive">غير مفعل</option>2
                                </select>
                            </div>
                        </div> --}}
                        <!-- end row -->



                        {{-- Appointments Inputs --}}
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label">المواعيد</label>
                            <div class="col-sm-10">
                                <select class="form-select @error('appointments') is-invalid @enderror" name="appointments[]" id="appointments" multiple>
                                    @foreach ($appointments as $appointment)
                                        <option value="{{ $appointment->id }}">{{ $appointment->name }}</option>
                                    @endforeach
                                </select>
                                @error('appointments')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->


                        {{-- Image Inputs --}}
                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">صورة الطبيب</label>
                            <div class="col-sm-10">
                                <input class="form-control @error('photo') is-invalid @enderror" accept="image/*" name="photo" type="file"
                                    id="example-text-input" onchange="loadFile(event)">
                                <img class="rounded-circle avatar-xl my-3" id="output" />
                                @error('photo')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        {{-- Submit --}}
                        <div class="col-12 mb-4 text-center">
                            <input class="btn btn-outline-success" type="submit" value="تاكيد البيانات">
                            <a href="{{ route('dashboard.doctors.index') }}"
                                class="btn btn-outline-dark mx-2">رجوع</a>
                        </div>


                    </form>
                </div>
            </div>
            <!-- end row -->
        </div><!-- end cardbody -->
    </div><!-- end card -->
    </div> <!-- end col -->
    @include('dashboard.layouts.scripts')
    <script src="{{ asset('dashboard') }}/assets/js/pages/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('appointments') // id
    </script>


{{-- photo --}}
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>


@endsection
