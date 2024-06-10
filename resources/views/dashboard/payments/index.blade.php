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
                                    <a href="{{route('dashboard.payments.create')}}" class="btn btn-outline-primary btn-md" role="button"
                                       aria-pressed="true">اضافة سند صرف جديد</a>
                                </div>
                            </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-md-nowrap" id="example1">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم المريض</th>
                                    <th>المبلغ</th>
                                    <th>البيان</th>
                                    <th>تاريخ الاضافة</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($payments as $payment)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $payment->patient->name }}</td>
                                        <td>{{ number_format($payment->amount, 2) }}</td>
                                        <td>{{ \Str::limit($payment->description, 50) }}</td>
                                        <td>{{ $payment->created_at?->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{route('dashboard.receipts.edit',$payment->id)}}" class="btn btn-outline-info btn-sm"><i class="fas fa-edit"></i></a>
                                            <a class="modal-effect btn btn-outline-danger btn-sm" data-bs-toggle="modal" href="#delete{{$payment->id}}">
                                                <i class="fas fa-trash-alt"></i></a>
                                            <a href="{{route('dashboard.receipts.show',$payment->id)}}" class="btn btn-outline-primary btn-sm" target="_blank" title="طباعه سند قبض"><i class="fas fa-print"></i></a>

                                        </td>
                                    </tr>
                                    @include('dashboard.payments.delete')
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- bd -->
                </div><!-- bd -->
            </div>
            <!--/div-->

            <!-- /row -->

        </div>
        <!-- row closed -->

        <!-- Container closed -->


        @include('dashboard.layouts.scripts')



        <!--Internal  Notify js -->
        <script src="{{ asset('dashboard') }}/assets/plugins/notify/js/notifIt.js"></script>
        <script src="{{ asset('dashboard') }}/assets/plugins/notify/js/notifit-custom.js"></script>
        @endsection
                      <script src="{{ asset('dashboard') }}/assets/plugins/notify/js/notifit-custom.js"></script>
