@extends('dashboard.layouts.master')
@section('title', 'المرضى')
@section('page-title', 'المرضى')
    <link href="{{ asset('dashboard/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">
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
            <div class="col-10  mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('dashboard.payments.store') }}" method="post" autocomplete="off">
                            {{ csrf_field() }}

                            {{--patient_id--}}
                            <div class="mb-3">
                                <label class="form-label">أسم المريض</label>
                                <select name="patient_id" class="form-control select2">
                                    <option selected disabled>أختر أسم المريض</option>
                                    @foreach($Patients as $Patient)
                                        <option value="{{$Patient->id}}">{{$Patient->name}}</option>
                                    @endforeach
                                </select>
                                <!-- end -->
                            </div>

                            {{--Debit--}}
                            <div class="form-group mb-3">
                                <label for="recipient-name" class="col-form-label">المبلغ</label>
                                <input type="number" name="amount" class="form-control" id="recipient-name">
                            </div>

                            {{--Description--}}
                            <div class="form-group mb-3">
                                <label for="recipient-name" class="col-form-label">البيان</label>
                                <textarea id="textarea" name="description" class="form-control" rows="3"
                                          placeholder="This textarea has a limit of 225 chars."></textarea>
                            </div>


                            <div class="col-12 mb-4 text-center">
                                <input class="btn btn-outline-success" type="submit" value="تاكيد البيانات">
                                <a href="{{ route('dashboard.payments.index') }}"
                                   class="btn btn-outline-dark mx-2">رجوع</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- row closed -->
    </div>
    <!-- Container closed -->







    @include('dashboard.layouts.scripts')

    <!--Internal  Notify js -->
    <script src="{{ asset('dashboard/assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ asset('dashboard/assets/plugins/notify/js/notifit-custom.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/select2/js/select2.min.js') }}"></script>

@endsection
