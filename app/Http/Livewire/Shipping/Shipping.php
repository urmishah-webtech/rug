<?php

namespace App\Http\Livewire\Shipping;

use Livewire\Component;
use App\Models\Country;
use App\Models\ShippingZone;
use App\Models\ShippingZoneCountry;

class Shipping extends Component
{   
    public $zone = [];
    public $update_zone_data = [];
    public $countries;
    public $edit_zone;
    public $shipping_zones;
    public $seleced_countries = [];
    public $countries_list = [];
    public $zone_data;
    public $edit_id;

    protected $rules = [
        'zone.name' => 'required',
        'zone.description' => 'required',
        'zone.countries' => '',
        'zone.start' => '',
        'zone.end' => '',
        'zone.price' => '',
    ];

    public function mount(){
        $this->seleced_countries = array(); 
        $this->shipping_zones = ShippingZone::all();
        $this->countries_list = Country::all();
    }


    public function render()
    {   
        return view('livewire.shipping.shipping');
    }

    public function addShipping()
    {   
        
        $this->validate([
            'zone.name' => 'required',
            'zone.description' => 'required'
        ]);

        $zone_dataid =  ShippingZone::insertGetId([
            'name' => $this->zone['name'],
            'description' => $this->zone['description'],
            'start' => $this->zone['start'],
            'end' => $this->zone['end'],
            'price' => $this->zone['price'],
        ]);

        $zoneCountry = array();
        if (!empty($this->zone['countries'])) {
           foreach ($this->zone['countries'] as $key => $value) {
                $zoneCountry[$key]['zone'] = $zone_dataid;
                $zoneCountry[$key]['country_id'] = $value;
                $zoneCountry[$key]['country_code'] = $value;
            }
            ShippingZoneCountry::insert($zoneCountry);
        }

        
        $this->resetInput();
        
        session()->flash('message', 'Shipping Zone Created Successfully.');

       return redirect(route('shipping-admin'));
    } 

    public function edit($id)
    {   
        $this->edit_id = $id;
        $this->zone_data = ShippingZone::with('country')->find($id);
        $this->update_zone_data['name'] = $this->zone_data->name;
        $this->update_zone_data['description'] = $this->zone_data->description;
        $this->update_zone_data['country'] = $this->zone_data->country;
        $this->update_zone_data['start'] = $this->zone_data->start;
        $this->update_zone_data['end'] = $this->zone_data->end;
        $this->update_zone_data['price'] = $this->zone_data->price;
        $this->seleced_countries = array();
        foreach($this->zone_data->country as $key => $value) {
           $this->seleced_countries[] = $value->country_code;
        }
    }

    public function updateShipping()
    {  
        // $this->validate([
        //     'zone.name' => 'required',
        //     'zone.description' => 'required'
        // ]);
      
        ShippingZone::where('id', $this->edit_id)->update([
            'name' => $this->update_zone_data['name'],
            'description' => $this->update_zone_data['description'],
            'start' => $this->update_zone_data['start'],
            'end' => $this->update_zone_data['end'],
            'price' => $this->update_zone_data['price'],
        ]);

        ShippingZoneCountry::where('zone', $this->edit_id)->delete();
        
        
        if (!empty($this->update_zone_data['countries'])) {
            $zoneCountry = array();
            foreach ($this->update_zone_data['countries'] as $key => $value) {
                $zoneCountry[$key]['zone'] = $this->edit_id;
                $zoneCountry[$key]['country_id'] = $value;
                $zoneCountry[$key]['country_code'] = $value;
            } 
            ShippingZoneCountry::insert($zoneCountry); 
        }

        session()->flash('message', 'Shipping Update Created Successfully.');

        return redirect(route('shipping-admin'));
    }   

    private function resetInput()
    {
        $this->zone['name'] = null;
        $this->zone['description'] = null;
        $this->zone['countries'] = array();
        $this->zone['start'] = array();
        $this->zone['end'] = array();
        $this->zone['price'] = array();
    }


    public function deleteZone($id)
    {
        ShippingZone::where('id', $id)->delete();
        ShippingZoneCountry::where('zone', $id)->delete();
        $this->shipping_zones = ShippingZone::all();
    }
}
