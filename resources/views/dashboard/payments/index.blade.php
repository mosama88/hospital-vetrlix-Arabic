@extends('dashboard.layouts.master')
@section('title', 'المرضى')
@section('page-title', 'المرضى')
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
            <div class="col-12">
                @include('dashboard.messages_alert')
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 ">
                            <div class="col-sm-12 col-md-12 col-xl-12">
                                <div class="my-4">
                                    <!-- Satic modal -->
                                    <a type="button" href="{{route('dashboard.patients.create')}}" class="btn btn-outline-primary btn-md">
                                        <i class="fas fa-plus-square"></i> أضافة مريض
                                    </a>
                                </div>
                            </div>







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
