<?php

namespace App\Http\Livewire\Setting;

use Livewire\Component;
use App\Models\smtpmail;

class SmtpEmail extends Component
{

	protected $rules = [

        'getsmtp.mailmailer' => [],
        'getsmtp.mailhost' => [],
        'getsmtp.mailport' => [],
        'getsmtp.mailusername' => [],
        'getsmtp.mailpassword' => [],
        'getsmtp.mailformaddress' => [],
        'getsmtp.mailfrom_name' => [],
        'getsmtp.mailfrom_encypation' => [],

    ];
    
    public function mount()
    {
        $this->getsmtp = smtpmail::where('id',1)->first();
    }

    public function render()
    {
        return view('livewire.setting.smtp-email');
    }

    public function updatestore()
    {
        $smtp = smtpmail::where('id','1')->first();

        $smtp->mailmailer     		= $this->getsmtp['mailmailer'];
        $smtp->mailhost     		= $this->getsmtp['mailhost'];
        $smtp->mailport     		= $this->getsmtp['mailport'];
        $smtp->mailusername     	= $this->getsmtp['mailusername'];
        $smtp->mailpassword     	= $this->getsmtp['mailpassword'];
        $smtp->mailformaddress      = $this->getsmtp['mailformaddress'];
        $smtp->mailfrom_name     	= $this->getsmtp['mailfrom_name'];
        $smtp->mailfrom_encypation  = $this->getsmtp['mailfrom_encypation'];
        $smtp->save();

        session()->flash('message', 'Record Updated Successfully.');
        //return redirect(route('setting.general-setting'));
    }
}
