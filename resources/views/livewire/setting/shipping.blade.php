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
                <div class="page_header d-flex  align-item-center">
                    <a href="{{ route('settings') }}"> 
                        <button class="secondary icon-arrow-left mr-2">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2z"></path></svg>
                        </button>
                    </a>
                    <h4 class="mb-0 fw-5">Shipping and delivery</h4>
                </div>
            </div>
        </article>
    </section>
    <section class="full-width flex-wrap admin-body-width" wire:ignore>
        <article class="full-width">
            <div class="columns ten">
                <article class="full-width">
                    <div class="columns four pt-3 pr-3">
                        <h4 class="fs-15 fw-5 mb-16">Delivery methods at checkout</h4>
                        <p>Manage how customers receive their orders. Learn more about <a class="blue-color td-underline" href="#">delivery methods</a>.</p>
                    </div>                
                    <div class="columns eight">
                        <div class="card card-pd-0">
                            <div class="p-3">
                                <h3 class="fs-16 fw-6 mb-8">Shipping</h3>
                                <p class="mb-3">Choose where you ship and how much you charge for shipping at checkout. Learn more about <a class="blue-color td-underline" href="#">shipping rates.</a></p>
                                <h3 class="fs-12 fw-6 d-flex justify-content-space-between"><p class="lh-normal mb-0">GENERAL SHIPPING RATES <span class="fs-14 fw-4 flex-remove text-grey ta-left">All products</span> </p><a class=" fs-14 fw-4 blue-color td-underline" onclick="document.getElementById('manage-rates-modal').style.display='block'">Manage rates</a></h3>
                                <p class="mb-0">Rates for</p>
                                <p class="one-line-text-svg mb-0">
                                    <span><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M10 10c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm0-8C6.69 2 4 4.87 4 8.4c0 6 5.4 9.35 5.63 9.49.11.07.24.11.37.11s.26-.04.37-.11C10.6 17.75 16 14.4 16 8.4 16 4.87 13.31 2 10 2z"></path></svg> 3 locations</span>
                                    <span class="one-line-only-svg"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m17.707 9.293-5-5a.999.999 0 1 0-1.414 1.414L14.586 9H3a1 1 0 1 0 0 2h11.586l-3.293 3.293a.999.999 0 1 0 1.414 1.414l5-5a.999.999 0 0 0 0-1.414z"></path></svg></span>
                                    <span><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M12.347 15.521c.699-1.16 1.39-2.712 1.589-4.521h1.974a6.013 6.013 0 0 1-3.563 4.521zM4.09 11h1.975c.198 1.809.889 3.361 1.589 4.521A6.017 6.017 0 0 1 4.09 11zm3.564-6.521c-.7 1.16-1.391 2.712-1.59 4.521H4.09a6.017 6.017 0 0 1 3.564-4.521zM8.077 9c.269-1.916 1.239-3.52 1.925-4.443.687.92 1.655 2.519 1.922 4.443H8.077zm1.92 6.443c-.685-.919-1.653-2.519-1.921-4.443h3.847c-.27 1.916-1.24 3.521-1.925 4.443zM15.91 9h-1.974c-.198-1.809-.89-3.361-1.59-4.521A6.013 6.013 0 0 1 15.91 9zM10 2c-4.411 0-8 3.589-8 8s3.589 8 8 8c4.41 0 8-3.589 8-8s-3.59-8-8-8z"></path></svg> 3 zones</span>
                                </p>
                            </div>
                            <div class="card-middle card-grey-bg">
                                <h3 class="lh-normal mb-8 fw-6 fs-12 d-flex justify-content-space-between">CUSTOM SHIPPING RATES <a class="blue-color fs-14 fw-4" href="#">Create new profile</a></h3>
                                <p class="mb-0">Create a shipping profile to add custom rates or destination restrictions for groups of products. Learn more about <a class="blue-color td-underline" href="#">shipping profiles.</a></p>
                            </div>
                        </div>
                        
                        <div class="card card-pd-0 ">
                            <div class="p-3">
                                <h3 class="fs-16 fw-6 mb-8">Local delivery</h3>
                                <p class="mb-0">Deliver orders directly to local customers. Learn more about <a class="blue-color td-underline" href="#">local delivery.</a></p>
                            </div>
                            <div class="card-middle card-pd-0 bd_none lh-normal">
                                <h3 class="lh-normal fs-12 mb-0 fw-6 pl-3 pr-3">MANAGE DELIVERY BY LOCATION</h3>
                                <div class="ssd-local-delivery">
                                    <div class="ssd-local-delivery-icon">
                                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path fill-rule="evenodd" d="M18 8c0-4.42-3.58-8-8-8S2 3.58 2 8c0 .15 0 .29.01.44.13 3.55 1.99 7.62 7.13 11.29.51.36 1.21.36 1.72 0 5.14-3.67 7-7.74 7.13-11.29.01-.15.01-.29.01-.44zm-5.879 2.121a2.996 2.996 0 0 0 0-4.242 2.996 2.996 0 0 0-4.242 0 2.996 2.996 0 0 0 0 4.242 2.996 2.996 0 0 0 4.242 0z"></path></svg>
                                    </div>
                                    <div class="ssd-local-delivery-tittle">
                                        <h3 class="fs-14 fw-6 mb-0">Armada <span class="tag grey ">Doesn't offer delivery</span></h3>
                                        <p class="text-grey mb-0">Armada Society Road Hinjawadi Village Hinjawadi, 411057 Pune Maharashtra, India</p>
                                    </div>
                                    <a class="blue-color td-underline" href="#">Manage</a>
                                </div>
                                <div class="ssd-local-delivery">
                                    <div class="ssd-local-delivery-icon">
                                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path fill-rule="evenodd" d="M18 8c0-4.42-3.58-8-8-8S2 3.58 2 8c0 .15 0 .29.01.44.13 3.55 1.99 7.62 7.13 11.29.51.36 1.21.36 1.72 0 5.14-3.67 7-7.74 7.13-11.29.01-.15.01-.29.01-.44zm-5.879 2.121a2.996 2.996 0 0 0 0-4.242 2.996 2.996 0 0 0-4.242 0 2.996 2.996 0 0 0 0 4.242 2.996 2.996 0 0 0 4.242 0z"></path></svg>
                                    </div>
                                    <div class="ssd-local-delivery-tittle">
                                        <h3 class="fs-14 fw-6 mb-0">H-28, Sector 63 <span class="tag grey">Doesn't offer delivery</span></h3>
                                        <p class="text-grey mb-0">H-28, Sector 63, 201301 Noida Uttar Pradesh, India</p>
                                    </div>
                                    <a class="blue-color td-underline" href="#">Manage</a>
                                </div>
                                <div class="ssd-local-delivery">
                                    <div class="ssd-local-delivery-icon">
                                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path fill-rule="evenodd" d="M18 8c0-4.42-3.58-8-8-8S2 3.58 2 8c0 .15 0 .29.01.44.13 3.55 1.99 7.62 7.13 11.29.51.36 1.21.36 1.72 0 5.14-3.67 7-7.74 7.13-11.29.01-.15.01-.29.01-.44zm-5.879 2.121a2.996 2.996 0 0 0 0-4.242 2.996 2.996 0 0 0-4.242 0 2.996 2.996 0 0 0 0 4.242 2.996 2.996 0 0 0 4.242 0z"></path></svg>
                                    </div>
                                    <div class="ssd-local-delivery-tittle">
                                        <h3 class="fs-14 fw-6 mb-0">Rajkot <span class="tag grey">Doesn't offer delivery</span></h3>
                                        <p class="text-grey mb-0">Sadhu vasvani road, Avsar Vatika, 360004 Rajkot Gujarat, India</p>
                                    </div>
                                    <a class="blue-color td-underline" href="#">Manage</a>
                                </div>
                            </div>
                        </div>
                        <div class="card card-pd-0 ">
                            <div class="p-3">
                                <h3 class="fs-16 fw-6 mb-8">Local pickup</h3>
                                <p class="mb-0">Allow local customers to pick up their orders. Learn more about <a class="blue-color td-underline" href="#">local pickup.</a></p>
                            </div>
                            <div class="card-middle card-pd-0 bd_none lh-normal">
                                <h3 class="lh-normal fs-12 mb-0 fw-6 pl-3 pr-3">MANAGE PICKUP BY LOCATION</h3>
                                <div class="ssd-local-delivery">
                                    <div class="ssd-local-delivery-icon">
                                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path fill-rule="evenodd" d="M18 8c0-4.42-3.58-8-8-8S2 3.58 2 8c0 .15 0 .29.01.44.13 3.55 1.99 7.62 7.13 11.29.51.36 1.21.36 1.72 0 5.14-3.67 7-7.74 7.13-11.29.01-.15.01-.29.01-.44zm-5.879 2.121a2.996 2.996 0 0 0 0-4.242 2.996 2.996 0 0 0-4.242 0 2.996 2.996 0 0 0 0 4.242 2.996 2.996 0 0 0 4.242 0z"></path></svg>
                                    </div>
                                    <div class="ssd-local-delivery-tittle">
                                        <h3 class="fs-14 fw-6 mb-0">Armada <span class="tag grey ">Doesn't offer delivery</span></h3>
                                        <p class="text-grey mb-0">Armada Society Road Hinjawadi Village Hinjawadi, 411057 Pune Maharashtra, India</p>
                                    </div>
                                    <a class="blue-color td-underline" href="#">Manage</a>
                                </div>
                                <div class="ssd-local-delivery">
                                    <div class="ssd-local-delivery-icon">
                                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path fill-rule="evenodd" d="M18 8c0-4.42-3.58-8-8-8S2 3.58 2 8c0 .15 0 .29.01.44.13 3.55 1.99 7.62 7.13 11.29.51.36 1.21.36 1.72 0 5.14-3.67 7-7.74 7.13-11.29.01-.15.01-.29.01-.44zm-5.879 2.121a2.996 2.996 0 0 0 0-4.242 2.996 2.996 0 0 0-4.242 0 2.996 2.996 0 0 0 0 4.242 2.996 2.996 0 0 0 4.242 0z"></path></svg>
                                    </div>
                                    <div class="ssd-local-delivery-tittle">
                                        <h3 class="fs-14 fw-6 mb-0">H-28, Sector 63 <span class="tag grey">Doesn't offer delivery</span></h3>
                                        <p class="text-grey mb-0">H-28, Sector 63, 201301 Noida Uttar Pradesh, India</p>
                                    </div>
                                    <a class="blue-color td-underline" href="#">Manage</a>
                                </div>
                                <div class="ssd-local-delivery">
                                    <div class="ssd-local-delivery-icon">
                                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path fill-rule="evenodd" d="M18 8c0-4.42-3.58-8-8-8S2 3.58 2 8c0 .15 0 .29.01.44.13 3.55 1.99 7.62 7.13 11.29.51.36 1.21.36 1.72 0 5.14-3.67 7-7.74 7.13-11.29.01-.15.01-.29.01-.44zm-5.879 2.121a2.996 2.996 0 0 0 0-4.242 2.996 2.996 0 0 0-4.242 0 2.996 2.996 0 0 0 0 4.242 2.996 2.996 0 0 0 4.242 0z"></path></svg>
                                    </div>
                                    <div class="ssd-local-delivery-tittle">
                                        <h3 class="fs-14 fw-6 mb-0">Rajkot <span class="tag grey">Doesn't offer delivery</span></h3>
                                        <p class="text-grey mb-0">Sadhu vasvani road, Avsar Vatika, 360004 Rajkot Gujarat, India</p>
                                    </div>
                                    <a class="blue-color td-underline" href="#">Manage</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </article>
        <article class="full-width sec-border">
            <div class="columns ten">
                <article class="full-width">
                    <div class="columns four pt-3 pr-3">
                        <h4 class="fs-15 fw-5 mb-16">Packages</h4>
                        <p>The <a class="blue-color td-underline" href="#">package sizes</a> you use to ship your products.</p>
                    </div>                
                    <div class="columns eight">
                        <div class="card">
                            <h3 class="d-flex justify-content-space-between fs-16 fw-6">Saved packages <a class="blue-color fs-14 fw-4" href="#" onclick="document.getElementById('add-package-modal').style.display='block'">Add package</a></h3>
                            <div class="card-middle inner-card-pd bd_none ta-center card-grey-bg">
                                <p class="mb-8">Add saved packages to show accurate shipping rates at checkout</p>
                                <p class="text-grey mb-8">Until you add a package, Shopify will use a sample box to calculate shipping rates at checkout. <a class="blue-color td-underline" href="#">Learn more</a></p>
                                <button class="secondary button fw-6" onclick="document.getElementById('add-package-modal').style.display='block'">Add package</button>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </article>
        <article class="full-width sec-border">
            <div class="columns ten">
                <article class="full-width">
                    <div class="columns four pt-3 pr-3">
                        <h4 class="fs-15 fw-5 mb-16">Packing slips</h4>
                        <p>A printed list of items in a shipment that often goes inside a package.</p>
                    </div>                
                    <div class="columns eight">
                        <div class="card">
                            <h3 class="d-flex justify-content-space-between fs-16 fw-6">Packing slip template<a class="blue-color fs-14 fw-4" href="#">Edit</a></h3>
                            <p class="mb-0">Customize the packing slips you can print when you’re fulfilling orders.</p>
                        </div>
                    </div>
                </article>
            </div>
        </article>
        <article class="full-width sec-border">
            <div class="columns ten">
                <article class="full-width">
                    <div class="columns four pt-3 pr-3">
                        <h4 class="fs-15 fw-5 mb-16">Carrier accounts</h4>
                    </div>                
                    <div class="columns eight">
                        <div class="card">
                            <h3 class="d-flex justify-content-space-between fs-16 fw-6">Carrier accounts</h3>
                            <p class="mb-16">If you have an existing account with a shipping carrier, connect it to your store to use your own rates.</p>
                            <div class="fex">
                                <button class="fw-6 secondary" onclick="document.getElementById('manage-carriers-modal').style.display='block'">Connect carrier account</button>
                                <button class="link blue-color">Learn more</button>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </article>
        <article class="full-width sec-border">
            <div class="columns ten">
                <article class="full-width">
                    <div class="columns four pt-3 pr-3">
                        <h4 class="fs-15 fw-5 mb-16">Custom order fulfillment</h4>
                    </div>                
                    <div class="columns eight">
                        <div class="card">
                            <h3 class="d-flex justify-content-space-between fs-16 fw-6">Custom order fulfillment</h3>
                            <p class="mb-16">Add an email for a custom fulfillment service that fulfills orders for you.</p>
                            <div class="fex">
                                <button class="fw-6 secondary" onclick="document.getElementById('custom-fulfillment-service-modal').style.display='block'">Add fulfillment service</button>
                                <button class="link blue-color">Learn more</button>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </article>

    </section>

    <!--Manage rates modal-->
