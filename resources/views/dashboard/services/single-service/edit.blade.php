<div class="modal fade" id="edit{{ $service->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">أضافة قسم
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('dashboard.services.update', $service->id) }}" autocomplete="off">
                    @csrf
                    @method('PATCH')

                    <div class="form-group mb-3">
                        <label for="recipient-name" class="col-form-label">أسم الخدمه</label>
                        <input type="hidden" name="id" value="{{ $service->id }}" class="form-control"
                            id="recipient-name">
                        <input type="text" name="name" value="{{ $service->name }}" class="form-control"
                            id="recipient-name">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="recipient-name" class="col-form-label">سعر الخدمه</label>
                        <input type="hidden" name="id" value="{{ $service->id }}" class="form-control"
                               id="recipient-name">
                        <input type="text" name="price" value="{{ $service->price }}" class="form-control"
                               id="recipient-name">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="recipient-name" class="col-form-label">ملاحظات</label>
                        <textarea id="textarea" name="description" class="form-control" rows="3"
                            placeholder="This textarea has a limit of 225 chars.">{{ $service->description }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group mb-3">
                        <label for="status">تغيير حالة الحساب</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="" selected disabled>--أختر حالة الحساب--</option>
                            <option value="1"{{ $service->status === '1' ? 'selected' : '' }}>مفعل
                            </option>
                            <option value="0"{{ $service->status === '0' ? 'selected' : '' }}>غير
                                مفعل</option>
                        </select>
                    </div>



                    <div class="modal-footer">
                        <input class="btn btn-outline-success" type="submit" value="تعديل البيانات">

                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">إغلاق</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
