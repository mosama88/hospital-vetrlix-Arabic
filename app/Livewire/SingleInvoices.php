<?php

namespace App\Livewire;

use App\Models\single_invoice;
use Livewire\Component;

class SingleInvoices extends Component
{

    public $invoce_saved , $invoce_updated;
    public $show_table = true;

    public function render()
    {
        return view('livewire.single_invoices.single-invoices',[

        'single_invoices'=>single_invoice::all(),
        ]);
    }
}

