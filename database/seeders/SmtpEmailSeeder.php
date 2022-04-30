<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\smtpmail;

class SmtpEmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Smtp =  smtpmail::create([
            'mailmailer' 			=> 'smtp',
            'mailhost' 				=> 'mail.eliterenovation.co.uk',
            'mailport' 				=> '587',
            'mailusername' 			=> 'iwebtech',
            'mailpassword' 			=> 'Liberty!1001',
            'mailformaddress' 		=> 'tls',
            'mailfrom_name' 	  	=> 'anyallen8643@gmail.com',
            'mailfrom_encypation' 	=> 'Webtech Evolution',
        ]);
    }
}
