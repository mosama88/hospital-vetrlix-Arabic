<div class="modal fade" id="edit{{ $section->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">أضافة قسم
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('dashboard.sections.update', $section->id) }}" autocomplete="off">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">أسم القسم</label>
                        <input type="hidden" name="id" value="{{ $section->id }}" class="form-control"
                            id="recipient-name">
                        <input type="text" name="name" value="{{ $section->name }}" class="form-control"
                            id="recipient-name">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">وصف القسم</label>
                        <textarea id="textarea" name="description" class="form-control" rows="3"
                            placeholder="This textarea has a limit of 225 chars.">{{ $section->description }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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
