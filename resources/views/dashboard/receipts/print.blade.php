    @extends('dashboard.layouts.master')
    @section('title', 'طباعة سند قبض')
    @section('page-title', 'طباعة سند قبض')
    @section('page-link-back')
        <li class="breadcrumb-item"><a href="{{ route('dashboard.receipts.index') }}">سندات القبض</a>
        </li>
    @endsection
    <style>
        @media print {
            #print_Button {
                display: none;
            }
        }
    </style>
    <link href="{{ asset('dashboard/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">

    @section('current-page', 'طباعة سند قبض')
    @section('content')
        @include('dashboard.layouts.page-link')
        <!--Internal   Notify -->
        <link href="{{ asset('dashboard') }}/assets/plugins/notify/css/notifIt.css" rel="stylesheet" />
        {{--    @include('dashboard.messages_alert')--}}

        <div class="container-fluid">
            {{-- Start Row --}}
            <div class="row">
                <div class="col-10  mx-auto">
                    <div class="card">
                        <div class="card-body">
    <!-- row -->
    <div class="row row-sm">
        <div class="col-md-12 col-xl-12">
            <div class=" main-content-body-invoice" id="print">
                <div class="card card-invoice">
                    <div class="card-body">
                        <div class="invoice-header">
                            <h1 class="invoice-title text-center my-2">سند قبض</h1>
                            <div class="billed-from">
                                <h6>برنامج ادراه المستشفي </h6>
                                <p>201 المهندسين<br>
                                    رقم الموبايل: 01500551005<br>
                                    Email: info@hospital.com</p>
                            </div><!-- billed-from -->
                        </div><!-- invoice-header -->
                        <div class="row mg-t-20">
                            <div class="col-md">
                                <label class="tx-gray-900">معلومات السند</label>
                                <p class="invoice-info-row"><span>تاريخ الاصدار</span> <span>: {{$receipt->date}}</span>
                                </p>
                                <p class="invoice-info-row "><span>اسم المريض : </span>
                                    <span>{{$receipt->patient->name}}</span></p>
                            </div>
                        </div>
                        <div class="table-responsive mg-t-40">
                                <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                                <tr>
                                    <th class="wd-20p">#</th>
                                    <th class="wd-40p">ملاحظات</th>
                                    <th class="tx-center">المبلغ</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td class="tx-12">{{ $receipt->description}}</td>
                                    <td class="tx-center">{{ number_format($receipt->amount,2)}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr class="mg-b-40">
                        <a href="#" class="btn btn-danger float-left mt-3 mr-2" id="print_Button" onclick="printDiv()">
                            <i class="mdi mdi-printer ml-1"></i>طباعه
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->

                    @include('dashboard.layouts.scripts')

                    <script type="text/javascript">
                        function printDiv() {
                            var printContents = document.getElementById('print').innerHTML;
                            var originalContents = document.body.innerHTML;
                            document.body.innerHTML = printContents;
                            window.print();
                            document.body.innerHTML = originalContents;
                            location.reload();
                        }
                    </script>

                    <!--Internal  Notify js -->
                    <script src="{{ asset('dashboard/assets/plugins/notify/js/notifIt.js') }}"></script>
                    <script src="{{ asset('dashboard/assets/plugins/notify/js/notifit-custom.js') }}"></script>
                    <script src="{{ asset('dashboard/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
                    <script src="{{ asset('dashboard/assets/libs/select2/js/select2.min.js') }}"></script>

    @endsection
