<?php

namespace App\Http\Livewire\OnlineStore;

use Livewire\Component;
use App\Models\page;

class Pages extends Component
{
    public $filter_pages;

 
    public function render()
    {
    	$pages = page::when($this->filter_pages, function ($query, $filter_pages) {
            $query->Where('title', 'LIKE', '%' . $filter_pages . '%');
            })->get();
        return view('livewire.online-store.pages', ['pages' => $pages]);
    }
}