<div id="manage-rates-modal" class="customer-modal-main" wire:ignore>
   
    <div class="customer-modal-inner">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Manage Rate</h2>
                <span onclick="document.getElementById('manage-rates-modal').style.display='none'" class="modal-close-btn">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </span>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-field-list">
                        <label>Rate</label>
                        <input type="number" wire:model="charge.maxrate">
                    </div>
                    <span class="col-icon">></span>
                    <div class="form-field-list">
                        <label>Total Cart Value</label>
                        <input type="number" wire:model="charge.maxcharge">
                    </div>
                </div>
                <div class="row">
                    <div class="form-field-list">
                        <label>Rate</label>
                        <input type="number" wire:model="charge.minrate">
                    </div>
                    <span class="col-icon"><</span>
                    <div class="form-field-list">
                        <label>Total Cart Value</label>
                        <input type="number" wire:model="charge.mincharge">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="button secondary">Cancel</button>
                <button class="button" wire:ignore wire:click.prevent="UpdateShipping()">Save</button>
            </div>
        </div>
    </div>

</div>

<!--Add package modal -->
<div id="add-package-modal" class="customer-modal-main" wire:ignore>
    <div class="customer-modal-inner">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Add package</h2>
                <span onclick="document.getElementById('add-package-modal').style.display='none'" class="modal-close-btn">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </span>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="form-field-list">
                            <label>Package name</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field-list package-type-radio">
                            <label>Package type</label>
                            <label><input type="radio" name="option1a" checked="checked">Box</label>
                            <label><input type="radio" name="option1a">Envelope</label>
                            <label><input type="radio" name="option1a">Soft package or satchel</label>
                        </div>
                    </div>
                    <div class="row add-pack-option-row">
                        <div class="add-pack-option">
                            <div class="form-field-list">
                                <label>Length</label>
                                <input type="number" placeholder="L">
                            </div>
                            <div class="form-field-list">
                                <label>Width</label>
                                <input type="number" placeholder="W">
                            </div>
                            <div class="form-field-list">
                                <label>Height</label>
                                <input type="number" placeholder="H">
                            </div>
                            <div class="form-field-list">
                                <select>
                                    <option>cm</option>
                                    <option>in</option>
                                </select>
                            </div>
                        </div>
                        <div class="add-pack-option">
                            <label>Weight when empty (optional)</label>
                            <div class="add-pack-option-inner">
                                <div class="form-field-list">
                                    <input type="number" placeholder="0.5">
                                </div>
                                <div class="form-field-list">
                                    <select>
                                        <option>g</option>
                                        <option>kg</option>
                                        <option>oz</option>
                                        <option>lb</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-body disabled-checkbox-row">
                <div class="row">
                    <label><input type="checkbox" name="option2a" checked="checked" disabled="disabled">Use this package to calculate rates at checkout</label>
                </div>
            </div>
            <div class="modal-footer">
                <button class="button secondary">Cancel</button>
                <button class="button secondary" disabled="disabled">Add package</button>
            </div>
        </div>
    </div>
