@extends('dashboard.layouts.master')
@section('title', 'صفحتى')
@section('page-title', Auth::user()->name)
@section('page-link-back')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">لوحة التحكم</a>
    </li>
@endsection
@section('current-page', 'صفحتى')
@section('content')
    @include('dashboard.layouts.page-link')
    <!--Internal   Notify -->
    <link href="{{ asset('dashboard') }}/assets/plugins/notify/css/notifIt.css" rel="stylesheet" />

    {{-- Start Row --}}
    @include('dashboard.messages_alert')

    <div class="page-content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
<div class="card">
    <div class="row my-4 mx-2">

        <div class="col-md-6">
            <div class="mt-4 mt-md-0">
                <img class="rounded-circle avatar-xl" alt="200x200" src="{{ asset('dashboard') }}/assets/images/users/user-4.jpg" data-holder-rendered="true">
            </div>
        </div>
    </div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" data-bs-toggle="tab" href="#about" role="tab" aria-selected="true">
                <i class="bx bx-user-circle font-size-20"></i>
                <span class="d-none d-sm-block">السيرة الذاتيه</span>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" data-bs-toggle="tab" href="#change-password" role="tab" aria-selected="false" tabindex="-1">
                <i class="bx bx-clipboard font-size-20"></i>
                <span class="d-none d-sm-block">تغيير كلمة المرور</span>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" data-bs-toggle="tab" href="#personal-Data" role="tab" aria-selected="false" tabindex="-1">
                <i class="bx bx-mail-send font-size-20"></i>
                <span class="d-none d-sm-block">بياناتى الشخصية</span>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" data-bs-toggle="tab" href="#post" role="tab" aria-selected="false" tabindex="-1">
                <i class="bx bx-image font-size-20"></i>
                <span class="d-none d-sm-block">Post</span>
            </a>
        </li>
    </ul>
    <!-- Tab content -->
    <div class="tab-content p-4">

        <div class="tab-pane active" id="about" role="tabpanel">
            <div>
                <div>
                    <h5 class="font-size-16 mb-4">Experience</h5>

                    <ol class="activity-checkout mb-0 px-4 mt-3">
                        <li class="checkout-item">
                            <div class="avatar-sm checkout-icon p-1">
                                <div class="avatar-title rounded-circle bg-primary">
                                    <i class="mdi mdi-pen text-white font-size-20"></i>
                                </div>
                            </div>
                            <div class="feed-item-list">
                                <div>
                                    <h5 class="font-size-16 mb-1">Front end Developer</h5>
                                    <p class="text-muted text-truncate mb-2">2016 - 2019</p>
                                    <div class="mb-3">
                                        <p>ABC Company</p>
                                        <p class="text-muted">Proin maximus nibh at lorem bibendum venenatis. Cras gravida felis et erat consectetur, ac venenatis quam pulvinar.
                                            Cras neque neque, vehicula vel lacus quis, eleifend iaculis mi.
                                            Curabitur in mi eget ex fringilla ultricies sit amet quis arcu.</p>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="checkout-item">
                            <div class="avatar-sm checkout-icon p-1">
                                <div class="avatar-title rounded-circle bg-primary">
                                    <i class="mdi mdi-chart-box text-white font-size-20"></i>
                                </div>
                            </div>
                            <div class="feed-item-list">

                                <h5 class="font-size-16 mb-1">UI /UX Designer</h5>
                                <p class="text-muted text-truncate mb-2">2014 - 2016</p>
                                <div class="mb-3">
                                    <p>XYZ Company</p>
                                    <p class="text-muted">It will be as simple as occidental in fact,
                                        it will be Occidental. To an English person, it will seem like simplified
                                        English, as a skeptical Cambridge friend of mine told me what Occidental</p>
                                </div>
                            </div>
                        </li>

                    </ol>
                </div>

                <div>
                    <h5 class="font-size-16 mb-4">Projects</h5>
                    <div class="table-responsive">
                        <table class="table table-nowrap table-hover mb-0">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Projects</th>
                                <th scope="col">Date</th>
                                <th scope="col">Budget</th>
                                <th scope="col">Status</th>
                                <th scope="col" style="width: 120px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">01</th>
                                <td><a href="#" class="text-reset">Brand Logo Design</a></td>
                                <td>
                                    18 Jun, 2021
                                </td>
                                <td>
                                    $523
                                </td>
                                <td>
                                    <span class="badge bg-primary-subtle text-primary font-size-12">Open</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">02</th>
                                <td><a href="#" class="text-reset">Minible Admin</a></td>
                                <td>
                                    06 Jun, 2021
                                </td>
                                <td>
                                    $253
                                </td>
                                <td>
                                    <span class="badge bg-primary-subtle text-primary font-size-12">Open</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">03</th>
                                <td><a href="#" class="text-reset">Chat app Design</a></td>
                                <td>
                                    28 May, 2021
                                </td>
                                <td>
                                    $356
                                </td>
                                <td>
                                    <span class="badge bg-success-subtle text-success font-size-12">Complete</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">04</th>
                                <td><a href="#" class="text-reset">Minible Landing</a></td>
                                <td>
                                    13 May, 2021
                                </td>
                                <td>
                                    $425
                                </td>
                                <td>
                                    <span class="badge bg-success-subtle text-success font-size-12">Complete</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">05</th>
                                <td><a href="#" class="text-reset">Authentication Pages</a></td>
                                <td>
                                    06 May, 2021
                                </td>
                                <td>
                                    $752
                                </td>
                                <td>
                                    <span class="badge bg-success-subtle text-success font-size-12">Complete</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="change-password" role="tabpanel">
            <div>
                <h3 class="font-size-16 mb-4 text-center">تغيير كلمة المرور</h3>
                <form action="" method="POST">
                    @csrf
                    {{--Old Password Input--}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">كلمة المرور القديمه</label>
                        <div class="col-sm-6">
                            <input class="form-control" name="old_password" type="password"  id="example-text-input">
                        </div>
                    </div>
                    {{--new Password Input--}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">كلمة المرور الجديده</label>
                        <div class="col-sm-6">
                            <input class="form-control" name="new_password" type="password"  id="example-text-input">
                        </div>
                    </div>
                    {{--confirm Password Input--}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">تأكيد كلمة المرور</label>
                        <div class="col-sm-6">
                            <input class="form-control" name="password_confirmation" type="password"  id="example-text-input">
                        </div>
                    </div>

                    <input value="تاكيد" class="btn btn-primary" type="submit">
                </form>


                </div>
        </div>

        <div class="tab-pane" id="personal-Data" role="tabpanel">
            <h3 class="font-size-16 mb-4 text-center">بياناتى الشخصيه</h3>
            <form action="" method="POST">
                @csrf
{{--Name Input--}}
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">الاسم</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="name" type="text" placeholder="Artisanal kale" id="example-text-input">
                    </div>
                </div>
{{--Email Input--}}
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">البريد الألكترونى</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="email" type="email" placeholder="Artisanal@example.com" id="example-text-input">
                    </div>
                </div>

{{--Date Of Birth Input--}}
                <div class="row mb-3">
                    <label for="example-date-input" class="col-sm-2 col-form-label">تاريخ الميلاد</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="birth_date" type="date" value="2020-08-04" id="example-date-input">
                    </div>
                </div>
                <input value="تاكيد" class="btn btn-primary" type="submit">
            </form>


        </div>

        <div class="tab-pane" id="post" role="tabpanel">
            <div>
                <h5 class="font-size-16 mb-4">Post</h5>

                <div class="blog-post">
                    <div class="d-flex align-items-center">
                        <div class="avatar-md me-3">
                            <img src="assets/images/users/avatar-6.jpg" alt="" class="img-fluid rounded-circle img-thumbnail d-block">
                        </div>
                        <div class="flex-1">
                            <h5 class="font-size-15 text-truncate"><a href="#" class="text-reset">Richard Johnson</a></h5>
                            <p class="font-size-13 text-muted mb-0">24 Mar, 2021</p>
                        </div>
                    </div>
                    <div class="pt-3">
                        <ul class="list-inline">
                            <li class="list-inline-item me-3">
                                <a href="javascript: void(0);" class="text-muted">
                                    <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i> Development
                                </a>
                            </li>
                            <li class="list-inline-item me-3">
                                <a href="javascript: void(0);" class="text-muted">
                                    <i class="bx bx-comment-dots align-middle text-muted me-1"></i> 08 Comments
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="position-relative mt-3">
                        <img src="./assets/images/post-1.jpg" alt="" class="img-thumbnail">
                    </div>
                    <div class="pt-3">
                        <div class="d-flex align-items-center justify-content-between border-bottom pb-3">
                            <div>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item me-3">
                                        <a href="javascript: void(0);" class="text-muted">
                                            <i class="bx bx-purchase-tag-alt text-muted me-1"></i> Project
                                        </a>
                                    </li>
                                    <li class="list-inline-item me-3">
                                        <a href="javascript: void(0);" class="text-muted">
                                            <i class="bx bx-like align-middle text-muted me-1"></i> 12 Like
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-group">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-sm">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-sm">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ms-2">
                                        <button type="button" class="btn btn-outline-primary btn-sm waves-effect">Share <i class="bx bx-share-alt align-middle ms-1"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="blog-post mt-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar-md me-3">
                            <img src="assets/images/users/avatar-2.jpg" alt="" class="img-fluid img-thumbnail rounded-circle d-block">
                        </div>
                        <div class="flex-1">
                            <h5 class="font-size-15 text-truncate"><a href="#" class="text-reset">Michael Smith</a></h5>
                            <p class="font-size-13 text-muted mb-0">08 Mar, 2021</p>
                        </div>
                    </div>
                    <div class="pt-3">
                        <ul class="list-inline">
                            <li class="list-inline-item me-3">
                                <a href="javascript: void(0);" class="text-muted">
                                    <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i> Development
                                </a>
                            </li>
                            <li class="list-inline-item me-3">
                                <a href="javascript: void(0);" class="text-muted">
                                    <i class="bx bx-comment-dots align-middle text-muted me-1"></i> 08 Comments
                                </a>
                            </li>
                        </ul>
                        <p class="text-muted">Aenean ornare mauris velit. Donec imperdiet, massa sit amet porta maximus, massa justo faucibus nisi,
                            eget accumsan nunc ipsum nec lacus. Etiam dignissim turpis sit amet lectus porttitor eleifend. Maecenas ornare molestie metus eget feugiat.
                            Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>

                    </div>
                    <div class="position-relative mt-3">
                        <img src="./assets/images/post-2.jpg" alt="" class="img-thumbnail">
                    </div>
                    <div class="pt-3">
                        <div class="d-flex align-items-center justify-content-between border-bottom pb-3">
                            <div>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item me-3">
                                        <a href="javascript: void(0);" class="text-muted">
                                            <i class="bx bx-purchase-tag-alt text-muted me-1"></i> Project
                                        </a>
                                    </li>
                                    <li class="list-inline-item me-3">
                                        <a href="javascript: void(0);" class="text-muted">
                                            <i class="bx bx-like align-middle text-muted me-1"></i> 12 Like
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-group">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-sm">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-sm">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle avatar-sm">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-sm">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ms-2">
                                        <button type="button" class="btn btn-outline-primary btn-sm waves-effect">Share <i class="bx bx-share-alt align-middle ms-1"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end blog post -->
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
