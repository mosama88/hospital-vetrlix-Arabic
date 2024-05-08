@extends('dashboard.layouts.master')
@section('title', 'تعديل طبيب')
@section('page-title', 'تعديل طبيب')
@section('page-link-back')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">لوحة التحكم</a>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.doctors.index') }}">الأطباء</a>
    </li>
@endsection
@section('current-page', 'تعديل طبيب')
@section('content')

    @include('dashboard.layouts.page-link')
    <div class="container-fluid">
    {{-- Start Row --}}
    <div class="row">
        <div class="col-12">
{{--            @include('dashboard.messages_alert')--}}

            <div class="card">
                <div class="card-body">


                    @if ($doctors->image)
                        <img class="img-thumbnail rounded me-2" alt="200x200" style="width: 200px; height:200px"
                            src="{{ asset('dashboard/assets/images/uploads/doctors/' . $doctors->image->filename) }}"
                            data-holder-rendered="true">
                    @else
                        <img class="img-thumbnail rounded me-2" alt="200x200" style="width: 200px; height:200px"
                            src="{{ asset('Dashboard/img/doctor_default.png') }}" data-holder-rendered="true">
                    @endif



                    <h4 class="card-title mb-5 text-center">تعديل طبيب</h4>

                    <form action="{{ route('dashboard.doctors.update', $doctors->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- Name Inputs --}}
                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">أسم الطبيب</label>
                            <div class="col-sm-10">
                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ $doctors->name }}"
                                    placeholder="اسم الطبيب" id="example-text-input">
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
                                <input class="form-control @error('email') is-invalid @enderror" name="email" type="email"
                                    placeholder="bootstrap@example.com" value="{{ $doctors->email }}"
                                    id="example-email-input" autocomplete="none">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->



                        {{-- Phone Inputs --}}
                        <div class="row mb-4">
                            <label for="example-tel-input" class="col-sm-2 col-form-label">الموبايل</label>
                            <div class="col-sm-10">
                                <input class="form-control @error('phone') is-invalid @enderror" type="tel" name="phone" value="{{ $doctors->phone }}"
                                    placeholder="1-(555)-555-5555" id="example-tel-input">
                                <input class="form-control" value="{{ $doctors->id }}" name="id" type="hidden">
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
                                        <option value="{{ $section->id }}"
                                            {{ $section->id == $doctors->section_id ? 'selected' : '' }}>
                                            {{ $section->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('section_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->


                        {{-- Status  Inputs --}}
                        {{-- <div class="row mb-4">
                            <label class="col-sm-2 col-form-label">حالة الحساب</label>
                            <div class="col-sm-10">
                                <select name="status" class="form-select" aria-label="Default select example">
                                    <option selected="">Open this select menu</option>
                                    <option value="active"{{ $doctors->status === 'active' ? 'selected' : '' }}>مفعل
                                    </option>
                                    <option value="inactive"{{ $doctors->status === 'inactive' ? 'selected' : '' }}>غير
                                        مفعل
                                    </option>
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
                                        @php $check = []; @endphp
                                        @foreach ($doctors->doctorappointments as $key => $appointmentDOC)
                                            @php
                                                $check[] = $appointmentDOC->id;
                                            @endphp
                                        @endforeach
                                        <option value="{{ $appointment->id }}"
                                            {{ in_array($appointment->id, $check) ? 'selected' : '' }}>
                                            {{ $appointment->name }}</option>
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
                                @error('photo')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <img class="rounded-circle avatar-xl my-3" id="output" />
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="form-check mt-4 my-4 mt-lg-0">
                            <label class="form-check-label" for="flexCheckDefault">
                                حالة التفعيل
                            </label>
                            <input name="status" {{$doctors->status == 'active' ? 'checked' : ''}} value="1" type="checkbox" class="form-check-input" id="exampleCheck1">
                        </div>

                        {{-- Submit --}}
                        <div class="col-12 mb-4 text-center">
                            <input class="btn btn-outline-success" type="submit" value="تعديل البيانات">
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
