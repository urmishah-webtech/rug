<x-admin-layout>
    <section class="full-width admin-body-width flex-wrap admin-full-width inventory-heading">
        <article class="full-width">
            <div class="columns customers-details-heading">
                <div class="page_header d-flex  align-item-center">
                    <a href="{{ route('order-list') }}">
                        <button class="secondary icon-arrow-left mr-2">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2z"></path></svg>
                        </button>
                    </a>
                    <h4 class="mb-0 fw-5">Create order</h4>
                </div>
            </div>
        </article>
    </section>
    <section class="full-width admin-body-width flex-wrap admin-full-width bd_none add-transfers-sec">
        <article class="full-width">
            <div class="columns two-thirds">
                <div class="details-first-card">
                    <div class="card create-order-details-card">
                        <div class="card-top">
                            <div class="header-title">
                                <h3 class="fs-16 fw-6 mb-0">Order details</h3>
                                <button class="link" onclick="document.getElementById('add-custom-item-modal').style.display='block'">Add custom item</button>
                            </div>
                            <div class="row add-note-textarea mb-0">
                                <div class="browse-products-search">
                                    <input type="search" placeholder="Search products">
                                    <button class="secondary browse-products-btn" onclick="document.getElementById('browse-products-modal').style.display='block'">Browse</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-middle">
                            <!-- <div class="card-column">
                                 <label>Notes</label>
                                 <textarea></textarea>
                            </div> -->
                            <div class="card-column">
                                <div class="card-inner-col">
                                    <ul>
                                        <li><label class="fw-4">Subtotal</label><label class="fw-4">US$0.00</label></li>
                                        <li><p>Add discount</p><p>-</p></li>
                                        <li><p>Add shipping</p><p>-</p></li>
                                        <li><p><span>Tax</span>Add shipping</p><p>-</p></li>
                                        <li><label class="fw-6">Total</label><label class="fw-6">US$0.00</label></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <p class="mb-0">Add a product to calculate total and view payment options.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns one-third right-details">
                <div class="card pd-20">
                    <div class="header-title">
                        <h3 class="fs-16 fw-6 mb-0">Find or create a customer</h3>
                    </div>
                    <p class="mb-0">
                        <input type="search" placeholder="Search customers">
                    </p>
                </div>
                <!-- <div class="card pd-20">
                    <div class="header-title">
                        <h3 class="fs-16 fw-6 mb-0">Tags</h3>
                         <button class="link" onclick="document.getElementById('view-all-tags').style.display='block'">View all tags</button>
                    </div>
                    <p class="mb-0">
                        <input type="text" placeholder="Urgent, reviewed, wholesale">
                    </p>
                </div> -->
            </div>    
        </article>
    </section>
</x-admin-layout>

<!--Add custom item modal-->
<div id="add-custom-item-modal" class="customer-modal-main">
    <div class="customer-modal-inner">
        <input type="hidden" wire:model="customer.id" value="">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Add custom item</h2>
                <span onclick="document.getElementById('add-custom-item-modal').style.display='none'" class="modal-close-btn">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </span>
            </div>
            <div class="modal-body ta-left">
                <div class="row">
                    <div class="form-item">
                        <label>Item name</label>
                        <input type="text">
                    </div>
                    <div class="form-item">
                        <label>Price</label>
                        <span class="dollar-input">
                            <input type="text" placeholder="0,00">
                        </span>
                    </div>
                    <div class="form-item">
                        <label>Quantity</label>
                        <input type="number" value="1">
                    </div>
                </div>
                <p>
                    <label><input type="checkbox" name="option6a" checked="checked">Item is taxable</label>
                    <label><input type="checkbox" name="option6a">Item requires shipping</label>
                </p>
            </div>
            <div class="modal-footer">
                <button class="button secondary">Cancel</button>
                <button class="button green-btn">Done</button>
            </div>
        </div>
    </div>
</div>

<!--Tags modal-->
<div id="view-all-tags" class="customer-modal-main transfer-tags-modal">
    <div class="customer-modal-inner">
        <input type="hidden" wire:model="customer.id" value="">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Tags</h2>
                <span onclick="document.getElementById('view-all-tags').style.display='none'" class="modal-close-btn">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </span>
            </div>
            <div class="modal-body">
                <div class="applied-tags tags-section">
                    <h4>APPLIED TAGS</h4>
                    <p>Select previously used tags from the list below to add them to this transfer</p>
                </div>
                <div class="all-tags tags-section">
                    <div class="all-tags-title">
                        <h4>ALL TAGS</h4>
                        <div class="short-tags">
                            <span>Sort:</span>
                            <span class="button-group">
                            <button class="secondary short-tags-btn">Alphabetical</button>
                            <button class="secondary short-tags-btn">Most recent</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="button secondary">Cancel</button>
                <button class="button green-btn">Apply changes</button>
            </div>
        </div>
    </div>
</div>