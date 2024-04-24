<div class="modal fade" id="update_password{{ $doctor->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        تغيير كلمة مرور <span class="text-danger">{{ $doctor->name }}</span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.update-password') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="password">كلمة المرور الجديده</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="form-group mb-3">
                            <label for="password_confirmation">تأكيد كلمة المرور</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                id="password_confirmation">
                        </div>

                        <input type="hidden" name="id" value="{{ $doctor->id }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                        <button type="submit" class="btn btn-primary">تأكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
