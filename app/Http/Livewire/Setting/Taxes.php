<?php

namespace App\Http\Livewire\Setting;

use Livewire\Component;

use App\Models\tax;

class Taxes extends Component
{
    public $taxes,$submit,$rate,$country_name;

    protected $rules = [ 'taxes.*.rate' => '' ];
    public function mount() {

        $this->taxes = tax::get();
        $this->submit = tax::where('id',1)->first();
    }
    public function render()
    {
        return view('livewire.setting.taxes');
    }
    
    public function taxStore($id)
    {
        foreach ($this->taxes as $key => $value) {
        $id = $this->taxes[$key]['id'];
        $taxValue = tax::query()->findOrFail($id);

            if ($id) {
               $taxValue->update([
                   'rate' => $this->taxes[$key]['rate'],

                ]);
            } 
         }
        
       session()->flash('message', 'Tax Updated Successfully.');
        
    }

    public function AddCountryRecord()
    {
        tax::insert(['country_name' => $this->country_name, 'rate' => $this->rate]);
        $this->taxes = tax::get();
       session()->flash('message', 'Tax Create Successfully.');
        
    }
}
