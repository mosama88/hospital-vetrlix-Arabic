@extends('dashboard.layouts.master')
@section('title', trans('doctors.add_doctor'))
@section('page-title', trans('doctors.add_doctor'))
@section('page-link-back')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ trans('page-title.dashboard') }}</a>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.doctors.index') }}">{{ trans('doctors.doctors') }}</a>
    </li>
@endsection
@section('current-page', trans('doctors.add_doctor'))
@section('content')

    @include('dashboard.layouts.page-link')

    {{-- Start Row --}}

    <div class="row">
        <div class="col-12">
            @include('dashboard.messages_alert')

            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-5 text-center">{{ trans('doctors.add_doctor') }}</h4>

                    <form action="{{ route('dashboard.doctors.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Name Inputs --}}
                        <div class="row mb-4">
                            <label for="example-text-input"
                                class="col-sm-2 col-form-label">{{ trans('doctors.name') }}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="name" placeholder="اسم الطبيب"
                                    id="example-text-input">

                            </div>
                        </div>
                        <!-- end row -->

                        {{-- Email Inputs --}}
                        <div class="row mb-4">
                            <label for="example-email-input"
                                class="col-sm-2 col-form-label">{{ trans('doctors.email') }}</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="email" type="email"
                                    placeholder="bootstrap@example.com" id="example-email-input" autocomplete="none">
                            </div>
                        </div>
                        <!-- end row -->

                        {{-- Password Inputs --}}
                        <div class="row mb-4">
                            <label for="example-password-input"
                                class="col-sm-2 col-form-label">{{ trans('doctors.password') }}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="password" name="password" value=""
                                    placeholder="كلمة المرور" id="example-password-input" autocomplete="none">
                            </div>
                        </div>
                        <!-- end row -->

                        {{-- Phone Inputs --}}
                        <div class="row mb-4">
                            <label for="example-tel-input"
                                class="col-sm-2 col-form-label">{{ trans('doctors.phone') }}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="tel" name="phone" placeholder="1-(555)-555-5555"
                                    id="example-tel-input">
                            </div>
                        </div>
                        <!-- end row -->

                        {{-- Section Inputs --}}
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label">{{ trans('doctors.section') }}</label>
                            <div class="col-sm-10">
                                <select name="section_id" class="form-select" aria-label="Default select example">
                                    <option selected="">Open this select menu</option>
                                    @foreach ($sections as $section)
                                        <option value={{ $section->id }}>{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- end row -->


                        {{-- Section Inputs --}}
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label">{{ trans('doctors.Status') }}</label>
                            <div class="col-sm-10">
                                <select name="status" class="form-select" aria-label="Default select example">
                                    <option selected="">Open this select menu</option>
                                    <option value="1">مفعل</option>
                                    <option value="2">غير مفعل</option>2
                                </select>
                            </div>
                        </div>
                        <!-- end row -->



                        {{-- Appointments Inputs --}}
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label">{{ trans('doctors.appointments') }}</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="appointments" id="appointments" multiple>
                                    @foreach ($appointments as $appointment)
                                        <option value="{{ $appointment->id }}">{{ $appointment->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- end row -->


                        {{-- Price Inputs --}}
                        <div class="row mb-4">
                            <label for="example-number-input"
                                class="col-sm-2 col-form-label">{{ trans('doctors.price') }}</label>
                            <div class="col-sm-10">
                                <input class="form-control" placeholder="500" name="price" type="number" value=""
                                    id="example-number-input">
                            </div>
                        </div>
                        <!-- end row -->

                        {{-- Image Inputs --}}
                        <div class="row mb-4">
                            <label for="example-text-input"
                                class="col-sm-2 col-form-label">{{ trans('doctors.img') }}</label>
                            <div class="col-sm-10">
                                <input class="form-control" accept="image/*" name="photo" type="file"
                                    id="example-text-input" onchange="loadFile(event)">
                                <img class="rounded-circle avatar-xl my-3" id="output" />

                            </div>
                        </div>
                        <!-- end row -->

                        {{-- Submit --}}
                        <div class="col-12 mb-4 text-center">
                            <button type="submit"
                                class="btn btn-primary waves-effect btn-lg mx-3">{{ trans('doctors.submit') }}</button>
                            <a href="{{ route('dashboard.doctors.index') }}"
                                class="btn btn-secondary waves-effect btn-lg">{{ trans('doctors.back') }}</a>
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
