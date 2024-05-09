

<button class="btn btn-outline-primary btn-md" wire:click="show_form_add" type="button"> <i class="fas fa-plus-square"></i> اضافة فاتورة جديدة </button><br><br>
<div class="table-responsive">
    <table class="table text-md-nowrap" id="example1" data-page-length="50"style="text-align: center">
        <thead>
        <tr>
            <th>#</th>
            <th>اسم الخدمة</th>
            <th>اسم المريض</th>
            <th>تاريخ الفاتورة</th>
            <th>اسم الدكتور</th>
            <th>القسم</th>
            <th>سعر الخدمة</th>
            <th>قيمة الخصم</th>
            <th>نسبة الضريبة</th>
            <th>قيمة الضريبة</th>
            <th>الاجمالي مع الضريبة</th>
            <th>نوع الفاتورة</th>
            <th>العمليات</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($single_invoices as $single_invoice)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ Str::limit($single_invoice->Service->name, 10) }}</td>
                <td>{{ $single_invoice->Patient->name }}</td>
                <td>{{ $single_invoice->invoice_date }}</td>
                <td>{{ $single_invoice->doctor->name }}</td>
                <td>{{ $single_invoice->section->name }}</td>
                <td>{{ number_format($single_invoice->price, 2) }}</td>
                <td>{{ number_format($single_invoice->discount_value, 2) }}</td>
                <td>{{ $single_invoice->tax_rate }}%</td>
                <td>{{ number_format($single_invoice->tax_value, 2) }}</td>
                <td>{{ number_format($single_invoice->total_with_tax, 2) }}</td>
                <td>{{ $single_invoice->type == 1 ? 'نقدي':'اجل' }}</td>

                <td>
                <div class="btn-group dropend">
                    <button type="button"
                            class="btn btn-outline-info btn-md"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        العمليات <i class="mdi mdi-chevron-left"></i>
                    </button>
                    <div class="dropdown-menu text-center" style="">

                        {{-- Edit Data --}}
                        <button wire:click="edit({{ $single_invoice->id }})" class="btn btn-primary btn-sm my-1"><i class="fa fa-edit"></i>
                           &nbsp;&nbsp;</button>

                        {{-- Delete Doctor --}}
                        <button type="button" class="btn btn-danger btn-sm my-1" data-toggle="modal" data-target="#delete_invoice" wire:click="delete({{ $single_invoice->id }})">
                            <i class="fa fa-trash"></i></button>

                        {{-- Print Doctor --}}
                        <button wire:click="print({{ $single_invoice->id }})" class="btn btn-primary btn-sm">
                             <i class="fas fa-print"></i></button>
                    </div>
                </div>
                </td>
            </tr>

        @endforeach
    </table>

{{--    @include('livewire.single_invoices.delete')--}}

</div>
