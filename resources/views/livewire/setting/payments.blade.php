<div>
<x-admin-layout>
     <div wire:key="alert">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <section class="full-width flex-wrap admin-body-width">
        <article class="full-width">
            <div class="columns">
                <div class="page_header d-flex  align-item-center mb-3">
                    <a href="{{ route('settings') }}">
                        <button class="secondary icon-arrow-left mr-2">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2z"></path></svg>
                        </button>
                    </a>
                    <h4 class="mb-0 fw-5">Payments</h4>
                </div>
            </div>
        </article>
    </section>
    <section class="full-width flex-wrap admin-body-width setting-store-lang-sec">
        <article class="full-width sec-border">
            <div class="columns one-third">
                <div class="card card-transparent-bg">
                    <div class="card-title">
                        <h3 class="fs-16 fw-6 mb-0">Mollie Detail</h3>
                    </div>
                    <!-- <p class="mb-0 text-grey">After a customer's payment method is authorized, it needs to be captured so that the sale can be processed. Choose between
                    <a class="arrow-with-link" href="#">automatic and manual capture <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14 13v1a1 1 0 0 1-1 1H6c-.575 0-1-.484-1-1V7a1 1 0 0 1 1-1h1c1.037 0 1.04 1.5 0 1.5-.178.005-.353 0-.5 0v6h6V13c0-1 1.5-1 1.5 0zm-3.75-7.25A.75.75 0 0 1 11 5h4v4a.75.75 0 0 1-1.5 0V7.56l-3.22 3.22a.75.75 0 1 1-1.06-1.06l3.22-3.22H11a.75.75 0 0 1-.75-.75z"></path></svg></a></p> --> 
                </div>
            </div>
            <div class="columns two-thirds setting-order-card">
                <div class="card">
                    <div class="setting-single-col">
                        <label>
                            <span class="fw-6">Api key</span>
                            <input id="mollie_api_key" class="block mt-1 w-full" type="text" wire:model="mollie_api_key" />
                            @error('mollie_api_key') <span class="text-danger">{{ $message }}</span>@enderror 
                        </label>
                        <label>
                            <span class="fw-6">Currency</span>
                            <input id="currency" class="block mt-1 w-full" type="text" wire:model="currency" />
                            @error('currency') <span class="text-danger">{{ $message }}</span>@enderror 
                        </label>
                        <label>
                            <span class="fw-6">Redirect Url</span>
                            <input id="redirectUrl" class="block mt-1 w-full" type="text" wire:model="redirectUrl" />
                            @error('redirectUrl') <span class="text-danger">{{ $message }}</span>@enderror 
                        </label>
                        <label>
                            <span class="fw-6">Webhook Url</span>
                            <input id="webhookUrl" class="block mt-1 w-full" type="text" wire:model="webhookUrl" />
                            @error('webhookUrl') <span class="text-danger">{{ $message }}</span>@enderror 
                        </label>
                       
                    </div>

                    <!-- <div class="setting-single-col">
                         <label><span class="fw-6">Stripe Secret key</span>
                                            <input id="stripe_secret_key" class="block mt-1 w-full" type="text" wire:model="stripe_secret_key" />
                                            @error('stripe_secret_key') <span class="text-danger">{{ $message }}</span>@enderror
                                        </label>
                    </div> -->
                </div>
            </div>
        </article>
        <!-- <article class="full-width sp-alert-msg">
            <div class="payments-paypal-card">
                <div class="alert-notice-msg">
                    <p class="fw-6 fs-16 mb-0"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path fill-rule="evenodd" d="M10 20c5.514 0 10-4.486 10-10S15.514 0 10 0 0 4.486 0 10s4.486 10 10 10zm1-6a1 1 0 1 1-2 0v-4a1 1 0 1 1 2 0v4zm-1-9a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path></svg> Development stores can only process test payments</p>
                    <p>Activate the <a href="#">test payment provider,</a> or set your payment provider to test mode. Learn more about <a href="#">testing in development stores.</a></p>
                </div>
            </div>
        </article>
        <article class="full-width">
            <div class="columns one-third">
                <div class="card card-transparent-bg pl-0">
                    <div class="card-title">
                        <h3 class="fs-16 fw-6 mb-0">Payment providers</h3>
                    </div>
                    <p class="text-grey">Accept <a href="#" class="arrow-with-link">payments <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14 13v1a1 1 0 0 1-1 1H6c-.575 0-1-.484-1-1V7a1 1 0 0 1 1-1h1c1.037 0 1.04 1.5 0 1.5-.178.005-.353 0-.5 0v6h6V13c0-1 1.5-1 1.5 0zm-3.75-7.25A.75.75 0 0 1 11 5h4v4a.75.75 0 0 1-1.5 0V7.56l-3.22 3.22a.75.75 0 1 1-1.06-1.06l3.22-3.22H11a.75.75 0 0 1-.75-.75z"></path></svg></a>on your store using third-party providers such as PayPal or other payment methods.</p>
                    <p class="text-grey">Your store accepts payments with:<span class="fw-6">(for testing) Bogus Gateway, Cash on Delivery (COD),</span>and <span class="fw-6">All popular payment methods | Paysera.</span></p>
                </div>
            </div>
            <div class="columns two-thirds right-details">
                <div class="card payments-paypal-card">
                    <div class="p-3">
                        <img src="https://cdn.shopify.com/shopifycloud/web/assets/v1/d51d907b39ad5a2baa9adfe0a26fc1f8.svg">
                        <div class="header-title">
                            <h3 class="fs-16 fw-6 mb-0">Express Checkout</h3>
                        </div>
                        <div class="alert-notice-msg">
                            <p><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path fill-rule="evenodd" d="M10 20c5.514 0 10-4.486 10-10S15.514 0 10 0 0 4.486 0 10s4.486 10 10 10zm1-6a1 1 0 1 1-2 0v-4a1 1 0 1 1 2 0v4zm-1-9a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path></svg> PayPal Express Checkout is available only for international / cross border payments, i.e. for non-INR currency transactions.</p>
                        </div>
                        <p>A button that enables customers to use PayPal directly from your checkout. Learn more about <a class="arrow-with-link" href="#">PayPal Express Checkout <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14 13v1a1 1 0 0 1-1 1H6c-.575 0-1-.484-1-1V7a1 1 0 0 1 1-1h1c1.037 0 1.04 1.5 0 1.5-.178.005-.353 0-.5 0v6h6V13c0-1 1.5-1 1.5 0zm-3.75-7.25A.75.75 0 0 1 11 5h4v4a.75.75 0 0 1-1.5 0V7.56l-3.22 3.22a.75.75 0 1 1-1.06-1.06l3.22-3.22H11a.75.75 0 0 1-.75-.75z"></path></svg></a></p>
                        <p>Receive payments in foreign currencies with PayPal.<a class="arrow-with-link" href="#">Learn more <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14 13v1a1 1 0 0 1-1 1H6c-.575 0-1-.484-1-1V7a1 1 0 0 1 1-1h1c1.037 0 1.04 1.5 0 1.5-.178.005-.353 0-.5 0v6h6V13c0-1 1.5-1 1.5 0zm-3.75-7.25A.75.75 0 0 1 11 5h4v4a.75.75 0 0 1-1.5 0V7.56l-3.22 3.22a.75.75 0 1 1-1.06-1.06l3.22-3.22H11a.75.75 0 0 1-.75-.75z"></path></svg></a></p>
                        <button class="secondary">Activate PayPal Express Checkout</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="header-title">
                            <h3 class="fs-16 fw-6 mb-0">(for testing) Bogus Gateway</h3>
                            <button class="link">Manage</button>
                        </div>
                        <h3 class="fs-16 fw-6 mb-0">Credit card rate</h3>
                        <p><a class="blue-color td-underline" href="#">Set by (for testing) Bogus Gateway</a></p>
                        <button class="secondary fw-6 button-right">Choose another provider</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="header-title">
                            <h3 class="fs-16 fw-6 mb-0">Alternative payment methodsy</h3>
                        </div>
                        <p>External payment methods that can be used in addition to either a third-party provider or Shopify Payments.</p>
                        <button class="secondary fw-6 button-right">Choose alternative payment</button>
                    </div>
                    <div class="card-middle">
                        <div class="header-title row-m-0 ">
                            <h3 class="fs-16 fw-6 mb-0">All popular payment methods | Paysera is active</h3>
                            <button class="secondary fw-6">Edit</button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="header-title">
                            <h3 class="fs-16 fw-6 mb-0">Manual payment methods</h3>
                        </div>
                        <p>Payments that are processed outside your online store. When a customer makes a manual payment, you need to approve their order before fulfilling.</p>
                        <div class="manual-payment-methods-btn">
                            <button class="secondary fw-6 button-right">Manual payment methods</button>
                            <ul class="variants-option-dropdown">
                                <li><button class="link" onclick="document.getElementById('manual-payment-method-modal').style.display='block'">Create custom payment method</button></li>
                                <li><button class="link" onclick="document.getElementById('bank-deposit-method-modal').style.display='block'">Bank Deposit</button></li>
                                <li><button class="link" onclick="document.getElementById('money-order-method-modal').style.display='block'">Bank Deposit</button></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-middle">
                        <div class="header-title row-m-0 ">
                            <h3 class="fs-16 fw-6 mb-0">Cash on Delivery (COD) is active</h3>
                            <button class="secondary fw-6" onclick="document.getElementById('cod-modal').style.display='block'">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <article class="full-width sec-border">
            <div class="columns one-third">
                <div class="card card-transparent-bg">
                    <div class="card-title">
                        <h3 class="fs-16 fw-6 mb-0">Payment capture</h3>
                    </div>
                    <p class="mb-0 text-grey">After a customer's payment method is authorized, it needs to be captured so that the sale can be processed. Choose between
                    <a class="arrow-with-link" href="#">automatic and manual capture <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14 13v1a1 1 0 0 1-1 1H6c-.575 0-1-.484-1-1V7a1 1 0 0 1 1-1h1c1.037 0 1.04 1.5 0 1.5-.178.005-.353 0-.5 0v6h6V13c0-1 1.5-1 1.5 0zm-3.75-7.25A.75.75 0 0 1 11 5h4v4a.75.75 0 0 1-1.5 0V7.56l-3.22 3.22a.75.75 0 1 1-1.06-1.06l3.22-3.22H11a.75.75 0 0 1-.75-.75z"></path></svg></a></p> 
                </div>
            </div>
            <div class="columns two-thirds setting-order-card">
                <div class="card">
                    <div class="setting-single-col">
                        <label><input type="radio" name="option1a" checked="checked"><span class="fw-6">Automatically</span> capture payment for orders.</label>
                        <p class="text-grey">The customer’s payment method is authorized and charged automatically.</p>
                    </div>
                    <div class="setting-single-col">
                        <label><input type="radio" name="option1a" checked="checked"><span class="fw-6">Manually</span> capture payment for orders.</label>
                        <p class="text-grey">The customer’s payment method is authorized at the time of their order. You’ll need to manually capture payment within the authorization period.</p>
                    </div>
                </div>
            </div>
        </article>
        <article class="full-width sec-border">
            <div class="columns one-third">
                <div class="card card-transparent-bg">
                    <div class="card-title">
                        <h3 class="fs-16 fw-6 mb-0">Stripe Detail</h3>
                    </div>
                    <p class="mb-0 text-grey">After a customer's payment method is authorized, it needs to be captured so that the sale can be processed. Choose between
                    <a class="arrow-with-link" href="#">automatic and manual capture <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14 13v1a1 1 0 0 1-1 1H6c-.575 0-1-.484-1-1V7a1 1 0 0 1 1-1h1c1.037 0 1.04 1.5 0 1.5-.178.005-.353 0-.5 0v6h6V13c0-1 1.5-1 1.5 0zm-3.75-7.25A.75.75 0 0 1 11 5h4v4a.75.75 0 0 1-1.5 0V7.56l-3.22 3.22a.75.75 0 1 1-1.06-1.06l3.22-3.22H11a.75.75 0 0 1-.75-.75z"></path></svg></a></p> 
                </div>
            </div>
            <div class="columns two-thirds setting-order-card">
                <div class="card">
                    <div class="setting-single-col">
                         <label><span class="fw-6">Stripe Publishable key</span>
                                            <input id="stripe_publishable_key" class="block mt-1 w-full" type="text" wire:model="stripe_publishable_key" />
                                            @error('stripe_publishable_key') <span class="text-danger">{{ $message }}</span>@enderror 
                                        </label>
                       
                    </div>
                    <div class="setting-single-col">
                         <label><span class="fw-6">Stripe Secret key</span>
                                            <input id="stripe_secret_key" class="block mt-1 w-full" type="text" wire:model="stripe_secret_key" />
                                            @error('stripe_secret_key') <span class="text-danger">{{ $message }}</span>@enderror
                                        </label>
                    </div>
                </div>
            </div>
        </article> -->
    </section>
    <section class="full-width flex-wrap admin-body-width create-collection-footer">
        <div class="page-bottom-btn">
            <button  wire:click="save" class="button">Save</button>
        </div>
    </section>
