<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class SearchSingleService extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';


    public function render()
    {
        $services = Service::where('name', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(3);

        return view('livewire.Services.search-single-service', ['services' => $services]);
    }
}