</div>

<!--Manage carriers modal -->
<div id="manage-carriers-modal" class="customer-modal-main">
    <div class="customer-modal-inner">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Manage carriers</h2>
                <span onclick="document.getElementById('manage-carriers-modal').style.display='none'" class="modal-close-btn">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </span>
            </div>
            <div class="modal-body card-pd-0">
                <div class="manage-carriers-list p-3">
                    <img src="https://cdn.shopify.com/shopifycloud/web/assets/v1/309e0ad9c8b16b8a3d298966441b62c7.svg">
                    <div class="manage-carriers-title">
                        <h3 class="fw-6 fs-16 mb-8 lh-normal">FedEx</h3>
                        <p class="mb-0">You need a FedEx account</p>
                    </div>
                    <button class="button green-btn" onclick="document.getElementById('connect-fedex-modal').style.display='block'">Connect account</button>
                </div>
                <div class="manage-carriers-list p-3">
                    <img src="https://cdn.shopify.com/shopifycloud/web/assets/v1/1baf01c612c99a1c1aea19beea3b1bb2.svg">
                    <div class="manage-carriers-title">
                        <h3 class="fw-6 fs-16 mb-8 lh-normal">UPS®</h3>
                        <p class="mb-0">You need a UPS® account</p>
                    </div>
                    <button class="button green-btn" onclick="document.getElementById('ups-account-modal').style.display='block'">Connect account</button>
                </div>
            </div>
            <div class="modal-footer">
                <button class="button secondary">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!--Connect Fedex modal-->
