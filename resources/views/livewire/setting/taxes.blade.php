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
                <div class="page_header justify-content-space-between d-flex align-item-center">
                    <div class="d-flex align-center">
                        <a href="{{ route('settings') }}">
                            <button class="secondary icon-arrow-left mr-2">
                                <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2z"></path></svg>
                            </button>
                        </a>
                        <h4 class="mb-0 fw-5">Taxes</h4>
                        <li><a class="link texaxcustom" onclick="document.getElementById('add-taxes').style.display='block'">Add country</a></li>
                    </div>
                </div>
            </div>
        </article>
    </section>

        <!-- Price Modal -->
    <div id="add-taxes" class="customer-modal-main variants-edit-option-modal" wire:ignore>
        <div class="customer-modal-inner">
            <div class="customer-modal">
                <div class="modal-header">
                    <h2>Add Country</h2>
                    <span onclick="document.getElementById('add-taxes').style.display='none'" class="modal-close-btn"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></span>
                </div>
                <div class="modal-body">
                    <div class="row side-elements align-item-bt">
                        <div class="form-field-list">
                            <label>Country Name</label>
                                <input type="text" id="country_name" wire:model="country_name" class="apply-price" value="">

                            <label>Rate</label>
                                <input type="text" id="rate" wire:model="rate" class="apply-price" value="">
                        </div> 
                    </div>
         
                </div>
                <div class="modal-footer">
                    <a onclick="document.getElementById('add-taxes').style.display='none'" class="button secondary">Cancel</a>
                    <a class="button green-btn child-price-submit" onclick="document.getElementById('add-taxes').style.display='none'"  data-recordid="" wire:click.prevent="AddCountryRecord()">Done</a>
                </div>
            </div>
        </div>
    </div>
    <section class="full-width flex-wrap admin-body-width setting-taxes-sec" wire:ignore>
        <article class="full-width">
            <div class="columns ten">
                <article class="full-width">
             <!--        <div class="columns four pt-3 pr-3">
                        <h4 class="fs-15 fw-5 mb-16">Tax regions</h4>
                        <p>Manage how your store charges sales tax in your <a class="blue-color td-underline" href="#">shipping profiles.</a> Check with a tax expert to understand your tax obligations.</p>
                        <p class="text-grey">Learn more about <a class="arrow-with-link" href="#"> taxes<svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14 13v1a1 1 0 0 1-1 1H6c-.575 0-1-.484-1-1V7a1 1 0 0 1 1-1h1c1.037 0 1.04 1.5 0 1.5-.178.005-.353 0-.5 0v6h6V13c0-1 1.5-1 1.5 0zm-3.75-7.25A.75.75 0 0 1 11 5h4v4a.75.75 0 0 1-1.5 0V7.56l-3.22 3.22a.75.75 0 1 1-1.06-1.06l3.22-3.22H11a.75.75 0 0 1-.75-.75z"></path></svg></a></p>
                    </div>   -->              
                    <div class="columns eight">
                        <div class="card card-pd-0">
                            <!-- <div class="sales-channels-list">
                                <div class="sales-channels-list-img">
                                    <img src="https://cdn.shopify.com/shopifycloud/web/assets/v1/66577c2a4fe59fc12c239107ca77025c.svg">
                                </div>
                                <div class="sales-channels-title">
                                    <h3 class="fs-14 fw-4 mb-0">European Union</h3>    
                                </div>
                                <div class="sales-channels-btn-grp">
                                    <span class="tag taxes-tag yellow"><span class="half-circle"></span>Collecting</span>
                                    <button class="secondary fw-6">Manage</button>
                                </div>
                            </div> -->
                             @foreach($taxes as $key => $row)
                            <div class="sales-channels-list" wire:ignore>
                               <!--  <div class="sales-channels-list-img">
                                    <img src="https://cdn.shopify.com/shopifycloud/web/assets/v1/1ae10ee3926d9bbebd5cd1fec685e91a.svg">
                                </div>
                                -->
                                <div class="sales-channels-title">
                                    <h3 class="fs-14 fw-4 mb-0">{{$row->country_name}}</h3>    
                                </div>
                                <form class="mb-0 ml-auto" enctype="multipart/form-data" wire:ignore>
                                    @csrf
                                    <div class="sales-channels-btn-grp row side-elements mb-0">
                                        <!-- <span class="tag taxes-tag blue">Collecting</span> -->
                                        <input type="text" wire:model="taxes.{{ $key }}.rate">
                                      
                                    </div>
                                </form>
                             
                            </div>
                            @endforeach
                             <button class="fw-6 button secondary" wire:ignore wire:click.prevent="taxStore({{$submit->id}})">Save</button>
                       <!--      <div class="sales-channels-list">
                                <div class="sales-channels-list-img">
                                    <img src="http://127.0.0.1:8000/assets/images/Flag_of_the_Netherlands.png">
                                </div>
                                <div class="sales-channels-title">
                                    <h3 class="fs-14 fw-4 mb-0">Netherlands</h3>    
                                </div>
                                <div class="sales-channels-btn-grp">
                                    <span class="tag taxes-tag yellow">collecting</span>
                                    <button class="secondary fw-6">Manage</button>
                                </div>
                            </div>
                            <div class="sales-channels-list">
                                <div class="sales-channels-list-img">
                                    <img src="http://127.0.0.1:8000/assets/images/belgium.png">
                                </div>
                                <div class="sales-channels-title">
                                    <h3 class="fs-14 fw-4 mb-0">Belgium</h3>    
                                </div>
                                <div class="sales-channels-btn-grp">
                                    <span class="tag taxes-tag blue">collecting</span>
                                    <button class="secondary fw-6">Set up</button>
                                </div>
                            </div>
                            <div class="sales-channels-list">
                                <div class="sales-channels-list-img">
                                    <img src="https://cdn.shopify.com/shopifycloud/web/assets/v1/e3ecd16972ae5480aa8bbb8e30a5abaa.svg">
                                </div>
                                <div class="sales-channels-title">
                                    <h3 class="fs-14 fw-4 mb-0">Rest of world</h3>    
                                </div>
                                <div class="sales-channels-btn-grp">
                                    <span class="tag taxes-tag grey">Not collecting</span>
                                    <button class="secondary fw-6">Set up</button>
                                </div>
                            </div>
                            <div class="sales-channels-btn-grp card-grey-bg p-3">
                                <p class="mb-0">These regions are from your <a class="blue-color td-underline" href="#">shipping profiles.</a> To add a region, edit your shipping settings.</p>
                            </div> -->
                        </div>
                    </div>
                </article>
            </div>
        </article>
       <!--  <article class="full-width sec-border">
            <div class="columns ten">
                <article class="full-width">
                    <div class="columns four pt-3 pr-3">
                        <h4 class="fs-15 fw-5 mb-16">Tax calculations</h4>
                        <p>Manage how your store calculates and shows tax on your store.</p>
                        <p>To see what you’ve collected <a class="blue-color td-underline" href="#">view your tax report.</a></p>
                    </div>                
                    <div class="columns eight">
                        <div class="card card-padding0">
                            <div class="card-middle bd-border-none">
                                <div class="row mb-0 settings-checkout-checkbox-list">
                                    <label class="d-flex"><input type="checkbox" name="option2a" checked="checked">All prices include tax</label>
                                    <p class="text-grey mb-0">Taxes charged on shipping rates are included in the shipping price.</p>
                                </div>
                            </div>
                            <div class="card-middle bd-border-none">
                                <div class="row mb-0 settings-checkout-checkbox-list">
                                    <label class="d-flex"><input type="checkbox" name="option2a" checked="checked">Include or exclude tax based on your customer's country</label>
                                    <p class="text-grey mb-0">Your customer's local tax rate will be used for calculations. <a class="arrow-with-link" href="#">Learn more <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14 13v1a1 1 0 0 1-1 1H6c-.575 0-1-.484-1-1V7a1 1 0 0 1 1-1h1c1.037 0 1.04 1.5 0 1.5-.178.005-.353 0-.5 0v6h6V13c0-1 1.5-1 1.5 0zm-3.75-7.25A.75.75 0 0 1 11 5h4v4a.75.75 0 0 1-1.5 0V7.56l-3.22 3.22a.75.75 0 1 1-1.06-1.06l3.22-3.22H11a.75.75 0 0 1-.75-.75z"></path></svg></a></p>
                                </div>
                            </div>
                            <div class="card-middle bd-border-none">
                                <div class="row mb-0 settings-checkout-checkbox-list">
                                    <label class="d-flex"><input type="checkbox" name="option2a" checked="checked">Charge tax on shipping rates</label>
                                    <p class="text-grey mb-0">Include shipping rates in the tax calculation. This is automatically calculated for Canada, European Union, and United States.</p>
                                </div>
                            </div>
                            <div class="card-middle bd-border-none">
                                <div class="row mb-0 settings-checkout-checkbox-list">
                                    <label class="d-flex"><input type="checkbox" name="option2a" checked="checked">Charge VAT on digital goods</label>
                                    <p class="text-grey mb-0">This creates a collection for you to add your digital products. Products in this collection will have VAT applied at checkout for European customers. <a class="arrow-with-link" href="#">Learn more<svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14 13v1a1 1 0 0 1-1 1H6c-.575 0-1-.484-1-1V7a1 1 0 0 1 1-1h1c1.037 0 1.04 1.5 0 1.5-.178.005-.353 0-.5 0v6h6V13c0-1 1.5-1 1.5 0zm-3.75-7.25A.75.75 0 0 1 11 5h4v4a.75.75 0 0 1-1.5 0V7.56l-3.22 3.22a.75.75 0 1 1-1.06-1.06l3.22-3.22H11a.75.75 0 0 1-.75-.75z"></path></svg></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </article> -->
    </section>
</x-admin-layout>
</div>