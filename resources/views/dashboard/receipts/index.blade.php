@extends('dashboard.layouts.master')
@section('title', 'سندات القبض')
@section('page-title', 'سندات القبض')
@section('page-link-back')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="fas fa-home"></i></a>
    </li>
@endsection
@section('current-page', 'سندات القبض')
@section('content')
    @include('dashboard.layouts.page-link')
    <!--Internal   Notify -->
    <link href="{{ asset('dashboard') }}/assets/plugins/notify/css/notifIt.css" rel="stylesheet"/>
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
                                    <a href="{{route('dashboard.receipts.create')}}" class="btn btn-outline-primary btn-md" role="button"
                                       aria-pressed="true">اضافة سند جديد</a>
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
                                        @foreach($receipts as $receipt)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{ $receipt->patient->name }}</td>
                                                <td>{{ number_format($receipt->amount, 2) }}</td>
                                                <td>{{ \Str::limit($receipt->description, 50) }}</td>
                                                <td>{{ $receipt->created_at?->diffForHumans() }}</td>
                                                <td>
                                    <a href="{{route('dashboard.receipts.edit',$receipt->id)}}" class="btn btn-outline-info btn-sm"><i class="fas fa-edit"></i></a>
                                    <a class="modal-effect btn btn-outline-danger btn-sm" data-bs-toggle="modal" href="#delete{{$receipt->id}}">
                                        <i class="fas fa-trash-alt"></i></a>
                                    <a href="{{route('dashboard.receipts.show',$receipt->id)}}" class="btn btn-outline-primary btn-sm" target="_blank" title="طباعه سند قبض"><i class="fas fa-print"></i></a>

                                    </td>
                                            </tr>
                                            @include('dashboard.receipts.delete')
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