<div id="connect-fedex-modal" class="customer-modal-main">
    <div class="customer-modal-inner">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Connect Fedex</h2>
                <span onclick="document.getElementById('connect-fedex-modal').style.display='none'" class="modal-close-btn">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </span>
            </div>
            <div class="modal-body card-pd-0">
                <div class="alert-notice-msg mt-8 connect-fedex-alert">
                    <p><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path fill-rule="evenodd" d="M10 20c5.514 0 10-4.486 10-10S15.514 0 10 0 0 4.486 0 10s4.486 10 10 10zm1-6a1 1 0 1 1-2 0v-4a1 1 0 1 1 2 0v4zm-1-9a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path></svg> Remember to add carrier calculated rates in the zone where you wish to ship using your FedEx account rates.</p>
                </div>
                <div class="manage-carriers-list p-3">
                    <img src="https://cdn.shopify.com/shopifycloud/web/assets/v1/309e0ad9c8b16b8a3d298966441b62c7.svg">
                    <div class="manage-carriers-title">
                        <h3 class="fw-6 fs-16 mb-8 lh-normal">FedEx</h3>
                    </div>
                </div>
                <form class="p-3 row-m-0">
                    <div class="row">
                        <div class="form-field-list">
                            <label>Production meter number</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field-list">
                            <label>Authentication key</label>
                            <input type="text">
                        </div>
                        <div class="form-field-list">
                            <label>Production password</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field-list">
                            <label>Account number</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="row row-m-0">
                        <a class="arrow-with-link" href="#">Need help setting up your account? <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14 13v1a1 1 0 0 1-1 1H6c-.575 0-1-.484-1-1V7a1 1 0 0 1 1-1h1c1.037 0 1.04 1.5 0 1.5-.178.005-.353 0-.5 0v6h6V13c0-1 1.5-1 1.5 0zm-3.75-7.25A.75.75 0 0 1 11 5h4v4a.75.75 0 0 1-1.5 0V7.56l-3.22 3.22a.75.75 0 1 1-1.06-1.06l3.22-3.22H11a.75.75 0 0 1-.75-.75z"></path></svg></a>
                    </div>
                </form>
                <div class="disabled-checkbox-row p-3 ta-left">
                    <div class="row row-m-0">
                        <div class="form-field-list row-ml-0">
                            <label>Fedex SmartPost hub ID (optional)</label>
                            <input type="text" placeholder="1234">
                            <p class="mb-0">Adding your ID will show your negotiated SmartPost rates at checkout.</p>
                        </div>
                    </div>
                </div>
                <div class="disabled-checkbox-row p-3 ta-left">
                    <div class="row row-m-0">
                        <label><input type="checkbox" name="option2a" checked="checked" disabled="disabled">Offer Saturday delivery (if available)</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="button secondary">Back</button>
                <button class="button secondary" disabled="disabled">Save</button>
            </div>
        </div>
    </div>