</x-admin-layout>

<!--Set up manual payment method modal start-->
<!-- <div id="manual-payment-method-modal" class="customer-modal-main">
    <div class="customer-modal-inner">
        <input type="hidden" wire:model="customer.id" value="">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Set up manual payment method</h2>
                <span onclick="document.getElementById('manual-payment-method-modal').style.display='none'" class="modal-close-btn">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </span>
            </div>
            <div class="modal-body">
                <div class="row row-ml-0">
                    <label>Custom payment method name</label>
                    <input type="text">
                </div>
                <div class="row row-ml-0">
                    <label>Additional details</label>
                    <textarea class="modal-textarea lbl-mb-4"></textarea>
                    <p class="mb-0">Displays to customers when they’re choosing a payment method.</p>
                </div>
                <div class="row row-ml-0">
                    <label>Payment instructions</label>
                    <textarea class="modal-textarea lbl-mb-4"></textarea>
                    <p class="mb-0">Displays to customers after they place an order with this payment method.</p>
                </div>
            </div>
            <div class="modal-footer">
                <button class="button secondary">Cancel</button>
                <button class="button green-btn">Activate</button>
            </div>
        </div>
    </div>
</div> -->
<!--Set up manual payment method modal end-->

<!--Set up Bank Deposit modal start-->
<!-- <div id="bank-deposit-method-modal" class="customer-modal-main">
    <div class="customer-modal-inner">
        <input type="hidden" wire:model="customer.id" value="">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Set up Bank Deposit</h2>
                <span onclick="document.getElementById('bank-deposit-method-modal').style.display='none'" class="modal-close-btn">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </span>
            </div>
            <div class="modal-body">
                <div class="row row-ml-0">
                    <label>Additional details</label>
                    <textarea class="modal-textarea lbl-mb-4"></textarea>
                    <p class="mb-0">Displays to customers when they’re choosing a payment method.</p>
                </div>
                <div class="row row-ml-0">
                    <label>Payment instructions</label>
                    <textarea class="modal-textarea lbl-mb-4"></textarea>
                    <p class="mb-0">Displays to customers after they place an order with this payment method.</p>
                </div>
            </div>
            <div class="modal-footer">
                <button class="button secondary">Cancel</button>
                <button class="button green-btn">Activate Bank Deposit</button>
            </div>
        </div>
    </div>
