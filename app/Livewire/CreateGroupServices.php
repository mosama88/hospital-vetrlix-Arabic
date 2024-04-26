<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;

class CreateGroupServices extends Component
{



    public $GroupItems = [];
    public $allServices = [];
    public $discount_value = 0;
    public $taxes = 15;
    public $name_group;

    public $notes;
    public $serviceSaved=false;

    public function mount(){
        $this->allServices = Service::all();
    }

    public function render()
    {
        $total = 0;
        foreach ($this->GroupsItems as $groupItem) {
            if ($groupItem['is_saved'] && $groupItem['service_price'] && $groupItem['quantity']) {
                $total += $groupItem['service_price'] * $groupItem['quantity'];
            }
        }


        return view('livewire.GroupService.create-group-services', [
            'groups'=>Group::all(),
            'subtotal' => $Total_after_discount = $total - ((is_numeric($this->discount_value) ? $this->discount_value : 0)),
            'total' => $Total_after_discount * (1 + (is_numeric($this->taxes) ? $this->taxes : 0) / 100)
        ]);


    }

}
