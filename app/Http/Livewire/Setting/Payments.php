<?php

namespace App\Http\Livewire\Setting;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Payments extends Component
{
	// public $stripe_publishable_key;
    // public $stripe_secret_key;
    public $mollie_api_key, $currency, $redirectUrl, $webhookUrl;

	public function mount()
    {
    	// $this->stripe_publishable_key = '';
       	// $this->stripe_secret_key = '';

       	$data = DB::table('payment_setting')->first();

       	if(!empty($data)) {
       		$this->mollie_api_key = $data->mollie_api_key;
       		$this->currency = $data->currency;
       		$this->redirectUrl = $data->redirectUrl;
       		$this->webhookUrl = $data->webhookUrl;

       	}
       	
    }

    public function render()
    {
        return view('livewire.setting.payments');
    }

    public function save()
    {

    	$this->validate([
            // 'stripe_publishable_key' => 'required',
            // 'stripe_secret_key' => 'required',
            'mollie_api_key' => 'required',
            'currency' => 'required',
            'redirectUrl' => 'required',
            'webhookUrl' => 'required',
        ]);


    	$data = DB::table('payment_setting')->first();
    	if(empty($data)) {
    		$created = DB::table('payment_setting')->insert([
	    		'mollie_api_key' => $this->mollie_api_key,
            	'currency' => $this->currency,
            	'redirectUrl' => $this->redirectUrl,
            	'webhookUrl' => $this->webhookUrl,
	    		'created_at' => now(),
	    		'updated_at' => now()
	    	]);
    	} else {
	    	$created = DB::table('payment_setting')->update([
	    		'mollie_api_key' => $this->mollie_api_key,
            	'currency' => $this->currency,
            	'redirectUrl' => $this->redirectUrl,
            	'webhookUrl' => $this->webhookUrl,
	    		'updated_at' => now()
	    	], ['created_at' => $data->created_at]);
	    }
	    if($created) {
			session()->flash('message', 'Data Saved');
	    } else {
	    	session()->flash('message', 'Something Went Wrong! Try Again...');
	    }

    }
}
