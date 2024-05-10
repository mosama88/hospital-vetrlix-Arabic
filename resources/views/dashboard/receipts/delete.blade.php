<!-- Modal -->
<div class="modal fade" id="delete{{ $receipt->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف سند قبض</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <form action="{{ route('dashboard.receipts.destroy', 'test') }}" method="post">
                {{ method_field('delete') }}
                {{ csrf_field() }}
            <div class="modal-body">
                <input type="hidden" name="id" value="{{ $receipt->id }}">
                هل تريد حذف قسم <strong class="text-danger">{{ $receipt->patients->name }}</strong> ؟
            </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-danger">حذف</button>
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">اغلاق</button>
                </div>
            </form>
        </div>
    </div>
</div>
