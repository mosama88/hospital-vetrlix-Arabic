<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">أضافة خدمه
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('dashboard.services.store') }}" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">أسم الخدمه</label>
                        <input type="text" name="name" class="form-control" id="recipient-name">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">سعر الخدمه</label>
                        <input type="text" name="price" class="form-control" id="recipient-name">
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">ملاحظات</label>
                        <textarea id="textarea" name="description" class="form-control" rows="3"
                            placeholder="This textarea has a limit of 225 chars."></textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>



            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">أضف</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
