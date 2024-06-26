@extends('dashboard.layouts.master')
@section('title', 'الأقسام')
@section('page-title', 'الأقسام')
@section('page-link-back')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="fas fa-home"></i></a>
    </li>
@endsection
@section('current-page', 'الأقسام')
@section('content')
    @include('dashboard.layouts.page-link')
    <!--Internal   Notify -->
    <link href="{{ asset('dashboard') }}/assets/plugins/notify/css/notifIt.css" rel="stylesheet" />

    <div class="container-fluid">
        {{-- Start Row --}}
        <div class="row">
            @include('dashboard.messages_alert')
            <div class="card">
                <div class="card-body">
                    <div class="col-12 ">
                        <div class="col-sm-12 col-md-12 col-xl-12">
                            <div class="my-4">
                                <!-- Satic modal -->
                                <button type="button" class="btn btn-outline-primary btn-md"
                                        data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    <i class="fas fa-plus-square"></i> أضافة قسم
                                </button>
                            </div>
                            @include('dashboard.sections.add')
                            <!-- /.modal -->
                        </div>

                    </div>

                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">أسم القسم
                                    </th>
                                    <th class="wd-20p border-bottom-0">وصف القسم
                                    </th>
                                    <th class="wd-20p border-bottom-0">تاريخ الأضافة
                                    </th>
                                    <th class="wd-20p border-bottom-0">العمليات
                                    </th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach ($sections as $section)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a
                                                href="{{ route('dashboard.sections.show', $section->id) }}">{{ $section->name }}</a>
                                        </td>
                                        <td>{{ Str::limit($section->description, 50) }}</td>
                                        <td>{{ $section->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a class="modal-effect btn btn-outline-info btn-sm" data-bs-toggle="modal"
                                               href="#edit{{ $section->id }}"><i class="fas fa-edit"></i></a>

                                            <a class="modal-effect btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                               href="#delete{{ $section->id }}"><i class="fas fa-trash-alt"></i></a>
                                            @include('dashboard.sections.delete')
                                        </td>
                                    </tr>
                                    @include('dashboard.sections.edit')
                                @endforeach
                                </tbody>
                            </table>
                            {{-- {{ $sections->render('pagination::bootstrap-5') }} --}}
                        </div>
                </div>

            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    {{-- End Row --}}
    </div> <!-- end container-fluid -->


    @include('dashboard.layouts.scripts')

@endsection



