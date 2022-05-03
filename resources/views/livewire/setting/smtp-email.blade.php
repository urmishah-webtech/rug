<div>
<x-admin-layout>
	<style>
        .add-customer-part .card label {
    
    font-weight: 500;
}
.mb-10{
    margin-bottom: 10px !important;
}
    </style>
    <section class="full-width flex-wrap admin-body-width">
        <article class="full-width">
            <div class="columns">
                <div class="page_header d-flex  align-item-center">
                    <a href="{{ route('settings') }}"> 
                        <button class="secondary icon-arrow-left mr-2">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2z"></path></svg>
                        </button>
                    </a>
                    <h4 class="mb-0 fw-5">Mail Details</h4>
                </div>
            </div>
        </article>
    </section>
    <section class="full-width flex-wrap admin-body-width setting-general-sec" wire:ignore>
        <article class="full-width">
            <div class="columns ten">
                <article class="full-width add-customer-part bd_none">
              
                    <div class="columns eight">
                        <div class="card">
                            <div class="row">
                                <label>MAIL_MAILER</label>
                                <input type="text" class="mb-10" wire:model="getsmtp.mailmailer" value="">
                            </div>
                            <div class="row">
                                <label>MAIL_HOST</label>
                                <input type="email" class="mb-10" wire:model="getsmtp.mailhost" value="">
                            </div>
                            <div class="row">
                                <label>MAIL_PORT</label>
                                <input type="email" class="mb-10" wire:model="getsmtp.mailport" value="">
                            </div>
                            <div class="row">
                                <label>MAIL_USERNAME</label>
                                <input type="email" class="mb-10" wire:model="getsmtp.mailusername" value="">
                            </div>
                            <div class="row">
                                <label>MAIL_PASSWORD</label>
                                <input type="email" class="mb-10" wire:model="getsmtp.mailpassword" value="">
                            </div>
                            {{-- <div class="row">
                                <label>MAIL_ENCRYPTION</label>
                                <input type="email" wire:model="getsmtp.mailformaddress" value="">
                            </div> --}}
                            <div class="row">
                                <label>MAIL_FROM_ADDRESS</label>
                                <input type="email" class="mb-10" wire:model="getsmtp.mailfrom_name" value="">
                            </div>
                            <div class="row">
                                <label>MAIL_FROM_NAME</label>
                                <input type="email" class="mb-10" wire:model="getsmtp.mailfrom_encypation" value="">
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </article>
    </section>
    <div wire:key="alert">

	    @if (session()->has('message'))

	    <div class="alert alert-success">

	       {{ session('message') }}

	    </div>

	    @endif

	</div>
    <section class=" admin-body-width" wire:ignore>
        <div class="page-bottom-btn flex-end columns eight">
            <button wire:click="updatestore" class="button">Save</button>
        </div>
    </section>
</x-admin-layout>
</div>