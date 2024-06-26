<div class="modal fade" id="update_status{{ $doctor->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        تغيير حالة الحساب <span class="text-danger">{{ $doctor->name }}</span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.update-status') }}" method="POST" autocomplete="off">
                    @csrf

                    <div class="modal-body">

                        <div class="form-group">
                            <label for="status">تغيير حالة الحساب</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="" selected disabled>--أختر حالة الحساب--</option>
                                <option value="active">مفعل
                                </option>
                                <option value="inactive">غير
                                    مفعل</option>
                            </select>
                        </div>

                        <input type="hidden" name="id" value="{{ $doctor->id }}">
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-outline-success" type="submit" value="تعديل البيانات">

                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">إغلاق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
