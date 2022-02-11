<div>
<x-admin-layout>
    <div wire:key="alert" :id="1">
        @if (session()->has('message'))
        <div class="alert alert-success">
           {{ session('message') }}
        </div>
        @endif
    </div>
    <section class="full-width flex-wrap admin-body-width navigation-header">
        <article class="full-width">
            <div class="columns customers-details-heading">
                <div class="page_header d-flex  align-item-center mb-3">
                    <h4 class="mb-0 fw-5">Preferences</h4>
                </div>
            </div>
        </article>
    </section>
    <section class="full-width flex-wrap admin-body-width" wire:ignore>
        <article class="full-width">
            <div class="columns one-third">
                <div class="card card-transparent-bg pl-0">
                    <div class="card-title">
                        <h3 class="fs-16 fw-6 mb-0">Title and meta description</h3>
                    </div>
                    <p class="mb-0 text-grey">The title and meta description help define how your store shows up on search engines.</p>
                </div>
            </div>
            <div class="columns two-thirds setting-order-card">
                <div class="card">
                    <div class="row">
                        <label class="lbl-mb-4">Homepage title</label>
                        <input type="text" wire:model="getpreference.meta_title">
                        <p class="mb-0 text-grey">0 of 70 characters used</p>
                    </div> 
                    <div class="row row-mb-0">
                        <label class="lbl-mb-4">Homepage meta description</label>
                        <textarea class="modal-textarea" wire:model="getpreference.meta_description" placeholder="Enter a description to get a better ranking on search engines like Google"></textarea>
                        <p class="mb-0 text-grey">0 of 320 characters used</p>
                    </div> 
                </div>
            </div>
        </article>
        <!-- <article class="full-width sec-border">
            <div class="columns one-third">
                <div class="card card-transparent-bg pl-0">
                    <div class="card-title">
                        <h3 class="fs-16 fw-6 mb-0">Social sharing image</h3>
                    </div>
                    <p class="mb-0 text-grey">When you share a link to your store on social media, an image is usually shown in your post. This one will be used if another relevant image can’t be found. <a href="#" class="arrow-with-link">Learn more about social sharing images<svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14 13v1a1 1 0 0 1-1 1H6c-.575 0-1-.484-1-1V7a1 1 0 0 1 1-1h1c1.037 0 1.04 1.5 0 1.5-.178.005-.353 0-.5 0v6h6V13c0-1 1.5-1 1.5 0zm-3.75-7.25A.75.75 0 0 1 11 5h4v4a.75.75 0 0 1-1.5 0V7.56l-3.22 3.22a.75.75 0 1 1-1.06-1.06l3.22-3.22H11a.75.75 0 0 1-.75-.75z"></path></svg></a></p>
                </div> 
            </div>
            <div class="columns two-thirds setting-order-card">
                <div class="card card-pd-0">
                    <div class="card-header">
                        <div class="header-title row-mb-0">
                            <h3 class="fs-16 fw-6 mb-0">Social sharing image preview</h3>
                            <a class="arrow-with-link" href="#">Edit <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m5 8 5 5 5-5H5z"></path></svg></a>
                        </div>
                    </div>
                    <div class="card-middle card-grey-bg">
                        <label>Image <span class="text-grey">(Recommended size: 1200 x 628 px)</span></label>
                        <div class="media-with-details">
                            <div class="media-left">
                                <input type='file' wire:model="social_img" id="readUrl">
                                <a href="#" class="blue-color">Add image</a>
                                <p class="fs-12 mb-0 text-grey">or drop images to upload</p>
                                @if($getpreference['social_img'])
                                <img id="uploadedImage" src="{{ asset('storage/'.$getpreference['social_img']) }}" alt="Uploaded Image" accept="image/png, image/jpeg" style="display:none;">
                                @else
                                 <img id="uploadedImage" src="#" alt="Uploaded Image" accept="image/png, image/jpeg" style="display:none;">
                                @endif
                            </div>
                            <div class="media-details-right">
                                <h3 class="fs-18 fw-6 mb-8">Page title</h3>
                                <p class="mb-8">https://storename.myshopify.com</p>
                                <p class="mb-0">Meta description</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article> -->
        <article class="full-width sec-border">
            <div class="columns one-third">
                <div class="card card-transparent-bg pl-0">
                    <div class="card-title">
                        <h3 class="fs-16 fw-6 mb-0">Google Analytics</h3>
                    </div>
                    <p class="mb-0 text-grey">Google Analytics enables you to track the visitors to your store, and generates reports that will help you with your marketing. <a href="#" class="arrow-with-link">Learn more about Google Analytics<svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14 13v1a1 1 0 0 1-1 1H6c-.575 0-1-.484-1-1V7a1 1 0 0 1 1-1h1c1.037 0 1.04 1.5 0 1.5-.178.005-.353 0-.5 0v6h6V13c0-1 1.5-1 1.5 0zm-3.75-7.25A.75.75 0 0 1 11 5h4v4a.75.75 0 0 1-1.5 0V7.56l-3.22 3.22a.75.75 0 1 1-1.06-1.06l3.22-3.22H11a.75.75 0 0 1-.75-.75z"></path></svg></a></p>
                </div>
            </div>
            <div class="columns two-thirds setting-order-card">
                <div class="card">
                    <div class="row">
                        <label class="lbl-mb-4">Google Analytics account <span class="text-grey">(how do I set this up?)</span></label>
                        <textarea class="modal-textarea" placeholder="Paste your code from Google here"></textarea>
                    </div> 
                    <div class="row row-mb-0">
                        <p class="mb-0">Enhanced Ecommerce</p>
                        <p class="mb-0 text-grey">You must upgrade to the latest version of Google Analytics in order to use Enhanced Ecommerce.</p>
                    </div> 
                </div>
            </div>
        </article>
   <!--      <article class="full-width sec-border">
            <div class="columns one-third">
                <div class="card card-transparent-bg pl-0">
                    <div class="card-title">
                        <h3 class="fs-16 fw-6 mb-0">Customer privacy</h3>
                    </div>
                    <p class="mb-0 text-grey">Give your customers control over their data. While cookie and other tracking data helps enable store analytics and marketing, some locations require customers to give permission before their data can be used. <a href="#" class="arrow-with-link">Learn more about customer tracking<svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14 13v1a1 1 0 0 1-1 1H6c-.575 0-1-.484-1-1V7a1 1 0 0 1 1-1h1c1.037 0 1.04 1.5 0 1.5-.178.005-.353 0-.5 0v6h6V13c0-1 1.5-1 1.5 0zm-3.75-7.25A.75.75 0 0 1 11 5h4v4a.75.75 0 0 1-1.5 0V7.56l-3.22 3.22a.75.75 0 1 1-1.06-1.06l3.22-3.22H11a.75.75 0 0 1-.75-.75z"></path></svg></a></p>
                </div>
            </div>
            <div class="columns two-thirds setting-order-card">
                <div class="card">
                    <p>Limit data collection for EU buyers is <span class="fw-6">Deactivated.</span></p>
                    <div class="preferences-cp-card">
                        <p class="mb-0">Under the <span class="fw-6">European Union's General Data Protection Regulation (GDPR),</span>customers must give permissions before their data can be tracked. Learn more about <a href="#" class="td-underline blue-color">GDPR and data tracking</a></p>
                        <button class="button green-btn">Activate</button>
                    </div>
                </div>
                <div class="card">
                    <p>Limit data collection for California buyers is <span class="fw-6">Deactivated.</span></p>
                    <div class="preferences-cp-card">
                        <p class="mb-0">Under the <span class="fw-6">California Consumer Privacy Act (CCPA),</span>customers in California should be able to opt out of the sale of their data. Or, if no option is provided, they should be automatically exempt. Learn more about <a href="#" class="td-underline blue-color">CCPA and data sharing.</a></p>
                        <button class="button green-btn">Activate</button>
                    </div>
                </div>
            </div>
        </article>
        <article class="full-width sec-border">
            <div class="columns one-third">
                <div class="card card-transparent-bg pl-0">
                    <div class="card-title">
                        <h3 class="fs-16 fw-6 mb-0">Password protection</h3>
                    </div>
                    <p class="mb-0 text-grey">Enable the password to restrict access to your online store. Only customers with the password can access it. <a href="#" class="arrow-with-link">Learn more about password protection.<svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14 13v1a1 1 0 0 1-1 1H6c-.575 0-1-.484-1-1V7a1 1 0 0 1 1-1h1c1.037 0 1.04 1.5 0 1.5-.178.005-.353 0-.5 0v6h6V13c0-1 1.5-1 1.5 0zm-3.75-7.25A.75.75 0 0 1 11 5h4v4a.75.75 0 0 1-1.5 0V7.56l-3.22 3.22a.75.75 0 1 1-1.06-1.06l3.22-3.22H11a.75.75 0 0 1-.75-.75z"></path></svg></a></p>
                </div>
            </div>
            <div class="columns two-thirds setting-order-card">
                <div class="card">
                    <div class="row">
                        <label><input type="checkbox" name="option2a">Enable password</label>
                    </div>
                    <div class="row">
                        <label class="lbl-mb-4">Password</label>
                        <input type="text" value="password">
                        <p class="text-grey mb-0">6 of 100 characters used</p>
                    </div>
                    <div class="row row-mb-0">
                        <label class="lbl-mb-4">Message for your visitors</label>
                        <textarea class="modal-textarea"></textarea>
                        <p class="mb-0 text-grey">0 of 5000 characters used</p>
                    </div> 
                </div>
            </div>
        </article> -->
    </section>
    <section class="full-width flex-wrap admin-body-width add-transfer-footer">
        <div class="page-bottom-btn">
            <button wire:click.prevent="update({{$getpreference['id']}})" class="button">Save</button>
        </div>
    </section>
</x-admin-layout>
</div>
<script type="text/javascript">
document.getElementById('readUrl').addEventListener('change', function(){
  if (this.files[0] ) {
    var picture = new FileReader();
    picture.readAsDataURL(this.files[0]);
    picture.addEventListener('load', function(event) {
      document.getElementById('uploadedImage').setAttribute('src', event.target.result);
      document.getElementById('uploadedImage').style.display = 'block';
    });
  }
});
</script>