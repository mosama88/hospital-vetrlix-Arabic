    <!-- Modal -->
                <div class="modal fade" id="deleteGroup{{$group->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف مجموعة خدمات</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                <div class="modal-body">
                    <h5>هل انت متاكد من عملية الحذف
                        <strong class="text-danger">{{ $group->name }}</strong> ؟</h5>
                </div>
                <div class="modal-footer">
                    <button type="submit" wire:click="delete({{ $group->id }})" class="btn btn-outline-danger">حذف</button>
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">اغلاق</button>
                </div>
        </div>
    </div>
</div>