</div> -->
<!--Set up Bank Deposit modal end-->

<!--Set up Money Order modal start-->
<!-- <div id="money-order-method-modal" class="customer-modal-main">
    <div class="customer-modal-inner">
        <input type="hidden" wire:model="customer.id" value="">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Set up Money Order</h2>
                <span onclick="document.getElementById('money-order-method-modal').style.display='none'" class="modal-close-btn">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </span>
            </div>
            <div class="modal-body">
                <div class="row row-ml-0">
                    <label>Additional details</label>
                    <textarea class="modal-textarea lbl-mb-4"></textarea>
                    <p class="mb-0">Displays to customers when they’re choosing a payment method.</p>
                </div>
                <div class="row row-ml-0">
                    <label>Payment instructions</label>
                    <textarea class="modal-textarea lbl-mb-4"></textarea>
                    <p class="mb-0">Displays to customers after they place an order with this payment method.</p>
                </div>
            </div>
            <div class="modal-footer">
                <button class="button secondary">Cancel</button>
                <button class="button green-btn">Activate Money Order</button>
            </div>
        </div>
    </div>
</div> -->
<!--Set up Money Order modal end-->

<!--Set up Money Order modal start-->
<!-- <div id="cod-modal" class="customer-modal-main">
    <div class="customer-modal-inner">
        <input type="hidden" wire:model="customer.id" value="">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Edit Cash on Delivery (COD)</h2>
                <span onclick="document.getElementById('cod-modal').style.display='none'" class="modal-close-btn">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </span>
            </div>
            <div class="modal-body">
                <div class="row row-ml-0">
                    <label>Additional details</label>
                    <textarea class="modal-textarea lbl-mb-4"></textarea>
                    <p class="mb-0">Displays to customers when they’re choosing a payment method.</p>
                </div>
                <div class="row row-ml-0">
                    <label>Payment instructions</label>
                    <textarea class="modal-textarea lbl-mb-4"></textarea>
                    <p class="mb-0">Displays to customers after they place an order with this payment method.</p>
                </div>
            </div>
            <div class="modal-footer">
                <div class="button-col">
                    <button class="button warning">Deactivate Cash on Delivery (COD)</button>
                </div>
                <div class="button-col">
                    <button class="button secondary">Cancel</button>
                    <button class="button secondary" disabled="disabled">Save</button>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!--Set up Money Order modal end-->


<!-- <script>
    $('.manual-payment-methods-btn .button-right').click(function(){
        $('.variants-option-dropdown').toggle();
    });
</script> -->
</div>