</div>

<!--Connect your UPS® account modal-->
<div id="ups-account-modal" class="customer-modal-main">
    <div class="customer-modal-inner">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Connect your UPS® account</h2>
                <span onclick="document.getElementById('ups-account-modal').style.display='none'" class="modal-close-btn">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </span>
            </div>
            <div class="modal-body">
                <p class="ta-left black-color">To connect your UPS account, you will need your account/shipper number. You may need details from a recent invoice to verify your account.</p>
            </div>
            <div class="modal-footer justify-content-space-between">
                <div class="button-col d-flex align-center">
                    <p class="mb-0 black-color">Learn more about <a class="arrow-with-link" href="#">connecting a UPS account.<svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14 13v1a1 1 0 0 1-1 1H6c-.575 0-1-.484-1-1V7a1 1 0 0 1 1-1h1c1.037 0 1.04 1.5 0 1.5-.178.005-.353 0-.5 0v6h6V13c0-1 1.5-1 1.5 0zm-3.75-7.25A.75.75 0 0 1 11 5h4v4a.75.75 0 0 1-1.5 0V7.56l-3.22 3.22a.75.75 0 1 1-1.06-1.06l3.22-3.22H11a.75.75 0 0 1-.75-.75z"></path></svg></a></p>
                </div>
                <div class="button-col">
                    <button class="button secondary">Cancel</button>
                    <button class="button green-btn">Start</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Add custom fulfillment service modal-->
<div id="custom-fulfillment-service-modal" class="customer-modal-main">
    <div class="customer-modal-inner">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Add custom fulfillment service</h2>
                <span onclick="document.getElementById('custom-fulfillment-service-modal').style.display='none'" class="modal-close-btn">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </span>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-field-list">
                        <label>Name</label>
                        <input type="text">
                    </div>
                    <div class="form-field-list">
                        <label>Email</label>
                        <input type="text">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="button secondary">Cancel</button>
                <button class="button" disabled="disabled">Save</button>
            </div>
        </div>
    </div>
</div>


</x-admin-layout>

</div>



