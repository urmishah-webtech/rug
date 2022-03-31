<div>
<x-admin-layout>
    <section class="full-width flex-wrap admin-body-width create-page-header">
        <article class="full-width">
            <div class="columns customers-details-heading">
                <div class="page_header d-flex  align-item-center mb-3">
                    <a href="{{ route('pages-list') }}">
                        <button class="secondary icon-arrow-left mr-2">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                <path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2z"></path>
                            </svg>
                        </button>
                    </a>
                    <h4 class="mb-0 fw-5">Add page</h4>
                </div>
            </div>
        </article>
    </section>
    <form action="{{ route('pages-store') }}" method="POST" enctype="multipart/form-data" id="add_people_form">
    @csrf
    <section class="full-width flex-wrap bd_none admin-body-width">
        <article class="full-width">
            <div class="columns two-thirds">
                <div class="card">
                    <div class="row">
                        <label>Title</label>
                        <input type="text" name="title" placeholder="e.g. Contact us, Sizing chart, FAQs">
                    </div>
                    <div class="form-group row">
                        <label>Content</label>
                        <div class="col-md-9">
                            <textarea class="form-control tinymce-editor" name="content" id="content"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card search-engine-listing-card">
                    <div class="card-header">
                        <div class="header-title">
                            <h4 class="fs-16 mb-0 fw-6">Search engine listing preview</h4>
                            <a class="link edit-website-seo-btn blue-color">Edit website SEO</a>
                        </div>
                        <div class="ccd-search-engine-listing">
                            <span class="mb-0 black-color">Add a description to see how this Page might appear in a search engine listing</span>
                        </div>
                    </div>
                    <div class="card-middle" style="display: none;">
                        <div class="row">
                            <label>Page title</label>
                            <input type="text" name="seo_title" maxlength="70">
                            <p>0 of 70 characters used</p>
                        </div>
                        <div class="row">
                            <label>Description</label>
                            <textarea name="seo_description" maxlength="320"></textarea>
                            <p>0 of 320 characters used</p>
                        </div>
                        <div class="row">
                            <label>URL and handle</label>
                            <div class="url-input">
                                <span>https://rug.webtech-evolution.com/</span>
                               
                                <input type="text" name="seo_url">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns one-third right-details">
                <div class="card">
                    <div class="p-3">
                        <h3 class="fs-16 fw-6 lh-normal">Visibility</h3>
                        <div class="row">
                            <label class="mb-8"><input type="radio" name="visibility" value="yes" checked="checked">Visible <span>(as of 3/29/2017, 2:47 PM UTC)</span></label>
                            <label class="mb-8"><input type="radio" name="visibility" value="no">Hidden <span>(will become visible on 9/22/2021, 6:00 AM UTC)</span></label>
                        </div>
                        <a class="blue-color" href="#">Set visibility date</a>
                        <div class="row date-time-row">
                            <label>Visibility date</label>
                            <input type="date">
                            <input type="time">
                        </div>
                        <a class="blue-color" href="#">Clear date...</a>
                    </div>
                </div>
                <div class="card">
                    <div class="p-3">
                        <h3 class="fs-16 fw-6 lh-normal">Online store</h3>
                        <div class="row">
                            <label class="lbl-mb-4">Theme template</label>
                            <select>
                                <option value="">Default page</option>
                                <option value="auction_cust_bids">auction_cust_bids</option>
                                <option value="auction_products">auction_products</option>
                                <option value="config">config</option>
                                <option value="contact">contact</option>
                                <option value="feeds">feeds</option>
                                <option value="mp_askme_profile">mp_askme_profile</option>
                                <option value="mp_global_product">mp_global_product</option>
                                <option value="mp_seller_profile">mp_seller_profile</option>
                                <option value="private">private</option>
                                <option value="public">public</option>
                            </select>
                        </div>
                        <p class="mb-0">Assign a template from your current theme to define how the page is displayed.</p>
                    </div>
                </div>
            </div>
        </article>
    </section>
    
    <section class="full-width flex-wrap admin-body-width">
        <div class="page-bottom-btn">
            <input type="submit" name="master-save" value="save">
        </div>
    </section>
    </form>
</x-admin-layout>
</div>

<script>

    $('.tinymce-editor').each(function () {

        CKEDITOR.replace($(this).prop('id'));

    });

 </script>
<script type="text/javascript">
    $( ".edit-website-seo-btn" ).click(function() {     
        $('.search-engine-listing-card .card-middle').toggle();
    });
</script>