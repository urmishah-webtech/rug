<div>
<x-admin-layout>
    <div wire:key="alert">

     @if (session()->has('message'))

     <div class="alert alert-success">

        {{ session('message') }}

     </div>

     @endif

    </div>
	<div class="columns four pt-3 pr-3">
	   <h4 class="fs-15 fw-5 mb-16">MAIL Details</h4>
	</div>  
    <section class="full-width flex-wrap admin-body-width setting-general-sec" wire:ignore>
        <article class="full-width">
            <div class="columns ten">
                <article class="full-width add-customer-part bd_none">
              
                    <div class="columns eight">
                        <div class="card">
                            <div class="row">
                                <label>MAIL_MAILER</label>
                                <input type="text" wire:model="getgeneral.store_name" value="delivery-boy-demo">
                            </div>
                            <div class="row">
                                <label>MAIL_HOST</label>
                                <input type="email" wire:model="getgeneral.contact_email" value="shopifydev@webkul.com">
                            </div>
                            <div class="row">
                                <label>MAIL_PORT</label>
                                <input type="email" wire:model="getgeneral.contact_email" value="shopifydev@webkul.com">
                            </div>
                            <div class="row">
                                <label>MAIL_USERNAME</label>
                                <input type="email" wire:model="getgeneral.contact_email" value="shopifydev@webkul.com">
                            </div>
                            <div class="row">
                                <label>MAIL_PASSWORD</label>
                                <input type="email" wire:model="getgeneral.contact_email" value="shopifydev@webkul.com">
                            </div>
                            <div class="row">
                                <label>MAIL_ENCRYPTION</label>
                                <input type="email" wire:model="getgeneral.contact_email" value="shopifydev@webkul.com">
                            </div>
                            <div class="row">
                                <label>MAIL_FROM_ADDRESS</label>
                                <input type="email" wire:model="getgeneral.contact_email" value="shopifydev@webkul.com">
                            </div>
                            <div class="row">
                                <label>MAIL_FROM_NAME</label>
                                <input type="email" wire:model="getgeneral.contact_email" value="shopifydev@webkul.com">
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </article>
    </section>
    <section class="full-width flex-wrap admin-body-width" wire:ignore>
        <div class="page-bottom-btn flex-end">
            <button wire:click="updatestore" class="button">Save</button>
        </div>
    </section>
</x-admin-layout>
</div>