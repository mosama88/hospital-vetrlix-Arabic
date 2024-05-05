<div>
    @if($invoce_saved)
        <div class="alert alert-success" role="alert">
            <strong>أحسنت!</strong> تم حفظ الفاتورة بنجاح <a href="#" class="alert-link">عملية ناجحه</a>.
        </div>    @endif
    @if($invoce_updated)
            <div class="alert alert-success" role="alert">
                <strong>أحسنت!</strong> تم تعديل الفاتورة بنجاح <a href="#" class="alert-link">عملية ناجحه</a>.
            </div>
    @endif

    @if($show_table)
@include('livewire.single_invoices.table')
        @else

        عرض أضافة فاتورة
    @endif
</div>
