@if ($errors->any())


    @foreach ($errors->all() as $error)
        <div class="col-6 my-3">
            <div class="alert alert-danger bg-danger text-white mb-0 border-0" role="alert">
                <strong>Oh snap! </strong>{{ $error }}
            </div>
        </div>
    @endforeach
@endif



{{-- <div class="alert alert-danger">
        <ul>

        </ul>
    </div> --}}
@if (session()->has('add'))
    <script>
        window.onload = function() {
            notif({
                msg: "تم أضافة الطبيب بنجاح",
                type: "success"
            });
        }
    </script>
@endif

@if (session()->has('edit'))
    <script>
        window.onload = function() {
            notif({
                msg: "تم تعديل بيانات الطبيب بنجاح",
                type: "success"
            });
        }
    </script>
@endif

@if (session()->has('delete'))
    <script>
        window.onload = function() {
            notif({
                msg: "تم حذف الطبيب بنجاح",
                type: "success"
            });
        }
    </script>
@endif


@if (session()->has('changePassword'))
    <script>
        window.onload = function() {
            notif({
                msg: "تم تغيير كلمة المرور بنجاح",
                type: "success"
            });
        }
    </script>
@endif
