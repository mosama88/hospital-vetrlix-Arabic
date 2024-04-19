@section('title', 'دخول')
<style>
    .login-form {
        display: none;
    }

    .select-hide {

        margin-top: 100px;
    }
</style>
@include('dashboard.layouts.head')

<body class="account-pages">
    <!-- Begin page -->
    <div class="accountbg"
        style="background: url('{{ asset('dashboard') }}/assets/images/bg.jpg');background-size: cover;background-position: center;">
    </div>

    <div class="wrapper-page account-page-full">



        <div class="card shadow-none">
            <div class="card-block">
                <div class="account-box">
                    <div class="card-box shadow-none p-4">
                        <div class="p-2">
                            <div class="text-center mt-4">
                                <a href="index.html" class="logo logo-dark">
                                    <span class="logo-lg">
                                        <img src="{{ asset('dashboard') }}/assets/images/logo-dark.png" alt=""
                                            height="17">
                                    </span>
                                </a>

                                <a href="index.html" class="logo logo-light">
                                    <span class="logo-lg">
                                        <img src="{{ asset('dashboard') }}/assets/images/logo-light.png" alt=""
                                            height="18">
                                    </span>
                                </a>
                            </div>

                            <div class="container select-hide">
                                {{-- Select To login --}}
                                <div class="row mb-3">
                                    <label class="form-label">حدد طريقة الدخول</label>
                                    <div class="col-sm-12">
                                        <select name="somename" class="form-select" id="selectForm"
                                            aria-label="Default select example" onclick="console.log($(this).val())"
                                            onchange="console.log('change is firing')" tabindex="-1">
                                            <option disabled selected="">
                                                افتح قائمة التحديد</option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>
                                </div>
                            </div>



                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger text-center">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif

                            {{-- Login Admin --}}
                            <div class="login-form" id="admin">
                                <h4 class="font-size-18 mt-5 text-center">
                                    مرحبًا بعودتك !
                                </h4>
                                <p class="text-muted text-center">الدخول بواسطة Admin
                                </p>
                                <form method="POST" action="{{ route('admin.login') }}">
                                    @csrf

                                    <!-- Email Input -->
                                    <div class="mb-3">
                                        <label class="form-label" for="username">البريد الالكترونى</label>
                                        <input type="text" name="email" class="form-control" id="username"
                                            placeholder="Enter username">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <!-- Password Input -->
                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">كلمة المرور</label>
                                        <input type="password" name="password" class="form-control" id="userpassword"
                                            placeholder="Enter password">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <input type="checkbox" name="remember" class="form-check-input"
                                                    id="customControlInline">
                                                <label class="form-check-label" for="customControlInline">تذكرنى</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light"
                                                type="submit">دخول</button>
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-2 mb-0 row">
                                        <div class="col-12 mt-3">
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}"><i class="mdi mdi-lock"></i>
                                                    نسيت كلمة المرور ؟
                                                </a>
                                            @endif
                                        </div>
                                    </div>

                                </form>
                            </div>


                            {{-- Login User --}}
                            <div class="login-form" id="user">
                                <h4 class="font-size-18 mt-5 text-center">
                                    مرحبًا بعودتك !
                                </h4>
                                <p class="text-muted text-center">الدخول بواسطة User.
                                </p>

                                <form method="POST" action="{{ route('user.login') }}">
                                    @csrf

                                    <!-- Email Input -->
                                    <div class="mb-3">
                                        <label class="form-label" for="username">البريد الالكترونى</label>
                                        <input type="text" name="email" class="form-control" id="username"
                                            placeholder="Enter username">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <!-- Password Input -->
                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">كلمة المرور</label>
                                        <input type="password" name="password" class="form-control" id="userpassword"
                                            placeholder="Enter password">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <input type="checkbox" name="remember" class="form-check-input"
                                                    id="customControlInline">
                                                <label class="form-check-label"
                                                    for="customControlInline">تذكرنى</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light"
                                            type="submit">دخول</button>
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-2 mb-0 row">
                                        <div class="col-12 mt-3">
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}"><i
                                                        class="mdi mdi-lock"></i>
                                                        نسيت كلمة المرور ؟
                                                    </a>
                                            @endif
                                        </div>
                                    </div>

                                </form>
                            </div>





                            <div class="mt-5 pt-4 text-center">
                                <p>ليس لدى حساب ؟<a href="{{ route('register') }}"
                                        class="fw-medium text-primary">
                                        تسجيل </a> </p>
                                <p>©
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script> Veltrix. Crafted with <i
                                        class="mdi mdi-heart text-danger"></i> by Themesbrand
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


    <!-- JAVASCRIPT -->
    <script src="{{ asset('dashboard') }}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('dashboard') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('dashboard') }}/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ asset('dashboard') }}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('dashboard') }}/assets/libs/node-waves/waves.min.js"></script>


    <script src="assets/js/app.js"></script>
    <script>
        $('#selectForm').change(function() {
            var myID = $(this).val();
            $('.login-form').each(function() {
                myID === $(this).attr('id') ? $(this).show() : $(this).hide();
            });
        });
    </script>

</body>

</html>
