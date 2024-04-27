<div class="modal fade" id="delete{{ $doctor->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        تحذير
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('dashboard.doctors.destroy', $doctor->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="form-group">
                            <div class="modal-body">
                                هل تريد حذف الطبيب <strong
                                    class="text-danger">{{ $doctor->name }}</strong> ؟
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="page_id" value="1" class="form-control"
                                id="recipient-name">
                            @if ($doctor->image)
                                <input type="hidden" name="filename" value="{{ $doctor->image->filename }}">
                            @endif
                            <input type="hidden" name="id" value="{{ $doctor->id }}">

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-danger">حذف</button>
                            <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">اغلاق</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
