<!-- Modal -->
<div class="modal fade" id="delete_select" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    حذف مجموعة أطباء</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <form action="{{ route('dashboard.doctors.destroy', 'test') }}" method="post">
                @method('DELETE')
                @csrf
                <div class="modal-body">
                    <h5>هل تريد الحذف ؟</h5>
                    <input type="hidden" id="delete_select_id" name="delete_select_id" value=''>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-danger">حذف</button>
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">اغلاق</button>
                </div>
            </form>
        </div>
    </div>
</div>
