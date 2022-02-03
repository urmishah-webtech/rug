<?php

namespace App\Http\Livewire\Setting;

use App\Models\Country;
use App\Models\CustomerAddress;
use App\Models\CustomerDetail;
use App\Models\Tag;
use App\Models\User;
use App\Models\General;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class GeneralSetting extends Component
{
    use WithFileUploads;
    public $General, $store_name, $phonenumber, $sender_email, $admin_logo, $admin_favicon;

    public $getgeneral;

    protected $rules = [

        'getgeneral.store_name' => [],
        'getgeneral.contact_email' => [],
        'getgeneral.sender_email' => [],
        'getgeneral.industry' => [],
        'getgeneral.company' => [],
        'getgeneral.address' => [],
        'getgeneral.apartment' => [],
        'getgeneral.mobile_number' => [],
        'getgeneral.city' => [],
        'getgeneral.country' => [],
        'getgeneral.pincode' => [],

    ];
    public function mount()
    {
        $this->getgeneral = General::where('id',1)->first();
    }

    public function render()
    {
        $this->General = General::where('id','1')->first();

        return view('livewire.setting.general-setting');
    }

    public function updatestore()
    {
        $user = General::where('id','1')->first();

        if($this->admin_logo){

            $photo = $this->admin_logo;
            $path_url = $photo->storePublicly('general','public');
            
            $productinsert = General::where('id',$user->id)->update(['backend_logo' => $path_url]);
        }

        if($this->admin_favicon){

            $photo = $this->admin_favicon;
            $path_url = $photo->storePublicly('general','public');
            
            $productinsert = General::where('id',$user->id)->update(['favicon_logo' => $path_url]);
        }

        $user->store_name     = $this->getgeneral['store_name'];
        $user->contact_email     = $this->getgeneral['contact_email'];
        $user->sender_email     = $this->getgeneral['sender_email'];
        $user->industry     = $this->getgeneral['industry'];
        $user->company     = $this->getgeneral['company'];
        $user->address     = $this->getgeneral['address'];
        $user->apartment     = $this->getgeneral['apartment'];
        $user->mobile_number     = $this->getgeneral['mobile_number'];
        $user->city        = $this->getgeneral['city'];
        $user->country     = $this->getgeneral['country'];
        $user->pincode     = $this->getgeneral['pincode'];
        $user->save();

        session()->flash('message', 'Record Updated Successfully.');
        //return redirect(route('setting.general-setting'));
    }
}
