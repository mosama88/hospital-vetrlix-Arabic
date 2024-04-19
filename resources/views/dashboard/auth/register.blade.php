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

                            <h4 class="font-size-18 mt-5 text-center">Free Register</h4>
                            <p class="text-muted text-center">Get your free Veltrix account now.</p>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                {{-- Name Input --}}
                                <div class="mb-3">
                                    <label class="form-label" for="username">Name</label>
                                    <input type="text" name="name" class="form-control" id="username"
                                        placeholder="Enter Name">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                {{-- Email Input --}}
                                <div class="mb-3">
                                    <label class="form-label" for="useremail">Email</label>
                                    <input type="email" name="email" class="form-control" id="useremail"
                                        placeholder="Enter email">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                {{-- Password Input --}}
                                <div class="mb-3">
                                    <label class="form-label" for="userpassword">Password</label>
                                    <input type="password" name="password" class="form-control" id="userpassword"
                                        placeholder="Enter password" autocomplete="off">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                {{-- Confirm Password Input --}}
                                <div class="mb-3">
                                    <label class="form-label" for="userpassword">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        id="userpassword" placeholder="Enter password" autocomplete="off">
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-12 text-end">
                                        <button class="btn btn-primary w-md waves-effect waves-light"
                                            type="submit">Register</button>
                                    </div>
                                </div>

                                <div class="mt-2 mb-0 row">
                                    <div class="col-12 mt-3">
                                        <p class="mb-0">By registering you agree to the Veltrix <a href="#"
                                                class="text-primary">Terms of Use</a></p>
                                    </div>
                                </div>

                            </form>

                            <div class="mt-5 pt-4 text-center">
                                <p>Already have an account ? <a href="{{ route('login') }}"
                                        class="fw-medium text-primary"> Login </a> </p>
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


    <script src="{{ asset('dashboard') }}/assets/js/app.js"></script>







</body>

</html>
