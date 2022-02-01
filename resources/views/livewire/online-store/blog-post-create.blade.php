<x-admin-layout>
    <!-- New Blog page start -->
    <section class="full-width flex-wrap admin-body-width navigation-header">
        <article class="full-width">
            <div class="columns customers-details-heading">
                <div class="page_header d-flex  align-item-center mb-3">
                    <a href="{{ url('/admin/articles') }}">
                        <button class="secondary icon-arrow-left mr-2">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                <path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2z"></path>
                            </svg>
                        </button>
                    </a>
                    <h4 class="mb-0 fw-5">New Blog</h4>
                </div>
            </div>
        </article>
    </section>
    <form method="post" action="{{ route('create_blog_post')}}" enctype="multipart/form-data">
    @csrf 
    <section class="full-width flex-wrap bd_none admin-body-width">
        <article class="full-width">
            <div class="columns two-thirds">
                <div class="card">
                    <h3 class="fs-16 fw-6">Blog details</h3>
                    @if ($errors->any())
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        @if($errors->any())
                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif
                    
                    </div>
                    @endif
                    <div class="row row-mb-0 ">
                        <label class="lbl-mb-4">Title</label>
                        <input type="text" name="title">

                        <div class="product-des-customize">
                            <label>Description</label>
                            <div class="product-des-customize-inner">
                                <div class="product-dec-textbox">
                                    <textarea class="form-control tinymce-editor" rows="5" placeholder="Please Enter descripation" name="description" id="descripation" wire:ignore.self></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="product-des-customize">
                        <label class="lbl-mb-4">Slug</label>
                        <input type="text" name="slug">
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
                            <input type="text" name="seo_title" >
                            <p>0 of 70 characters used</p>
                        </div>
                        <div class="row">
                            <label>Description</label>
                            <textarea name="seo_description"></textarea>
                            <p>0 of 320 characters used</p>
                        </div>
                        <div class="row">
                            <label>URL and handle</label>
                            <div class="url-input">                                 
                                <input type="text" name="seo_url">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns one-third right-details">
                <!--<div class="card">
                    <div class="p-3">
                        <h3 class="fs-16 fw-6 lh-normal">Comments</h3>
                        <strong class="d-flex lbl-mb-4">Manage how comments are handled on this blog.</strong>
                        <div class="row">
                            <label class="mb-8 d-flex"><input type="radio" name="option1a" checked="checked">Comments are disabled</label>
                            <label class="mb-8 d-flex"><input type="radio" name="option1a">Comments are allowed, pending moderation</label>
                            <label class="mb-0 d-flex"><input type="radio" name="option1a">Comments are allowed, and are automatically published</label>
                        </div>
                    </div>
                </div>-->
                <div class="card">
                    <div class="p-3">
                        <h3 class="fs-16 fw-6 lh-normal">Featured image</h3>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' name="image" id="logoUpload" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Files</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="card">
                    <div class="p-3">
                        <h3 class="fs-16 fw-6 lh-normal">Online store</h3>
                        <div class="row">
                            <label class="lbl-mb-4">Theme template</label>
                            <select>
                                <option value="">Default blog</option>
                            </select>
                        </div>
                        <p class="mb-0">Assign a template from your current theme to define how the blog is displayed.</p>
                    </div>
                </div>-->
            </div>
            
        </article>
    </section>
    <section class="full-width flex-wrap admin-body-width add-transfer-footer">
        <div class="page-bottom-btn">
            <button class="button save_button">Save</button>
        </div>
    </section>
    </form>
    <style>
    button.save_button{color:#fff!important;}
    </style>
    <script type="text/javascript">
        $( ".edit-website-seo-btn" ).click(function() {     
            $('.search-engine-listing-card .card-middle').toggle();
        });
       
        $('.tinymce-editor').each(function () {
                CKEDITOR.replace($(this).prop('id'));
        });
    </script>
<!-- New Blog page end -->
</x-admin-layout>